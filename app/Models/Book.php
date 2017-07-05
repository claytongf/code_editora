<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'cat_id',
        'author_id'
    ];

    public function Category(){
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }

    public function Author(){
        return $this->belongsTo('App\User', 'author_id');
    }
}
