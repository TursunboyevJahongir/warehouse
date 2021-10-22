<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([
            'material_id' => 1,
            'remainder' => 12,
            'price' => 1500,
        ]);

        Warehouse::create([
            'material_id' => 1,
            'remainder' => 200,
            'price' => 1600,
        ]);

        Warehouse::create([
            'material_id' => 2,
            'remainder' => 40,
            'price' => 500,
        ]);

        Warehouse::create([
            'material_id' => 2,
            'remainder' => 300,
            'price' => 550,
        ]);

        Warehouse::create([
            'material_id' => 3,
            'remainder' => 500,
            'price' => 300,
        ]);

        Warehouse::create([
            'material_id' => 4,
            'remainder' => 1000,
            'price' => 2000,
        ]);
    }
}
