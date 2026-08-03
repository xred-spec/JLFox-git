<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\AreaProduccion;

class ProcesoRequest extends FormRequest
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
            'clave' => 'required|string|min:1',
            'descripcion' => 'required|string|min:1',
            'area' => ['required', Rule::enum(AreaProduccion::class)],
            'pieza_prenda_id' => 'required|integer|exists:prenda_piezas,id'
        ];
    }
}
