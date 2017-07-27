<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table = 'tb_movies';

    protected $fillable = ['title','title_seo','director','thumb','type','total','url_imdb','quality','category_id','actor_id','country_id'];

    public $timestamp = false;

    public function Episode(){
        return $this->hasMany('App\Models\Episode');
    }

    public function Country(){
        return $this->belongTo('App\Models\Country');
    }

    public function Viewed(){
        return $this->hasMany('App\Models\Viewed');
    }

    public function Actor(){
        return $this->belongTo('App\Models\Actor');
    }

    public function Category(){
        return $this->belongTo('App\Models\Category');
    }
}
