<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Course extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'tutor' => 'required|min:3|max:8',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, insira o nome do curso',
            'email.required' => 'Por favor, insira o e-mail do curso',
            'email.email' => 'Por favor, informe um endereço de e-mail que seja válido'
        ];
        // return parent::messages()
    }
}
