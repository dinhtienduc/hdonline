<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tb_category';

    protected $fillable = ['name','name_seo','name_english'];

    // public $timestamp = false;

    public function Movies(){
        return $this->hasMany('App\Models\Movies');
    }
}
