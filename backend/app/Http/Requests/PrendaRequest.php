<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Prenda;

class PrendaRequest extends FormRequest
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
            'tipo' => ['required', Rule::enum(Prenda::class)],
            'talla' => 'required|integer|between:2,50',
            'tiene_cartera' => 'required|boolean',
            'cartera_tiene_bordado' => 'required|boolean',
            'tipo_prenda_id' => 'required|integer|exists:tipos_prenda,id',
            'color_tela_id' => 'required|integer|exists:colores_tela,id',
            'bordado_id' => 'nullable|integer|exists:bordados,id',
            'forro_id' => 'nullable|integer|exists:forros,id',
        ];
    }

    public function messages(): array {
        return [
            'talla.between' => 'La talla debe de estar entre 2 y 50',
        ];
    }
}
