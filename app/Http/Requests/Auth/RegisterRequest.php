<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'max:20', 'min:3'],
            'email' => ['email', 'required', 'min:8'],
            'password' => ['required', 'min:8']
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username tidak boleh kosong',
            'username.max' => 'Username maksimal 20 karakter',
            'username.min' => 'Username minimal 3 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus valid',
            'email.min' => 'Username minimal 8 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
        ];
    }
}
