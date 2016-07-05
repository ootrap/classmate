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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | unique:users',
            'unit' => 'required',
            'address' => 'required | min:5',
            'mobile' =>'required | unique:users',
            'photo' => 'required | image | mimes:jpeg,jpg,png | max:50000',
        ];
    }
}
