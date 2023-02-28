<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => ['required', 'min:4', 'max:255'],
            'subject' => ['required', 'min:4', 'max:255'],
            'text' => ['required', 'min:4', 'max:5000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener como mínimo 4 carácteres.',
            'name.max' => 'El nombre es demasiado largo.',
            'subject.required' => 'El asunto es obligatorio.',
            'subject.min' => 'El asunto debe tener un mínimo de 4 carácteres.',
            'subject.required' => 'El asunto debe tener un máximo de 255 carácteres.',
            'text.required' => 'El texto es obligatorio.',
            'text.min' => 'El texto debe tener un mínimo de 4 carácteres.',
            'text.required' => 'El texto es demasiado largo.',
        ];
    }

}
