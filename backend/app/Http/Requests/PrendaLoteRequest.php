<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PrendaLoteRequest extends FormRequest
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
            'cantidad_prevista' => 'required|integer',
            'cantidad_proceso' => 'nullable|integer',
            'cantidad_final' => 'nullable|integer',
            'proceso_actual' => 'nullable|integer|exists:prendas_procesos,id',
            'lote_id' => 'required|integer|exists:lotes,id',
            'prenda_proceso_id' => 'required|exists:prendas_procesos,id'
        ];
    }
}
