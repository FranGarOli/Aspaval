<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//necesario para comprobar la contraseña
use Illuminate\Validation\Rules;

class AccountRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'birthday' => ['required','before:today'],
            'twitter' => ['nullable' ,'min:2', 'max:255'],
            'instagram' => ['nullable' ,'min:2', 'max:255'],
            'twitch' => ['nullable' ,'min:2', 'max:255'],
            'image' => ['nullable', 'image'],
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre completo es obligatorio.',
            'name.min' => 'El nombre completo debe tener como mínimo 5 carácteres.',
            'name.max' => 'El nombre completo debe tener como máximo 255 carácteres.',
            'birthday.required' => 'La fecha de tu nacimiento es obligatoria.',
            'birthday.before' => 'La fecha de tu nacimiento debe ser anterior a hoy.',
            'twitter.min' => 'El nombre de usuario de twitter debe tener como mínimo 5 carácteres.',
            'twitter.max' => 'El nombre de usuario de twitter debe tener como máximo 255 carácteres.',
            'instagram.min' => 'El nombre de usuario de instagram debe tener como mínimo 5 carácteres.',
            'instagram.max' => 'El nombre de usuario de instagram debe tener como máximo 255 carácteres.',
            'twitch.min' => 'El nombre de usuario de twitch debe tener como mínimo 5 carácteres.',
            'twitch.max' => 'El nombre de usuario de twitch debe tener como máximo 255 carácteres.',
            'image.mimes' => 'La imagen debe ser formato .png',
        ];
    }
}
