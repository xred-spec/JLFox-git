<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ColorHiloRequest extends FormRequest
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
            'color' => 'required|string|max:50|unique:color_hilos,color'
        ];
    }

    public function messages(): array {
        return [
            'color.max' => 'El color solo puede contener 50 caracteres',
            'color.unique' => 'El color ya está registrado, intente con otro nombre'
        ];
    }
}

