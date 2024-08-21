<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::first(); // Assuming you have already seeded products
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            ProductImages::create([
                'product_id' => $product1->id,
                'image_path' => $faker->imageUrl(),
                'alt_text' => $faker->text(50),
            ]);
        }
    }
}
