<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePorcionProductoRequest extends FormRequest
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
        $id = $this->route('porcion_producto')?->id;
        return [
        'codigo' => 'required|string|max:50|unique:porcion_productos,codigo,' . $id,
        'cantidad' => 'required|numeric|min:0|max:500',
        'unidad' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:1000',
        ];
    }
}
