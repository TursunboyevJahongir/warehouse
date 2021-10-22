<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warehouse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'material_id' => Material::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1,10),
        ];
    }
}
