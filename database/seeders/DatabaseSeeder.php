<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Product::factory(10)->create();
         \App\Models\Material::factory(10)->create();
         \App\Models\ProductMaterial::factory(10)->create();
         \App\Models\Warehouse::factory(10)->create();
    }
}
