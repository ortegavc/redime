<?php

namespace App\Http\Requests;

use App\Enums\CategoryMaterialStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMaterialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'estado' => ['required',Rule::enum(CategoryMaterialStatus::class)],
            'nombre' => 'required|unique:materiales|max:30',
            'categoria_id' => 'required|exists:App\Models\Category,id',
        ];
    }
}
