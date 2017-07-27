<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'txtUserName'   => 'required|unique:tb_users,username',
            'txtEmail'      => 'required|email|unique:tb_users,email',
            'txtPassword'   => 'required',
            'txtRePassword' => 'required|same:txtPassword'
        ];
    }

    public function messages(){
        return[
            'txtUserName.required'      =>'Please Enter Username',
            'txtUserName.unique'        =>'User Is Exists',
            'txtEmail.required'         =>'Please Enter Your Email',
            'txtEmail.email'            =>'You Enter Not Email',
            'txtEmail.unique'           =>'Email Is Exists',
            'txtPassword.required'      =>'Please Enter Password',
            'txtRePassword.required'    =>'Please Enter RePassword',
            'txtRePassword.same'        =>'Two Password Dont Match'
        ];
    }
}
