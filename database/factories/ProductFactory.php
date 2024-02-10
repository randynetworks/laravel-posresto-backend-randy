<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'image' => $this->faker->imageUrl(),
            'stock' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->boolean,
            'favorite' => $this->faker->boolean,
            'category_id' => $this->faker->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
