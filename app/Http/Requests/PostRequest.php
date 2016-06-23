<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
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
            'titulo.required'=>'Preencha um titulo',
            'titulo.max'=>'Titulo deve ter até 255 caracteres',
            'conteudo.required'=>'Preencha um conteúdo',            
            'imagem.required'=>'Por favor envie uma imagem válida',
            'imagem.image'=>'O arquivo enviado não é uma imagem'
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
            'titulo'=>'required|max:255',
            'conteudo'=>'required',
            'imagem'=>'image'
        ];
    }
}
