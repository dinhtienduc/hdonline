<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_users';

    protected $fillable = [
        'username','level', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // connect table
    public function Comment(){
        return $this->hasMany('App\Models\Comment');
    }

    public function Config(){
        return $this->hasMany('App\Models\Config');
    }

    public function Episode(){
        return $this->hasMany('App\Models\Episode');
    }

    public function Requests(){
        return $this->hasMany('App\Models\Requests');
    }
}
 