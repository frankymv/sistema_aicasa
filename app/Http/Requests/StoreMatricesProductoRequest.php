<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMatricesProductoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'codigo' => 'required|string|max:50|unique:matrices_productos,codigo',
        'matriz_base' => 'required|string|max:255',
        'familia' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
        'codigo.required' => 'El código es obligatorio.',
        'codigo.unique' => 'El código ya existe.',
        'matriz_base.required' => 'El campo es obligatorio.',
        'familia.required' => 'El campo es obligatorio.',
        ];
    }
}
