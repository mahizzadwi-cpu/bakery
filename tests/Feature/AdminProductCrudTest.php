<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_product_in_the_products_table(): void
    {
        $response = $this->withSession(['is_admin_logged_in' => true])
            ->post(route('admin.products.store', ['tab' => 'products'], false), [
                'name' => 'Chocolate Cake',
                'category' => 'Cake',
                'description' => 'Dark chocolate',
                'price_idr' => '125000.50',
                'image_url' => 'https://example.com/cake.jpg',
                'stock' => '8',
            ]);

        $response->assertRedirect('/admin/dashboard?tab=products');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('products', [
            'name' => 'Chocolate Cake',
            'category' => 'Cake',
            'description' => 'Dark chocolate',
            'price_idr' => 125000.50,
            'image_url' => 'https://example.com/cake.jpg',
            'stock' => 8,
        ]);
    }

    public function test_admin_can_update_product_in_the_products_table(): void
    {
        $product = Product::create([
            'name' => 'Old Cake',
            'category' => 'Cake',
            'description' => 'Old description',
            'price_idr' => 100000,
            'image_url' => 'https://example.com/old.jpg',
            'stock' => 2,
        ]);

        $response = $this->withSession(['is_admin_logged_in' => '1'])
            ->put(route('admin.products.update', ['id' => $product->id, 'tab' => 'products'], false), [
                'name' => 'New Cake',
                'category' => 'Tart',
                'description' => 'New description',
                'price_idr' => '175000',
                'image_url' => 'https://example.com/new.jpg',
                'stock' => '12',
            ]);

        $response->assertRedirect('/admin/dashboard?tab=products');
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'New Cake',
            'category' => 'Tart',
            'description' => 'New description',
            'price_idr' => 175000,
            'image_url' => 'https://example.com/new.jpg',
            'stock' => 12,
        ]);
    }

    public function test_admin_can_delete_product_from_the_products_table(): void
    {
        $product = Product::create([
            'name' => 'Cake to delete',
            'category' => 'Cake',
            'description' => 'Delete me',
            'price_idr' => 50000,
            'stock' => 1,
        ]);

        $response = $this->withSession(['is_admin_logged_in' => true])
            ->delete(route('admin.products.destroy', ['id' => $product->id, 'tab' => 'products'], false));

        $response->assertRedirect('/admin/dashboard?tab=products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_login_session_persists_while_performing_product_crud(): void
    {
        config([
            'app.url' => 'http://localhost:8000',
            'session.driver' => 'database',
        ]);

        $loginPage = $this->get('http://127.0.0.1:8000/login');
        $loginPage->assertRedirect('http://127.0.0.1:8000/admin/dashboard');

        $loginResponse = $this->post('http://127.0.0.1:8000/login', [
            'email' => env('ADMIN_EMAIL', 'admin@toko.com'),
            'password' => env('ADMIN_PASSWORD', 'admin123'),
        ]);

        $loginResponse->assertRedirect('/admin/dashboard');

        $dashboard = $this->get('http://127.0.0.1:8000/admin/dashboard');
        $dashboard->assertSee('action="/admin/products?tab=products"', false);

        $response = $this->post('http://127.0.0.1:8000/admin/products?tab=products', [
            'name' => 'Session Cake',
            'category' => 'Cake',
            'price_idr' => '90000',
            'stock' => '3',
        ]);

        $response->assertRedirect('/admin/dashboard?tab=products');
        $this->assertDatabaseHas('products', ['name' => 'Session Cake']);
    }

    public function test_admin_can_update_product_without_losing_session_when_host_differs_from_app_url(): void
    {
        config([
            'app.url' => 'http://localhost:8000',
            'session.driver' => 'database',
        ]);

        $product = Product::create([
            'name' => 'Before Edit',
            'category' => 'Cake',
            'description' => 'Original',
            'price_idr' => 90000,
            'stock' => 3,
        ]);

        $loginResponse = $this->post('http://127.0.0.1:8000/login', [
            'email' => env('ADMIN_EMAIL', 'admin@toko.com'),
            'password' => env('ADMIN_PASSWORD', 'admin123'),
        ]);
        $loginResponse->assertRedirect('/admin/dashboard');

        $dashboard = $this->get('http://127.0.0.1:8000/admin/dashboard');
        $dashboard->assertSee('action="/admin/products/'.$product->id.'?tab=products"', false);

        $response = $this->put('http://127.0.0.1:8000/admin/products/'.$product->id.'?tab=products', [
            'name' => 'After Edit',
            'category' => 'Tart',
            'description' => 'Updated',
            'price_idr' => '145000',
            'stock' => '9',
        ]);

        $response->assertRedirect('/admin/dashboard?tab=products');
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'After Edit',
            'category' => 'Tart',
            'description' => 'Updated',
            'price_idr' => 145000,
            'stock' => 9,
        ]);
    }

    public function test_admin_can_create_update_and_delete_product_on_the_same_host(): void
    {
        config([
            'app.url' => 'http://localhost:8000',
            'session.driver' => 'database',
        ]);

        $loginResponse = $this->post('http://127.0.0.1:8000/login', [
            'email' => env('ADMIN_EMAIL', 'admin@toko.com'),
            'password' => env('ADMIN_PASSWORD', 'admin123'),
        ]);
        $loginResponse->assertRedirect('/admin/dashboard');

        $dashboard = $this->get('http://127.0.0.1:8000/admin/dashboard');
        $dashboard->assertSee('action="/admin/products?tab=products"', false);

        $createResponse = $this->post('http://127.0.0.1:8000/admin/products?tab=products', [
            'name' => 'CRUD Flow Cake',
            'category' => 'Cake',
            'description' => 'Created then edited and deleted',
            'price_idr' => '80000',
            'stock' => '4',
        ]);
        $createResponse->assertRedirect('/admin/dashboard?tab=products');

        $product = Product::where('name', 'CRUD Flow Cake')->firstOrFail();
        $dashboard = $this->get('http://127.0.0.1:8000/admin/dashboard?tab=products');
        $dashboard->assertSee('action="/admin/products/'.$product->id.'?tab=products"', false);

        $updateResponse = $this->put('http://127.0.0.1:8000/admin/products/'.$product->id.'?tab=products', [
            'name' => 'CRUD Flow Cake Updated',
            'category' => 'Tart',
            'description' => 'Updated',
            'price_idr' => '95000',
            'stock' => '7',
        ]);
        $updateResponse->assertRedirect('/admin/dashboard?tab=products');
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'CRUD Flow Cake Updated',
            'category' => 'Tart',
            'price_idr' => 95000,
            'stock' => 7,
        ]);

        $deleteResponse = $this->delete('http://127.0.0.1:8000/admin/products/'.$product->id.'?tab=products');
        $deleteResponse->assertRedirect('/admin/dashboard?tab=products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_invalid_product_data_returns_to_products_tab_without_saving(): void
    {
        $dashboardUrl = '/admin/dashboard?tab=products';

        $response = $this->from($dashboardUrl)
            ->withSession(['is_admin_logged_in' => true])
            ->post(route('admin.products.store', ['tab' => 'products'], false), [
                'name' => 'Invalid Cake',
                'category' => 'Cake',
                'price_idr' => '-1',
                'stock' => '3',
            ]);

        $response->assertRedirect($dashboardUrl);
        $response->assertSessionHasErrors('price_idr');
        $this->assertDatabaseMissing('products', ['name' => 'Invalid Cake']);
    }

    public function test_product_crud_redirects_unauthenticated_requests_to_login(): void
    {
        $response = $this->post(route('admin.products.store', ['tab' => 'products'], false), [
            'name' => 'Unauthorized Cake',
            'category' => 'Cake',
            'price_idr' => 100000,
            'stock' => 1,
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('products', ['name' => 'Unauthorized Cake']);
    }

    public function test_admin_can_create_product_with_formatted_rupiah_price(): void
    {
        $response = $this->withSession(['is_admin_logged_in' => true])
            ->post(route('admin.products.store', ['tab' => 'products'], false), [
                'name' => 'Pandan Roll Cake',
                'category' => 'Pastry',
                'description' => 'Aroma pandan wangi',
                'price_idr' => '150.000',
                'image_url' => 'images/pandan.jpg',
                'stock' => '15',
            ]);

        $response->assertRedirect('/admin/dashboard?tab=products');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('products', [
            'name' => 'Pandan Roll Cake',
            'price_idr' => 150000,
            'stock' => 15,
        ]);
    }

    public function test_admin_can_create_order_manually_and_it_connects_to_database(): void
    {
        $product = Product::create([
            'name' => 'Strawberry Tart',
            'category' => 'Tart & Cake',
            'description' => 'Fresh strawberry',
            'price_idr' => 200000,
            'stock' => 10,
        ]);

        $response = $this->withSession(['is_admin_logged_in' => true])
            ->post(route('admin.orders.store', ['tab' => 'orders'], false), [
                'product_id' => $product->id,
                'customer_name' => 'Dewi Sartika',
                'customer_phone' => '08123456789',
                'quantity' => 2,
                'delivery_date' => now()->addDays(1)->format('Y-m-d'),
                'order_type' => 'delivery',
                'status' => 'pending',
                'address' => 'Jl. Mawar No. 10',
            ]);

        $response->assertRedirect('/admin/dashboard?tab=orders');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('orders', [
            'product_id' => $product->id,
            'customer_name' => 'Dewi Sartika',
            'quantity' => 2,
            'total_price' => 400000,
        ]);

        // Stok berkurang otomatis
        $this->assertEquals(8, $product->fresh()->stock);
    }

    public function test_admin_can_update_order_status_in_database(): void
    {
        $product = Product::create([
            'name' => 'Cheesecake',
            'category' => 'Tart & Cake',
            'description' => 'Cheese cake',
            'price_idr' => 100000,
            'stock' => 5,
        ]);

        $order = Order::create([
            'order_code' => 'TEST-001',
            'product_id' => $product->id,
            'customer_name' => 'Rina',
            'customer_phone' => '0811111111',
            'quantity' => 1,
            'delivery_date' => now()->format('Y-m-d'),
            'total_price' => 100000,
            'status' => 'pending',
        ]);

        $response = $this->withSession(['is_admin_logged_in' => true])
            ->patch(route('admin.order.status', ['id' => $order->id, 'tab' => 'orders'], false), [
                'status' => 'completed',
            ]);

        $response->assertRedirect('/admin/dashboard?tab=orders');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'status' => 'completed',
        ]);
    }

    public function test_admin_can_delete_order_from_database(): void
    {
        $product = Product::create([
            'name' => 'Brownies',
            'category' => 'Pastry',
            'description' => 'Choco',
            'price_idr' => 50000,
            'stock' => 5,
        ]);

        $order = Order::create([
            'order_code' => 'TEST-DEL',
            'product_id' => $product->id,
            'customer_name' => 'Doni',
            'customer_phone' => '0822222222',
            'quantity' => 1,
            'delivery_date' => now()->format('Y-m-d'),
            'total_price' => 50000,
            'status' => 'pending',
        ]);

        $response = $this->withSession(['is_admin_logged_in' => true])
            ->delete(route('admin.order.destroy', ['id' => $order->id, 'tab' => 'orders'], false));

        $response->assertRedirect('/admin/dashboard?tab=orders');
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }

    public function test_dashboard_displays_success_notification(): void
    {
        $response = $this->withSession([
            'is_admin_logged_in' => true,
            'success' => 'Operasi database sukses!',
        ])->get(route('admin.dashboard', [], false));

        $response->assertOk();
        $response->assertSee('Operasi database sukses!');
        $response->assertSee('Aksi Berhasil Disimpan ke Database');
    }
}
