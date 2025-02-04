<?php

namespace Database\Factories;

use App\ProductCategory;
use App\ProductVendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Product>
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
        return [
            'name' => $this->faker->words(3, asText: true),
            'description' => $this->faker->paragraph(),
            'selling_price' => $this->faker->randomNumber(4),
            'stock_count' => $this->faker->numberBetween(100, 1000),
            'product_category_id' => ProductCategory::factory(),
            'product_vendor_id' => ProductVendor::factory(),
            'featured_product' => $this->faker->words(2, asText: true),
        ];
    }
}
