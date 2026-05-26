<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ColorTelaRequest extends FormRequest
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
            'nombre' => 'required|string|unique:colores_tela,nombre',
            'tela_id' => 'required|integer|exists:telas,id'
        ];
    }

    public function messages(): array {
        return [
            'nombre.unique' => 'El color de tela ya existe, intente con otro',
            'tela_id.exists' => 'No existe la tela especificada'
        ];
    }
}
