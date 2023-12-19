<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MaterialControllerTest extends TestCase
{
    public function test_validation_missing_required_fields(): void
    {
        $response = $this->postJson('/api/materials', []);
        $response->assertStatus(422);
    }

    public function test_validation_unknown_material_status(): void
    {
        // valid estado's values: ACTIVO, CANCELADO, ELIMINADO
        $response = $this->postJson('/api/materials', ['estado' => 'activo', 'nombre' => 'chuck']);
        $response->assertStatus(422);
    }

    public function test_validation_category_exist_in_db(): void
    {
        $response = $this->postJson('/api/materials', [
            'estado' => 'ACTIVO',
            'nombre' => fake()->word(),
            'descripcion' => fake()->paragraph(),
            'stock_minimo' => fake()->randomNumber(3, false),
            'categoria_id' => 0, // Catgory zero will never exist, so it's perfect for this test
        ]);
        $response->assertStatus(422);
    }

    public function test_store_material(): void
    {
        $category = Category::factory()->create();

        $response = $this->postJson('/api/materials', [
            'estado' => 'ACTIVO',
            'nombre' => fake()->word(),
            'descripcion' => fake()->paragraph(),
            'stock_minimo' => fake()->randomNumber(3, false),
            'categoria_id' => $category->id
        ]);

        $response->assertStatus(201);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')
                ->missing('message')
        );
    }

}
