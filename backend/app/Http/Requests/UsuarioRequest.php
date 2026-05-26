<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'username' => 'required|string|between:5,20|unique:usuarios,username',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|srting|min:8|confirmed',
            'rol_id' => 'required|integer|exists:roles,id'
        ];
    }

    public function messages(): array {
        return [
            'username.between' => 'El nombre de usuario debe contener 5-20 caracteres',
            'email.unique' => 'El correo ya está registrado. Intente con otro diferente',
            'password.min' => 'La contraseña debe contener al menos 8 caracteres',
            'rol_id.exists' => 'No existe el rol especificado'
        ];
    }
}
