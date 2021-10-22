<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    public function configure(): ProductFactory
    {
        //image ))
        $fake = $this->faker;
        return $this->afterCreating(static function(Product $product) use ($fake) {
            @mkdir(public_path('/uploads/product/'), 0777, true);
            $time = time() . random_int(1000, 60000);
            copy($fake->imageUrl(), public_path('/uploads/product/') . $time . '.jpg');
            $path = '/uploads/product/' . $time . '.jpg';
            $product->image()->create([
                'name' => $fake->word(),
                'type' => $fake->fileExtension,
                'full_url' => $path,
                'additional_identifier' => 'product',
            ]);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique->word,
            'code' => $this->faker->unique->numberBetween(100000,999999)
        ];
    }
}
