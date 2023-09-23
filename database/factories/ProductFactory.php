<?php

namespace Database\Factories;

use Bezhanov\Faker\Provider\Commerce;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new Commerce($this->faker));

        $productName = $this->faker->productName;

        return [
            "name" => $productName,
            "details" => $productName,
            "price" => $this->faker->randomFloat(2),
            "publish" => $this->faker->randomElement(["Yes", "No"])
        ];
    }
}
