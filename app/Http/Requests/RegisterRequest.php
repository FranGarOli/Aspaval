<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//necesario para comprobar la contraseña
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'min:4', 'max:20', 'unique:users'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8' ,Rules\Password::defaults()],
            'birthday' => ['required','before:today'],
            'image' => ['nullable', 'image'],
            'twitter' => ['nullable', 'string', 'min:3', 'max:255'],
            'instagram' => ['nullable', 'string', 'min:3', 'max:255'],
            'twitch' => ['nullable', 'string', 'min:3', 'max:255'],
        ];
    }

    public function messages(){
        return [
            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.min' => 'El nombre de usuario debe tener como mínimo 5 carácteres.',
            'username.max' => 'El nombre de usuario debe tener como máximo 255 carácteres.',
            'username.unique' => 'El nombre de usuario ya existe.',
            'name.required' => 'El nombre completo es obligatorio.',
            'name.min' => 'El nombre completo debe tener como mínimo 5 carácteres.',
            'name.max' => 'El nombre completo debe tener como máximo 255 carácteres.',
            'email.required' => 'El email es obligatorio.',
            'email.max' => 'El email debe tener como máximo 255 carácteres.',
            'email.unique' => 'El email ya existe.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener como mínimo 8 carácteres.',
            'birthday.required' => 'La fecha de tu nacimiento es obligatoria.',
            'birthday.before' => 'La fecha de tu nacimiento debe ser anterior a hoy.',
            'image.image' => 'Formato incorrecto.',
            'twitter.min' => 'El nombre de usuario de twitter debe tener como mínimo 3 carácteres.',
            'twitter.max' => 'El nombre completo debe tener como máximo 255 carácteres.',
            'instagram.min' => 'El nombre de usuario de instagram debe tener como mínimo 3 carácteres.',
            'instagram.max' => 'El nombre completo debe tener como máximo 255 carácteres.',
            'twitch.min' => 'El nombre de usuario de twitch debe tener como mínimo 3 carácteres.',
            'twitch.max' => 'El nombre completo debe tener como máximo 255 carácteres.',
        ];
    }
}
