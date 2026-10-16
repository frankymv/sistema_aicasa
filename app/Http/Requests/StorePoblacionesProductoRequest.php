<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePoblacionesProductoRequest extends FormRequest
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
         $id = $this->route('poblacion_producto');
        return [
        'codigo' => [
                'required',
                'string',
                'max:50',
                Rule::unique('poblacion_productos', 'codigo')->ignore($id), // 3. Ignora el ID actual
            ],
        'poblacion_objetivo' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
        'codigo.required' => 'El código es obligatorio.',
        'codigo.unique' => 'El código ya existe.',
        'poblacion_objetivo.required' => 'El campo es obligatorio.',
        'descripcion.required' => 'El campo es obligatorio.',
        ];
    }
}
