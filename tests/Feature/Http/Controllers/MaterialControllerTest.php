<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $category = Category::factory()->create();
        $response = $this->postJson('/api/materials', ['estado' => 'ACTIVO', 'nombre' => 'chuck', 'categoria_id' => $category->id]);
        $response->assertStatus(200);
    }
}
