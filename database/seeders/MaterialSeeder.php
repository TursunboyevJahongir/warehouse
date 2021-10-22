<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'id'=>1,
            'name' => "Mato",
        ]);

        Material::create([
            'id'=>2,
            'name' => "Ip",
        ]);

        Material::create([
            'id'=>3,
            'name' => "Tugma",
        ]);

        Material::create([
            'id'=>4,
            'name' => "Zamok",
        ]);
    }
}
