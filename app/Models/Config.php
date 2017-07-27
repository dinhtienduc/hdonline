<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'tb_config';

    protected $fillable = ['name','content','footer','user_id'];

    public $timestamp = false;

    public function User(){
        return $this->belongTo('App\Models\User');
    }
}
