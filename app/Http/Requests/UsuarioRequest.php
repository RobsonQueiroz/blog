<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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

    public function messages()
    {
        return [
            'name.required'=>'Preencha um nome',
            'name.max'=>'Nome deve ter até 255 caracteres',
            'email.required'=>'Preencha um e-mail válido',
            'email.max'=>'E-mail deve ter até 255 caracteres',
            'email.unique'=>'Esse email já está cadastrado em nosso sistema',
            'data_de_nascimento.required'=>'Informe a data de nascimento',
            'data_de_nascimento.date'=>'Por favor informe a data no seguinte formato: dd-mm-aaaa',
            'password.required'=>'Por favor informe uma senaha',
            'password.min'=>'Sua senha deve ter no mínimo 6 dígitos',
            'foto'=>'O arquivo escolhido não é uma imagem válida.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|min:6',
            'data_de_nascimento'=>'required|date:d-m-Y',
            'foto'=>'image'
        ];

        
    }
     
}
