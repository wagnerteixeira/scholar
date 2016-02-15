<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;
use Cinema\User;

class UserUpdateRequest extends Request
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
 
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name'  => 'required',
                    'email'      => 'required|email|unique:users,email',
                    'password'   => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'email' => 'required|unique:users,email,'.$this->getSegmentFromEnd(),
                    //'email' => 'required|unique:users,email,'.$this->segment(2), tb funciona
                    //'user.password'   => 'required',
                ];
            }
            default:break;
        }
    }
    //pega os itens separados por / na rota , exemplo /usuario/1/edit, pegando o penultimo item, no caso o numero 1    
    private function getSegmentFromEnd($position_from_end = 1) {
        $segments =$this->segments();
        return $segments[sizeof($segments) - $position_from_end];
    }

    public function messages()
    {
        return [
            'name.required' => 'É preciso informar o nome!',
            'email.required'  => 'É preciso informa o email!',
            'email.unique'  => 'Email já cadastrado!',
            'password.required'  => 'É preciso informar a senha!',
        ];
    }
}
