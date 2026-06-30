<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BordadoRequest extends FormRequest
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
            'forma' => 'required|string|between:2,50',
            'color_hilo_id' => 'required|integer|exists:colores_hilo,id'
        ];
    }

    public function messages(): array {
        return [
            'forma.between' => 'La forma debe tener de 2 a 50 caracteres',
            'color_hilo_id.exists' => 'No existe el color de hilo especificado'
        ];
    }
}
