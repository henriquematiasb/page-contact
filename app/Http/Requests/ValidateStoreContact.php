<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateStoreContact extends FormRequest
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
        //
        //
        return [
            'name' => 'required',
            'email' => 'required|regex:/^.+@.+$/i',
            'phone' => 'required|regex:"^\(?\d{2}\)?[\s-]?[\s9]?\d{4}-?\d{4}$"',
            'message' => 'required',
            //'attachedFile' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, informe seu nome',

            'email.required'  => 'Por favor, informe seu e-mail',
            'email.regex' => 'O e-mail informado é inválido, por favor tente novamente',

            'phone.required'  => 'Por favor, informe seu telefone',
            'phone.regex' => 'O telefone informado é inválidom por favor tente novamente',

            'message.required'  => 'A mensagem é obrigatória',

        ];
    }
}
