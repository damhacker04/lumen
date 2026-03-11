<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Laptop Asus ROG', 'price' => 15000000],
            ['name' => 'Keyboard Mechanical Noir', 'price' => 950000],
            ['name' => 'Mouse Logitech G Pro', 'price' => 1200000],
            ['name' => 'Monitor LG 24 Inch', 'price' => 2100000],
            ['name' => 'Headset Razer Kraken', 'price' => 850000],
        ];

        foreach ($products as $product) {
            // Menggunakan pemanggilan namespace secara langsung
            \App\Models\Product::create($product); 
        }
    }
}