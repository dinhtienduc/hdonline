<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'tb_comment';

    protected $fillable = ['user_id','status','type'];

    public $timestamp = false;

    public function User(){
        return $this->belongTo('App\Models\User');
    }
}
