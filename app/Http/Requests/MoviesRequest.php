<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest
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
        //movies
            'selectCate'    => 'required',
            'selectActor'   => 'required',
            'selectCountry' => 'required',
            'txtTitle'      => 'required|unique:tb_movies,title',
            'txtTitleSEO'   => 'required',
            'txtDescrip'    => 'required',
            'txtDirec'      => 'required',
            'fimages'       => 'required',
        //episode
            'txtEpisode'    => 'required',
            'txtEpisodeUrl' => 'required',
        ];
    }
    public function messages(){
        return[
            'selectCate.required'   =>'Please Enter Category',
            'selectActor.required'  =>'Please Enter Actor',
            'selectCountry.required'=>'Please Enter Country',
            'txtTitle.required'     =>'Please Enter Name Film',
            'txtTitle.unique'       =>'This Name Actor Is Exist',
            'txtTitleSEO.required'  =>'Please Enter Name SEO Film',
            'txtDescrip.required'   =>'Please Enter Name Description',
            'txtDirec.required'     =>'Please Enter Name Director',
            'fimages.required'      =>'Please Choose A Image',
            'txtEpisode.required'   =>'Please Enter Name Episode',
            'txtEpisodeUrl.required'=>'Please Enter URL Episode',  
        ];
    }
}
