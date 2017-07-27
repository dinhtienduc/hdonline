<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewed extends Model
{
    protected $table = 'tb_viewed';

    protected $fillable = ['viewed_day','viewed_month','viewed_year','movies_id'];

    public $timestamp = false;

    public function Movies(){
        return $this->belongTo('App\Models\Movies');
    }
}
