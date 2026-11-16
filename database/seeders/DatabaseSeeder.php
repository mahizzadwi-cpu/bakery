<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (Product::count() > 0) {
            return;
        }

        // 1. Data Katalog Produk Baking & Minuman (Estetik & Lengkap)
        $products = [
            [
                'name' => 'Signature Basque Burnt Cheesecake (18cm)',
                'category' => 'Tart & Cake',
                'description' => 'Bagian tengah lembut creamy dengan kerak karamel khas, menggunakan 100% French cream cheese dan ekstrak vanilla bean asli.',
                'price_idr' => 285000,
                'image_url' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?auto=format&fit=crop&w=800&q=80',
                'stock' => 12,
            ],
            [
                'name' => 'Valrhona 70% Dark Chocolate Silk Tart',
                'category' => 'Tart & Cake',
                'description' => 'Mousse cokelat hitam Valrhona murni berpadu dengan crust almond sablé renyah dan aksen edible gold leaf 24k.',
                'price_idr' => 320000,
                'image_url' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80',
                'stock' => 8,
            ],
            [
                'name' => 'Strawberry Pistachio Fraisier Tart',
                'category' => 'Tart & Cake',
                'description' => 'Kombinasi krim diplomat pistachio gurih, sponge genoise ringan, dan buah stroberi segar berkualitas tinggi.',
                'price_idr' => 345000,
                'image_url' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=800&q=80',
                'stock' => 6,
            ],
            [
                'name' => 'French Butter Croissant Box (Isi 6)',
                'category' => 'Pastry',
                'description' => 'Lapisan sarang lebah honeycomb renyah dengan aroma harum mentega AOP Normandy Prancis.',
                'price_idr' => 165000,
                'image_url' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=800&q=80',
                'stock' => 20,
            ],
            [
                'name' => 'Pain au Chocolat Truffle (Isi 4)',
                'category' => 'Pastry',
                'description' => 'Pastry mentega berlapis dengan isian dua batang dark chocolate batons premium yang meleleh saat dihangatkan.',
                'price_idr' => 140000,
                'image_url' => 'https://images.unsplash.com/photo-1608198093002-ad4e005484ec?auto=format&fit=crop&w=800&q=80',
                'stock' => 15,
            ],
            [
                'name' => 'Kyoto Ceremonial Matcha Cold Brew (500ml)',
                'category' => 'Beverage',
                'description' => 'Matcha ceremonial grade asli Uji Kyoto dipadukan dengan artisan creamy oat milk dan nektar agave.',
                'price_idr' => 68000,
                'image_url' => 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?auto=format&fit=crop&w=800&q=80',
                'stock' => 25,
            ],
            [
                'name' => 'Madagascar Vanilla Cold Brew Latte (500ml)',
                'category' => 'Beverage',
                'description' => 'Biji kopi arabika pilihan diseduh dingin selama 18 jam dengan infus sirup vanila polong Madagaskar.',
                'price_idr' => 62000,
                'image_url' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?auto=format&fit=crop&w=800&q=80',
                'stock' => 30,
            ],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }

        // 2. Data Contoh Riwayat Pesanan Awal (Untuk Uji Coba Dashboard Admin & Struk)
        $firstProduct = Product::first();
        $secondProduct = Product::skip(1)->first();

        Order::create([
            'order_code'     => 'MA-SAMPLE1',
            'product_id'     => $firstProduct->id,
            'customer_name'  => 'Nadia Clarissa',
            'customer_phone' => '081298765432',
            'quantity'       => 1,
            'delivery_date'  => now()->addDays(2)->format('Y-m-d'),
            'order_type'     => 'delivery',
            'address'        => 'Jl. Merbabu No. 15, RT 03/RW 04',
            'order_notes'    => 'Tulisan di cokelat: "Happy 25th Birthday Sarah"',
            'total_price'    => $firstProduct->price_idr,
            'status'         => 'confirmed',
        ]);

        Order::create([
            'order_code'     => 'MA-SAMPLE2',
            'product_id'     => $secondProduct->id,
            'customer_name'  => 'Budi Prasetyo',
            'customer_phone' => '085712348899',
            'quantity'       => 2,
            'delivery_date'  => now()->addDays(1)->format('Y-m-d'),
            'order_type'     => 'pickup',
            'address'        => null,
            'order_notes'    => 'Ambil di toko jam 14.00 WIB',
            'total_price'    => $secondProduct->price_idr * 2,
            'status'         => 'completed',
        ]);
    }
}