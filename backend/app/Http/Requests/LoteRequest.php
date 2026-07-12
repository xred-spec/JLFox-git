<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Lote;

class LoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**21
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'estado' => ['required', Rule::enum(Lote::class)],
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'nullable|date',

            'prendas' => 'required|array|min:1',
            'prendas.*.prenda_id' => 'required|integer|exists:prendas,id',
            'prendas.*.cantidad' => 'required|integer|min:1'
        ];
    }
}
