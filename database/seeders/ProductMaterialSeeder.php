<?php

namespace Database\Seeders;

use App\Models\ProductMaterial;
use Illuminate\Database\Seeder;

class ProductMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductMaterial::create([
            'product_id' => 2,
            'material_id' => 1,
            'quantity' => 1.4,
        ]);

        ProductMaterial::create([
            'product_id' => 2,
            'material_id' => 2,
            'quantity' => 15,
        ]);

        ProductMaterial::create([
            'product_id' => 2,
            'material_id' => 4,
            'quantity' => 1,
        ]);

        ProductMaterial::create([
            'product_id' => 1,
            'material_id' => 1,
            'quantity' => 0.8,
        ]);

        ProductMaterial::create([
            'product_id' => 1,
            'material_id' => 3,
            'quantity' => 5,
        ]);

        ProductMaterial::create([
            'product_id' => 1,
            'material_id' => 2,
            'quantity' => 10,
        ]);
    }
}
