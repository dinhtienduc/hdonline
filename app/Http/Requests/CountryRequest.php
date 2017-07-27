<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'txtName'   => 'required|unique:tb_country,name',
            'txtInfo'    => 'required',
            'txtNameSEO'    => 'required'
        ];
    }
    public function messages(){
        return[
            'txtName.required'  => 'Please Enter Name Country',
            'txtName.unique'    =>'This Name Country Is Exist',
            'txtInfo.required'   =>'Please Enter Information Country',
            'txtNameSEO.required'   =>'Please Enter NameSEO Country'
        ];
    }
}
