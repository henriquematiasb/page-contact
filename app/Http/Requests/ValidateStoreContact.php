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
            'email' => 'required|regex:/^.+@.+$/i|unique:contacts,email',
            'phone' => 'required|regex:"^\(?\d{2}\)?[\s-]?[\s9]?\d{4}-?\d{4}$"',
            'message' => 'required',
            'attachedFile' => [
                'required',
                'file',
                'mimes:pdf,doc,docx,odt,txt',
                function($attribute, $value, $fail) {
                    $size = intval($value->getSize());
                    $valueDefault = 500000;
                    if ($size > $valueDefault) {
                        return $fail('O Tamanho máximo do arquivo para upload é de 500MB!');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, informe seu nome',

            'email.required'  => 'Por favor, informe seu e-mail',
            'email.regex' => 'O e-mail informado é inválido, por favor tente novamente',
            'email.unique' => 'O e-mail informado já foi cadastrado',

            'phone.required'  => 'Por favor, informe seu telefone',
            'phone.regex' => 'O telefone informado é inválidom por favor tente novamente',

            'message.required'  => 'A mensagem é obrigatória',

            'attachedFile.required' => 'O campo arquivo para Upload é obrigatório!',
            'attachedFile.file' => 'O campo arquivo para Upload tem que conter um arquivo!',
            'attachedFile.mimes' => 'O arquivo anexado deve ser um arquivo .pdf, .doc, .docx, .odt ou .txt!',

        ];
    }
}
