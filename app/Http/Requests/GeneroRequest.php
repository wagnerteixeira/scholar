<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

use Log;
class GeneroRequest extends BaseRequest
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
        log::info("request: ".$this);
        return [
            'genre' => 'required|min:3',            
            'categoria' => 'required|min:3',
        ];
    }
}
