<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserAndRoleSeeder::class,
            ProductSeeder::class,
            ProductBrandSeeder::class,
            ProductCategorySeeder::class,
            ProductImageSeeder::class,
            ProductBrandMappingSeeder::class,
            ProductCategoryMappingSeeder::class,

        ]);
    }
}
