<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'tb_news';
    protected $fillable = ['title','writer','thumb','information','statut','user_id'];
    public $timestamps = false;
}
