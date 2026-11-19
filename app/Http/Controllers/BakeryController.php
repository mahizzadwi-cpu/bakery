<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BakeryController extends Controller
{
    private function getActiveBankAccounts()
    {
        $bankAccounts = BankAccount::where('is_active', true)->get();

        if ($bankAccounts->isEmpty()) {
            return collect([
                (object)[
                    'id' => 1,
                    'bank_name' => 'BCA',
                    'account_number' => '8290192811',
                    'account_name' => 'Mey Bakery Official',
                ],
                (object)[
                    'id' => 2,
                    'bank_name' => 'Mandiri',
                    'account_number' => '1420019283712',
                    'account_name' => 'Mey Bakery Official',
                ],
                (object)[
                    'id' => 3,
                    'bank_name' => 'BRI',
                    'account_number' => '012301098234501',
                    'account_name' => 'Mey Bakery Official',
                ],
            ]);
        }

        return $bankAccounts;
    }

    public function landing()
    {
        $products = Product::where('stock', '>', 0)->latest()->get();
        $bankAccounts = $this->getActiveBankAccounts();
        $bestSellers = $products->take(4);

        return view('landing', compact('products', 'bankAccounts', 'bestSellers'));
    }

    public function shop()
    {
        $products = Product::where('stock', '>', 0)->latest()->get();
        $bankAccounts = $this->getActiveBankAccounts();

        return view('shop', compact('products', 'bankAccounts'));
    }

    public function processOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required|string|max:20',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date|after_or_equal:today',
            'order_type' => 'required|in:delivery,pickup,cod',
            'payment_method' => 'required|in:qris,transfer,cod',
            'bank_account_id' => 'nullable',
            'checkout_via' => 'required|in:web,whatsapp',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
            'bundle_items' => 'nullable|string',
        ]);

        $adminPhone = '6281234567890';
        $isTunai = ($request->payment_method === 'cod' || $request->order_type === 'cod');

        // Cek jika pemesanan berupa Paket Bundle (dari Troli Belanja)
        $bundle = null;
        if ($request->filled('bundle_items')) {
            $decoded = json_decode($request->bundle_items, true);
            if (is_array($decoded) && count($decoded) > 0) {
                $bundle = $decoded;
            }
        }

        if ($bundle) {
            $totalPrice = 0;
            $totalQuantity = 0;
            $bundleSummary = [];
            $productsToDecrement = [];

            foreach ($bundle as $item) {
                $p = Product::find($item['id'] ?? null);
                if (! $p) {
                    continue;
                }
                $qty = max(1, intval($item['qty'] ?? 1));
                if ($p->stock < $qty) {
                    return back()->with('error', "Maaf, stok {$p->name} tidak mencukupi (tersisa {$p->stock} unit).");
                }
                $itemSubtotal = $p->price_idr * $qty;
                $totalPrice += $itemSubtotal;
                $totalQuantity += $qty;
                $bundleSummary[] = "{$qty}x {$p->name} (Rp ".number_format($itemSubtotal, 0, ',', '.').')';
                $productsToDecrement[] = ['product' => $p, 'qty' => $qty];
            }

            if (empty($productsToDecrement)) {
                return back()->with('error', 'Keranjang bundle Anda kosong atau tidak valid.');
            }

            $primaryProduct = $productsToDecrement[0]['product'];
            $orderCode = 'MEY-'.strtoupper(Str::random(6));

            $bankDetail = '';
            if ($request->payment_method === 'transfer' && $request->filled('bank_account_id')) {
                $chosenBank = BankAccount::find($request->bank_account_id);
                if ($chosenBank) {
                    $bankDetail = " (Bank {$chosenBank->bank_name} {$chosenBank->account_number} a.n {$chosenBank->account_name})";
                }
            }

            $bundleNoteText = 'PAKET BUNDLE ('.count($productsToDecrement)." Menu / {$totalQuantity} Unit):\n• ".implode("\n• ", $bundleSummary);
            if ($request->notes) {
                $bundleNoteText .= "\n\nCatatan Tambahan: \"{$request->notes}\"";
            }
            $bundleNoteText .= ' [Bayar: '.strtoupper($request->payment_method).$bankDetail.' | Kurir: '.strtoupper($request->order_type).']';

            $order = Order::create([
                'order_code' => $orderCode,
                'product_id' => $primaryProduct->id,
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'quantity' => $totalQuantity,
                'delivery_date' => $request->delivery_date,
                'order_type' => $request->order_type === 'cod' ? 'delivery' : $request->order_type,
                'payment_method' => $request->payment_method,
                'address' => $request->address,
                'order_notes' => $bundleNoteText,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            foreach ($productsToDecrement as $entry) {
                $entry['product']->decrement('stock', $entry['qty']);
            }

            // Jika pembayaran Tunai atau checkout via WhatsApp, langsung arahkan ke WhatsApp
            if ($isTunai || $request->checkout_via === 'whatsapp') {
                $metodeKirim = match ($request->order_type) {
                    'delivery' => 'Kurir Toko (Delivery Order)',
                    'pickup' => 'Ambil di Toko (Self Pick-up)',
                    'cod' => 'COD (Bayar di Tempat saat Antar)',
                };

                $metodeBayar = match ($request->payment_method) {
                    'qris' => 'QRIS Instant (All E-Wallet / M-Banking)',
                    'transfer' => 'Transfer Bank'.($bankDetail ? $bankDetail : ' (BCA / Mandiri / BRI)'),
                    'cod' => 'Tunai / COD saat serah terima',
                };

                $msgTitle = $isTunai ? "🧁 *PESANAN BUNDLE (TUNAI/COD) - MEY BAKERY*\n" : "🧁 *PESANAN BUNDLE BARU - MEY BAKERY*\n";
                $msg = $msgTitle;
                $msg .= "Nomor Pesanan: *#{$orderCode}*\n";
                $msg .= "─────────────────────────\n";
                $msg .= "👤 Pemesan : {$request->customer_name}\n";
                $msg .= "📱 WhatsApp: {$request->customer_phone}\n";
                $msg .= '📅 Jadwal  : '.date('d M Y', strtotime($request->delivery_date))."\n";
                $msg .= "🚚 Layanan : {$metodeKirim}\n";
                if ($request->address) {
                    $msg .= "📍 Alamat  : {$request->address}\n";
                }
                $msg .= "💳 Bayar   : {$metodeBayar}\n";
                $msg .= "─────────────────────────\n";
                $msg .= '📦 *RINCIAN PAKET BUNDLE ('.count($productsToDecrement)." MENU):*\n";
                foreach ($bundleSummary as $summaryLine) {
                    $msg .= "• {$summaryLine}\n";
                }
                $msg .= "🔢 Total Unit : {$totalQuantity} item\n";
                $msg .= '💰 Total Tagihan: Rp '.number_format($totalPrice, 0, ',', '.')."\n";
                if ($request->notes) {
                    $msg .= "📝 Catatan  : \"{$request->notes}\"\n";
                }
                $msg .= "─────────────────────────\n";
                if ($isTunai) {
                    $msg .= "Halo Admin Mey Bakery, saya memesan paket bundle dengan pembayaran Tunai/COD untuk pesanan #{$orderCode}. Mohon dikonfirmasi ya. Terima kasih!";
                } else {
                    $msg .= "Halo Admin Mey Bakery, mohon konfirmasi pesanan bundle #{$orderCode} saya. Terima kasih!";
                }

                return redirect()->away("https://wa.me/{$adminPhone}?text=".urlencode($msg));
            }

            return redirect()->route('order.invoice', $order->order_code)
                ->with('success', "Pesanan bundle #{$order->order_code} berhasil dibuat dan tersimpan di database!");
        }

        // Single order processing (Alur Pesanan Satuan Biasa)
        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return back()->with('error', "Maaf, stok {$product->name} tersisa {$product->stock} unit.");
        }

        $totalPrice = $product->price_idr * $request->quantity;
        $orderCode = 'MEY-'.strtoupper(Str::random(6));

        $bankDetail = '';
        if ($request->payment_method === 'transfer' && $request->filled('bank_account_id')) {
            $chosenBank = BankAccount::find($request->bank_account_id);
            if ($chosenBank) {
                $bankDetail = " (Bank {$chosenBank->bank_name} {$chosenBank->account_number} a.n {$chosenBank->account_name})";
            }
        }

        $order = Order::create([
            'order_code' => $orderCode,
            'product_id' => $product->id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'quantity' => $request->quantity,
            'delivery_date' => $request->delivery_date,
            'order_type' => $request->order_type === 'cod' ? 'delivery' : $request->order_type,
            'payment_method' => $request->payment_method,
            'address' => $request->address,
            'order_notes' => $request->notes.' [Bayar: '.strtoupper($request->payment_method).$bankDetail.' | Kurir: '.strtoupper($request->order_type).']',
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $product->decrement('stock', $request->quantity);

        // Jika pembayaran Tunai atau checkout via WhatsApp, langsung arahkan ke WhatsApp
        if ($isTunai || $request->checkout_via === 'whatsapp') {
            $metodeKirim = match ($request->order_type) {
                'delivery' => 'Kurir Toko (Delivery Order)',
                'pickup' => 'Ambil di Toko (Self Pick-up)',
                'cod' => 'COD (Bayar di Tempat saat Antar)',
            };

            $metodeBayar = match ($request->payment_method) {
                'qris' => 'QRIS Instant (All E-Wallet / M-Banking)',
                'transfer' => 'Transfer Bank'.($bankDetail ? $bankDetail : ' (BCA / Mandiri / BRI)'),
                'cod' => 'Tunai / COD saat serah terima',
            };

            $msgTitle = $isTunai ? "🧁 *PESANAN BARU (BAYAR TUNAI/COD) - MEY BAKERY*\n" : "🧁 *PESANAN BARU - MEY BAKERY*\n";
            $msg = $msgTitle;
            $msg .= "Nomor Pesanan: *#{$orderCode}*\n";
            $msg .= "─────────────────────────\n";
            $msg .= "👤 Pemesan : {$request->customer_name}\n";
            $msg .= "📱 WhatsApp: {$request->customer_phone}\n";
            $msg .= '📅 Jadwal  : '.date('d M Y', strtotime($request->delivery_date))."\n";
            $msg .= "🚚 Layanan : {$metodeKirim}\n";
            if ($request->address) {
                $msg .= "📍 Alamat  : {$request->address}\n";
            }
            $msg .= "💳 Bayar   : {$metodeBayar}\n";
            $msg .= "─────────────────────────\n";
            $msg .= "🎂 Menu    : {$product->name}\n";
            $msg .= "🔢 Jumlah  : {$request->quantity} unit\n";
            $msg .= '💰 Total   : Rp '.number_format($totalPrice, 0, ',', '.')."\n";
            if ($request->notes) {
                $msg .= "📝 Catatan : \"{$request->notes}\"\n";
            }
            $msg .= "─────────────────────────\n";
            if ($isTunai) {
                $msg .= "Halo Admin Mey Bakery, saya memesan dengan pembayaran Tunai/COD untuk pesanan #{$orderCode}. Mohon segera dikonfirmasi ya. Terima kasih!";
            } else {
                $msg .= "Halo Admin Mey Bakery, mohon konfirmasi pesanan #{$orderCode} saya. Terima kasih!";
            }

            return redirect()->away("https://wa.me/{$adminPhone}?text=".urlencode($msg));
        }

        return redirect()->route('order.invoice', $order->order_code)
            ->with('success', "Pesanan #{$order->order_code} berhasil dibuat dan tersimpan di database!");
    }

    public function showInvoice($code)
    {
        $order = Order::with('product')->where('order_code', $code)->firstOrFail();
        $bankAccounts = $this->getActiveBankAccounts();

        return view('invoice', compact('order', 'bankAccounts'));
    }
}
