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
        ];
    }
}
