namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Signature Basque Burnt Cheesecake',
                'category' => 'Tart & Cake',
                'description' => 'Rich creamy center with caramelized crust, crafted using premium French cream cheese and Madagascar vanilla beans.',
                'price_idr' => 285000,
                'image_url' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?auto=format&fit=crop&w=800&q=80',
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valrhona 70% Dark Chocolate Silk Tart',
                'category' => 'Tart & Cake',
                'description' => 'Decadent Valrhona dark chocolate mousse layered over almond sablé pastry with 24k gold leaf touch.',
                'price_idr' => 320000,
                'image_url' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80',
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Artisan Butter Croissant Box (6 Pcs)',
                'category' => 'Pastry',
                'description' => 'Classic French honeycomb interior with 72 layers of pure Normandy butter. Crisp, golden, and flaky.',
                'price_idr' => 165000,
                'image_url' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=800&q=80',
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ceremonial Matcha Oat Latte (Cold Brew 500ml)',
                'category' => 'Beverage',
                'description' => 'Single-origin Uji Kyoto ceremonial matcha shaken with creamy organic oat milk and raw agave nectar.',
                'price_idr' => 65000,
                'image_url' => 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?auto=format&fit=crop&w=800&q=80',
                'stock' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}