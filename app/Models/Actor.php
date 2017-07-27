<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'tb_actor';

    protected $fillable = ['name','infomation','url_more','thumb','parent_id'];

    public $timestamp = false;

    public function Movies(){
        return $this->hasMany('App\Models\Movies');
    }
}
