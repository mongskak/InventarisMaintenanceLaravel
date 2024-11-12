<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Products;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MaintenanceItem;
use App\Models\Maintenance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = Products::factory(10)->create();

        // Untuk setiap produk, kita buat 5 maintenance
        $products->each(function ($product) {
            Maintenance::factory(5)->create([
                'product_id' => $product->id,  // Menetapkan id produk untuk maintenance
            ]);
        });
        Maintenance::factory(10)->create();
        Item::factory(10)->create();
        MaintenanceItem::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);
    }
}
