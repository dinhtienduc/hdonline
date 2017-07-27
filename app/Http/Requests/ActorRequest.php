<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
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
            'txtName'    => 'required|unique:tb_actor,name',
            'txtInfo'    => 'required',
            'fimages'    => 'required',
            'fimages'    => 'image',
        ];
    }
    public function messages(){
        return[
            'txtName.required'  =>'Please Enter Name Actor',
            'txtName.unique'    =>'This Name Actor Is Exist',
            'txtInfo.required'  =>'Please Enter Information Actor',
            'fimages.required'  =>'Please Choose A Image',
            'fimages.image'     =>'This Is Not Images'
            
        ];
    }
}
