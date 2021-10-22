<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => 1,
            'code' => 151321,
            'name' => "Ko’ylak",
        ]);

        Product::create([
            'id' => 2,
            'code' => 151324,
            'name' => "Shim",
        ]);


    }
}
