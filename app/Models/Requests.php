<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'tb_request';

    protected $fillable = ['name','email','user_id'];

    public $timestamp = false;

    public function User(){
        return $this->belongTo('App\Models\User');
    }
}
