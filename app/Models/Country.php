<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'tb_country';

    protected $fillable = ['name','infomation','url_more','thumb','parent_id'];

    public function Movies(){
        return $this->hasMany('App\Models\Movies');
    }
}
