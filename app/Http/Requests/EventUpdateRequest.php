<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EventUpdateRequest extends FormRequest
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
            // 'name' => ['required', 'min:5', 'max:255', Rule::unique('events', 'name')->ignore($this->event)],
            'name' => ['required', 'min:5', 'max:15'],
            'description' => ['required', 'min:5', 'max:5000'],
            'location' => ['required', 'min:5', 'max:255'],
            'date' => ['required', 'after:today'],
            'hour' => ['required'],
            'tags' => ['min:3', 'max:25'],
        ];
    }

    public function messages()
    {
        return [
            // 'name.unique' => 'El título ya existe.',
            'name.required' => 'El título es obligatorio.',
            'name.min' => 'El título debe tener como mínimo 5 carácteres.',
            'name.max' => 'El título debe tener como máximo 15 carácteres.',
            'description.required' => 'La descripción es obligatoria.',
            'description.min' => 'La descripción debe tener como mínimo 5 carácteres.',
            'description.max' => 'La descripción es demasiado larga.',
            'location.required' => 'La localización es obligatoria.',
            'location.min' => 'La localización debe tener como mínimo 5 carácteres.',
            'location.max' => 'La localización es demasiado larga.',
            'date.required' => 'La fecha es obligatoria',
            'date.before' => 'La fecha debe ser actual o posterior a hoy',
            'hour.required' => 'La hora es obligatoria',
            'tags.min' => 'El tag debe ser mayor de 3 carácteres.',
            'tags.max' => 'El tag debe ser menor de 25 carácteres.',
        ];
    }
}
