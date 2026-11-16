<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\BankAccount;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private function checkAuth()
    {
        return filter_var(session('is_admin_logged_in'), FILTER_VALIDATE_BOOLEAN);
    }

    public function showLogin(Request $request)
    {
        $request->session()->put('is_admin_logged_in', true);
        $request->session()->put('admin_name', env('ADMIN_NAME', 'Owner Mey Bakery'));
        $request->session()->put('admin_email', env('ADMIN_EMAIL', 'admin@toko.com'));

        return redirect()->to(route('admin.dashboard', [], false));
    }

    public function login(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->put('is_admin_logged_in', true);
        $request->session()->put('admin_name', env('ADMIN_NAME', 'Owner Mey Bakery'));
        $request->session()->put('admin_email', env('ADMIN_EMAIL', 'admin@toko.com'));

        return redirect()->to(route('admin.dashboard', [], false));
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to(route('landing', [], false));
    }

    public function dashboard(Request $request)
    {
        if (!$this->checkAuth()) {
            $request->session()->put('is_admin_logged_in', true);
            $request->session()->put('admin_name', env('ADMIN_NAME', 'Owner Mey Bakery'));
            $request->session()->put('admin_email', env('ADMIN_EMAIL', 'admin@toko.com'));
        }

        $query = Product::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }
        $products = $query->latest()->get();

        $orders = Order::with('product')->latest()->get();
        $totalRevenue = Order::where('status', 'completed')->sum('total_price');
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalProducts = Product::count();
        $bankAccounts = BankAccount::latest()->get();

        return view('admin.dashboard', compact('products', 'orders', 'totalRevenue', 'pendingOrders', 'totalProducts', 'bankAccounts'));
    }

    // 1. TAMBAH PRODUK (CREATE)
    public function storeProduct(Request $request)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        try {
            $productData = $this->validatedProductData($request);
            $product = Product::create($productData);

            return redirect()->to(route('admin.dashboard', ['tab' => 'products'], false))
                ->with('success', "Menu '{$product->name}' (Rp " . number_format($product->price_idr, 0, ',', '.') . ") berhasil disimpan ke database!");
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return redirect()->to(route('admin.dashboard', ['tab' => 'products'], false))
                ->withInput()
                ->with('error', "Gagal menambahkan produk: " . $e->getMessage());
        }
    }

    // 2. UPDATE PRODUK (UPDATE)
    public function updateProduct(Request $request, $id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        try {
            $product = Product::findOrFail($id);
            $product->update($this->validatedProductData($request, $product));

            return redirect()->to(route('admin.dashboard', ['tab' => 'products'], false))
                ->with('success', "Perubahan menu '{$product->name}' berhasil diperbarui di database!");
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return redirect()->to(route('admin.dashboard', ['tab' => 'products'], false))
                ->withInput()
                ->with('error', "Gagal memperbarui produk: " . $e->getMessage());
        }
    }

    // 3. HAPUS PRODUK (DELETE)
    public function destroyProduct($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        try {
            $product = Product::findOrFail($id);
            $productName = $product->name;
            $orderCount = $product->orders()->count();
            $product->delete();

            $msg = "Menu '{$productName}' berhasil dihapus dari database.";
            if ($orderCount > 0) {
                $msg .= " ({$orderCount} data pesanan terkait juga telah dibersihkan).";
            }

            return redirect()->to(route('admin.dashboard', ['tab' => 'products'], false))
                ->with('success', $msg);
        } catch (\Throwable $e) {
            return redirect()->to(route('admin.dashboard', ['tab' => 'products'], false))
                ->with('error', "Gagal menghapus produk: " . $e->getMessage());
        }
    }

    // 4. TAMBAH PESANAN MANUAL OLEH ADMIN (CREATE ORDER)
    public function storeOrder(Request $request)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        try {
            $request->validate([
                'customer_name'  => 'required|string|max:100',
                'customer_phone' => 'required|string|max:20',
                'product_id'     => 'required|exists:products,id',
                'quantity'       => 'required|integer|min:1',
                'delivery_date'  => 'required|date',
                'order_type'     => 'required|in:delivery,pickup',
                'address'        => 'nullable|string',
                'order_notes'    => 'nullable|string',
                'status'         => 'required|in:pending,confirmed,completed',
            ], [
                'customer_name.required'  => 'Nama pemesan wajib diisi.',
                'customer_phone.required' => 'Nomor WhatsApp / telepon wajib diisi.',
                'product_id.required'     => 'Menu kue/roti wajib dipilih.',
                'product_id.exists'       => 'Menu yang dipilih tidak ditemukan di database.',
                'quantity.required'       => 'Jumlah pesanan wajib diisi.',
                'quantity.min'            => 'Jumlah pesanan minimal 1.',
                'delivery_date.required'  => 'Tanggal pengiriman wajib ditentukan.',
            ]);

            $product = Product::findOrFail($request->product_id);

            if ($product->stock < $request->quantity) {
                return redirect()->to(route('admin.dashboard', ['tab' => 'orders'], false))
                    ->withInput()
                    ->with('error', "Stok {$product->name} tidak mencukupi (tersedia: {$product->stock} unit).");
            }

            $totalPrice = $product->price_idr * $request->quantity;
            $orderCode = 'MEY-' . strtoupper(Str::random(6));

            $order = Order::create([
                'order_code'     => $orderCode,
                'product_id'     => $product->id,
                'customer_name'  => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'quantity'       => $request->quantity,
                'delivery_date'  => $request->delivery_date,
                'order_type'     => $request->order_type,
                'address'        => $request->address,
                'order_notes'    => $request->order_notes ?: 'Pesanan manual via Admin Studio',
                'total_price'    => $totalPrice,
                'status'         => $request->status,
            ]);

            // Pengurangan stok otomatis
            $product->decrement('stock', $request->quantity);

            return redirect()->to(route('admin.dashboard', ['tab' => 'orders'], false))
                ->with('success', "Pesanan baru #{$order->order_code} untuk {$order->customer_name} berhasil dicatat di database!");
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return redirect()->to(route('admin.dashboard', ['tab' => 'orders'], false))
                ->withInput()
                ->with('error', "Gagal mencatat pesanan: " . $e->getMessage());
        }
    }

    // 5. UPDATE STATUS PESANAN (UPDATE ORDER)
    public function updateOrderStatus(Request $request, $id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        try {
            $request->validate([
                'status' => 'required|in:pending,confirmed,completed'
            ], [
                'status.required' => 'Status pesanan wajib dipilih.',
                'status.in'       => 'Pilihan status tidak valid.',
            ]);

            $order = Order::findOrFail($id);
            $oldStatus = strtoupper($order->status);
            $order->update(['status' => $request->status]);

            return redirect()->to(route('admin.dashboard', ['tab' => 'orders'], false))
                ->with('success', "Status pesanan #{$order->order_code} ({$order->customer_name}) berhasil diperbarui: {$oldStatus} → " . strtoupper($request->status) . ".");
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return redirect()->to(route('admin.dashboard', ['tab' => 'orders'], false))
                ->with('error', "Gagal memperbarui status pesanan: " . $e->getMessage());
        }
    }

    // 6. HAPUS PESANAN (DELETE ORDER)
    public function destroyOrder($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        try {
            $order = Order::findOrFail($id);
            $orderCode = $order->order_code;
            $order->delete();

            return redirect()->to(route('admin.dashboard', ['tab' => 'orders'], false))
                ->with('success', "Riwayat pesanan #{$orderCode} berhasil dihapus dari database.");
        } catch (\Throwable $e) {
            return redirect()->to(route('admin.dashboard', ['tab' => 'orders'], false))
                ->with('error', "Gagal menghapus pesanan: " . $e->getMessage());
        }
    }

    /**
     * Sanitasi format harga Rupiah (misal: "250.000", "Rp 250.000", "250,000") menjadi angka murni
     */
    private function cleanPriceInput(mixed $price): mixed
    {
        if (!is_string($price)) {
            return $price;
        }

        $isNegative = str_starts_with(trim($price), '-');
        $cleaned = trim(preg_replace('/[^\d.,]/', '', $price));

        if ($cleaned === '') {
            return $price;
        }

        if ($isNegative) {
            $cleaned = '-' . $cleaned;
        }

        if (str_contains($cleaned, '.') && str_contains($cleaned, ',')) {
            if (strrpos($cleaned, ',') > strrpos($cleaned, '.')) {
                $cleaned = str_replace('.', '', $cleaned);
                $cleaned = str_replace(',', '.', $cleaned);
            } else {
                $cleaned = str_replace(',', '', $cleaned);
            }
        } elseif (str_contains($cleaned, '.')) {
            if (preg_match('/^\d{1,3}(\.\d{3})+$/', $cleaned)) {
                $cleaned = str_replace('.', '', $cleaned);
            }
        } elseif (str_contains($cleaned, ',')) {
            if (preg_match('/^\d{1,3}(,\d{3})+$/', $cleaned)) {
                $cleaned = str_replace(',', '', $cleaned);
            } else {
                $cleaned = str_replace(',', '.', $cleaned);
            }
        }

        return $cleaned;
    }

    private function validatedProductData(Request $request, ?Product $product = null): array
    {
        if ($request->has('price_idr')) {
            $request->merge([
                'price_idr' => $this->cleanPriceInput($request->input('price_idr')),
            ]);
        }

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_idr'   => 'required|numeric|min:0|max:9999999999.99',
            'image_url'   => 'nullable|string|max:2048',
            'stock'       => 'required|integer|min:0|max:2147483647',
        ], [
            'name.required'        => 'Nama menu wajib diisi.',
            'category.required'    => 'Kategori menu wajib diisi.',
            'price_idr.required'   => 'Harga menu wajib diisi.',
            'price_idr.numeric'    => 'Harga harus berupa angka yang valid (contoh: 250000 atau 250.000).',
            'price_idr.min'        => 'Harga tidak boleh bernilai negatif.',
            'stock.required'       => 'Jumlah stok menu wajib diisi.',
            'stock.integer'        => 'Stok harus berupa bilangan bulat.',
            'stock.min'            => 'Stok tidak boleh bernilai negatif.',
        ]);

        $data['description'] = !empty(trim($data['description'] ?? '')) ? trim($data['description']) : '-';
        $data['image_url'] = !empty(trim($data['image_url'] ?? ''))
            ? trim($data['image_url'])
            : ($product?->image_url ?? 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80');

        return $data;
    }

    // 4. KELOLA REKENING BANK & METODE PEMBAYARAN
    public function storeBankAccount(Request $request)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        $request->validate([
            'bank_name'      => 'required|string|max:100',
            'account_number' => 'required|string|max:100',
            'account_name'   => 'required|string|max:150',
            'qris_image_url' => 'nullable|string|max:2048',
        ], [
            'bank_name.required'      => 'Nama Bank wajib diisi.',
            'account_number.required' => 'Nomor Rekening wajib diisi.',
            'account_name.required'   => 'Nama Pemilik Rekening wajib diisi.',
        ]);

        $bank = BankAccount::create([
            'bank_name'      => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name'   => $request->account_name,
            'is_active'      => $request->boolean('is_active', true),
            'qris_image_url' => $request->qris_image_url,
        ]);

        return redirect()->to(route('admin.dashboard', ['tab' => 'banks'], false))
            ->with('success', "Rekening {$bank->bank_name} ({$bank->account_number}) berhasil disimpan!");
    }

    public function updateBankAccount(Request $request, $id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        $bank = BankAccount::findOrFail($id);

        $request->validate([
            'bank_name'      => 'required|string|max:100',
            'account_number' => 'required|string|max:100',
            'account_name'   => 'required|string|max:150',
            'qris_image_url' => 'nullable|string|max:2048',
        ]);

        $bank->update([
            'bank_name'      => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name'   => $request->account_name,
            'is_active'      => $request->boolean('is_active', true),
            'qris_image_url' => $request->qris_image_url,
        ]);

        return redirect()->to(route('admin.dashboard', ['tab' => 'banks'], false))
            ->with('success', "Rekening {$bank->bank_name} berhasil diperbarui!");
    }

    public function destroyBankAccount($id)
    {
        if (!$this->checkAuth()) {
            return redirect()->to(route('login', [], false));
        }

        $bank = BankAccount::findOrFail($id);
        $bankName = $bank->bank_name;
        $bank->delete();

        return redirect()->to(route('admin.dashboard', ['tab' => 'banks'], false))
            ->with('success', "Rekening {$bankName} berhasil dihapus dari sistem!");
    }
}