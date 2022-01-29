<?php

namespace App\Http\Requests;

class UserRegisterRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            // 'password'=>'required|string|confirmed',
        ];
    }
}
