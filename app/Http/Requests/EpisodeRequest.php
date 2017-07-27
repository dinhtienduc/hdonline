<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'txtEpisode'    => 'required',
            'txtEpisodeUrl' => 'required',
            'txtEpisodeSub' => 'required',
            'txtEpisodeLang'=> 'required',
        ];
    }
    public function messages(){
        return[
            'txtEpisode.required'   =>'Please Enter Name Episode',
            'txtEpisodeUrl.required'=>'Please Enter URL Episode',
            'txtEpisodeSub.required'=>'Please Enter URL Sub Episode',
            'txtEpisodeLang.required'=>'Please Enter URL Lang Episode',
        ];
    }
}
