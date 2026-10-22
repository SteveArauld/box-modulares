<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucfirst($this->faker->unique()->words(2, true));
        $slug = Str::slug($name);

        return [
            'parent_id' => null,
            'name' => array_fill_keys(['es', 'it', 'de', 'pt'], $name),
            'slug' => array_fill_keys(['es', 'it', 'de', 'pt'], $slug),
            'is_visible' => true,
        ];
    }
}
