<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class BaseRequest extends Request
{
    public function messages()
    {
        return [
            'name.required' => 'É preciso informar o nome!',
            'email.required'  => 'É preciso informa o email!',
            'email.unique'  => 'Email já cadastrado!',
            'email.email'  => 'Email inválido!',
            'password.required'  => 'É preciso informar a senha!',
            'genre.required' => 'É preciso informar o genero!',
            'categoria.min' => 'A categoria precisa ter pelo menos :min letras!',
            'categoria.required' => 'É preciso informar a categoria!',
            'genre.min' => 'O genero precisa ter pelo menos :min letras!',
            'min' => ':attribute precisa ter pelo menos :min letras!',
            'required' => 'É preciso informar o :attribute!',
        ];
    }
}
