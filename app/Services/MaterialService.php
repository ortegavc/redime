<?php

namespace App\Services;

use App\Models\Material;
use Illuminate\Http\Request;


class MaterialService
{
    public function create(Request $request): Material
    {
        return Material::create($request->all());
    }
}