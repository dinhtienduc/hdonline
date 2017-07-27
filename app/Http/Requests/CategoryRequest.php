<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'txtCateName'   => 'required|unique:tb_category,name',
            'txtNameSEO'    => 'required',
            'txtCateOrder'  => 'numeric'
        ];
    }

    public function messages(){
        return[
            'txtCateName.required'  => 'Please Enter Name Category',
            'txtCateName.unique'    =>'This Name Category Is Exist',
            'txtNameSEO.required'   =>'Please Enter NameSEO Category',
            'txtCateOrder.numeric'  =>'Please Enter A NumBer'
        ];
    }
}
