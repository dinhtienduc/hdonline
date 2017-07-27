<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'tb_episode';

    protected $fillable = ['name','url','duration','thumb','slide','user_id','movies_id'];

    public $timestamp = false;

    public function User(){
        return $this->belongTo('App\Models\User');
    }

    public function Movies(){
        return $this->belongTo('App\Models\Movies');
    }
}
