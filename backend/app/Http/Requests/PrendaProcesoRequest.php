<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PrendaProcesoRequest extends FormRequest
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
            'prenda_id' => 'required|integer|exists:prendas,id',
            'proceso_id' => 'required|integer|exists:procesos,id',
        ];
    }

    public function messages(): array {
        return [
            'prenda_id.exists' => 'No existe la prenda especificada',
            'proceso_id.exists' => 'No existe el proceso especificado',
        ];
    }
}
