<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enums\CategoryMaterialStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
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
            'descripcion' => fake()->paragraph(),
            'stock_minimo' => fake()->randomNumber(4, false),
            'creado_a' => now(),
            'actualizado_a' => now(),
        ];
    }

    /**
     * Indicate that the material is active.
     */
    public function active(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'estado' => CategoryMaterialStatus::ACTIVE,
            ];
        });
    }

    /**
     * Indicate that the material is canceled.
     */
    public function canceled(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'estado' => CategoryMaterialStatus::CANCELED,
            ];
        });
    }

    /**
     * Indicate that the material is deleted.
     */
    public function deleted(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'estado' => CategoryMaterialStatus::DELETED,
            ];
        });
    }
}
