<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enums\CategoryMaterialStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
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
        return [
            'estado' => fake()->randomElement(CategoryMaterialStatus::class),
            'nombre' => fake()->word(),
            'creado_a' => now(),
            'actualizado_a' => now(),
        ];
    }

    /**
     * Indicate that the category is active.
     */
    public function active(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'estado' => CategoryMaterialStatus::ACTIVE,
            ];
        });
    }
}
