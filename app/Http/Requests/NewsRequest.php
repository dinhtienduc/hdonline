<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'txtName'    => 'required|unique:tb_news,title',
            'txtWriter'  => 'required',
            'txtInfo'    => 'required',
            'txtShort'   => 'required',
            'fimages'    => 'required',
            'fimages'    => 'image',
        ];
    }
    public function messages(){
        return[
            'txtName.required'  =>'Please Enter Name News',
            'txtName.unique'    =>'This Name News Is Exist',
            'txtWriter.required'=>'Please Enter Name Writer',
            'txtShort.required' =>'Please Enter Shortly',
            'txtInfo.required'  =>'Please Enter Information News',
            'fimages.required'  =>'Please Choose A Image',
            'fimages.image'     =>'This Is Not Images'
            
        ];
    }
}
