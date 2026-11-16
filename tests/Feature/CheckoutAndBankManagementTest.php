<?php

namespace Tests\Feature;

use App\Models\BankAccount;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutAndBankManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed default bank accounts
        BankAccount::create([
            'bank_name' => 'BCA',
            'account_number' => '821-098-7654',
            'account_name' => 'Mey Bakery Indonesia',
            'is_active' => true,
        ]);
    }

    public function test_shop_page_renders_with_active_bank_accounts()
    {
        Product::create([
            'name' => 'Croissant Almond',
            'category' => 'Pastry',
            'description' => 'Croissant renyah bertabur almond panggang',
            'price_idr' => 35000,
            'stock' => 15,
        ]);

        $response = $this->get(route('shop'));

        $response->assertStatus(200);
        $response->assertSee('Croissant Almond');
        $response->assertSee('BCA');
        $response->assertSee('821-098-7654');
    }

    public function test_landing_page_shows_best_sellers_and_shop_link(): void
    {
        Product::create([
            'name' => 'Pain au Chocolat',
            'category' => 'Pastry',
            'description' => 'Pastry berlapis dengan cokelat',
            'price_idr' => 28000,
            'stock' => 8,
        ]);

        $response = $this->get(route('landing'));

        $response->assertOk();
        $response->assertSee('Best Seller');
        $response->assertSee('Pain au Chocolat');
        $response->assertSee(route('shop'), false);
    }

    public function test_admin_can_store_new_bank_account()
    {
        $response = $this->withSession(['is_admin_logged_in' => true])
            ->post(route('admin.banks.store'), [
                'bank_name' => 'Bank Mandiri',
                'account_number' => '142-00-9876543-2',
                'account_name' => 'Mey Bakery Official',
                'is_active' => 1,
            ]);

        $response->assertRedirect('/admin/dashboard?tab=banks');
        $this->assertDatabaseHas('bank_accounts', [
            'bank_name' => 'Bank Mandiri',
            'account_number' => '142-00-9876543-2',
            'account_name' => 'Mey Bakery Official',
        ]);
    }

    public function test_admin_can_update_existing_bank_account()
    {
        $bank = BankAccount::first();

        $response = $this->withSession(['is_admin_logged_in' => true])
            ->post(route('admin.banks.update', $bank->id), [
                'bank_name' => 'BCA Prioritas',
                'account_number' => '821-999-0000',
                'account_name' => 'Mey Bakery Utama',
                'is_active' => 1,
            ]);

        $response->assertRedirect('/admin/dashboard?tab=banks');
        $this->assertDatabaseHas('bank_accounts', [
            'id' => $bank->id,
            'bank_name' => 'BCA Prioritas',
            'account_number' => '821-999-0000',
        ]);
    }

    public function test_admin_can_delete_bank_account()
    {
        $bank = BankAccount::first();

        $response = $this->withSession(['is_admin_logged_in' => true])
            ->delete(route('admin.banks.destroy', $bank->id));

        $response->assertRedirect('/admin/dashboard?tab=banks');
        $this->assertDatabaseMissing('bank_accounts', [
            'id' => $bank->id,
        ]);
    }

    public function test_customer_can_checkout_with_qris_and_view_barcode()
    {
        $product = Product::create([
            'name' => 'Pain au Chocolat',
            'category' => 'Pastry',
            'description' => 'Cokelat Belgia leleh dalam gulungan pastry mentega',
            'price_idr' => 40000,
            'stock' => 10,
        ]);

        $response = $this->post(route('order.process'), [
            'customer_name' => 'Anisa Rahma',
            'customer_phone' => '081234567891',
            'product_id' => $product->id,
            'quantity' => 2,
            'delivery_date' => date('Y-m-d', strtotime('+1 day')),
            'order_type' => 'delivery',
            'payment_method' => 'qris',
            'checkout_via' => 'web',
            'address' => 'Jl. Sudirman No. 45, Batam',
            'notes' => 'Tolong dipacking box tebal',
        ]);

        $order = Order::latest()->first();
        $this->assertNotNull($order);
        $this->assertEquals(80000, $order->total_price);
        $this->assertEquals(8, $product->fresh()->stock);

        $response->assertRedirect(route('order.invoice', $order->order_code));

        $invoiceResponse = $this->get(route('order.invoice', $order->order_code));
        $invoiceResponse->assertStatus(200);
        $invoiceResponse->assertSee($order->order_code);
        $invoiceResponse->assertSee('QRIS');
        $invoiceResponse->assertSee('api.qrserver.com');
    }

    public function test_customer_checkout_with_bank_transfer_stores_selected_bank_details()
    {
        $bank = BankAccount::first();
        $product = Product::create([
            'name' => 'Strawberry Tartlet',
            'category' => 'Tart',
            'description' => 'Tartlet renyah dengan krim vanila dan stroberi segar',
            'price_idr' => 45000,
            'stock' => 5,
        ]);

        $response = $this->post(route('order.process'), [
            'customer_name' => 'Rendi Pratama',
            'customer_phone' => '081987654321',
            'product_id' => $product->id,
            'quantity' => 1,
            'delivery_date' => date('Y-m-d', strtotime('+2 days')),
            'order_type' => 'pickup',
            'payment_method' => 'transfer',
            'bank_account_id' => $bank->id,
            'checkout_via' => 'web',
            'notes' => 'Ambil sore jam 4',
        ]);

        $order = Order::latest()->first();
        $this->assertNotNull($order);
        $this->assertStringContainsString('TRANSFER', $order->order_notes);
        $this->assertStringContainsString('BCA', $order->order_notes);
        $this->assertStringContainsString('821-098-7654', $order->order_notes);

        $response->assertRedirect(route('order.invoice', $order->order_code));
    }

    public function test_customer_checkout_with_bundle_items_via_web()
    {
        $p1 = Product::create([
            'name' => 'Matcha Croissant',
            'category' => 'Pastry',
            'description' => 'Matcha Kyoto asli',
            'price_idr' => 38000,
            'stock' => 10,
        ]);
        $p2 = Product::create([
            'name' => 'Espresso Brownie',
            'category' => 'Cake',
            'description' => 'Fudgy brownie rasa kopi',
            'price_idr' => 28000,
            'stock' => 10,
        ]);

        $bundleItems = [
            ['id' => $p1->id, 'qty' => 2, 'name' => $p1->name, 'price' => 38000],
            ['id' => $p2->id, 'qty' => 1, 'name' => $p2->name, 'price' => 28000],
        ];

        $response = $this->post(route('order.process'), [
            'customer_name' => 'Dewi Lestari',
            'customer_phone' => '085566778899',
            'product_id' => $p1->id,
            'quantity' => 3,
            'delivery_date' => date('Y-m-d', strtotime('+1 day')),
            'order_type' => 'delivery',
            'payment_method' => 'qris',
            'checkout_via' => 'web',
            'bundle_items' => json_encode($bundleItems),
            'address' => 'Komp. Nagoya Hill Blok B No. 12',
        ]);

        $order = Order::latest()->first();
        $this->assertNotNull($order);
        $this->assertEquals(104000, $order->total_price); // (38000*2) + (28000*1) = 76000 + 28000 = 104000
        $this->assertEquals(8, $p1->fresh()->stock);
        $this->assertEquals(9, $p2->fresh()->stock);
        $this->assertStringContainsString('PAKET BUNDLE', $order->order_notes);

        $response->assertRedirect(route('order.invoice', $order->order_code));
    }
}
