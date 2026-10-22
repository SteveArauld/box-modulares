<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $name = ucfirst($this->faker->unique()->words(3, true));
        $slug = Str::slug($name);
        $priceCents = $this->faker->numberBetween(5000, 500000);

        return [
            'category_id' => Category::factory(),
            'name' => array_fill_keys(['es', 'it', 'de', 'pt'], $name),
            'slug' => array_fill_keys(['es', 'it', 'de', 'pt'], $slug),
            'short_description' => array_fill_keys(['es', 'it', 'de', 'pt'], $this->faker->sentence()),
            'description' => array_fill_keys(['es', 'it', 'de', 'pt'], $this->faker->paragraph()),
            'sku' => (string) $this->faker->unique()->numberBetween(100000, 999999),
            'on_sale' => false,
            'prices' => [
                'price' => (string) $priceCents,
                'regular_price' => (string) $priceCents,
                'sale_price' => (string) $priceCents,
                'price_range' => null,
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'currency_minor_unit' => 2,
                'currency_decimal_separator' => ',',
                'currency_thousand_separator' => '.',
                'currency_prefix' => '€',
                'currency_suffix' => '',
            ],
            'images' => [],
        ];
    }
}
