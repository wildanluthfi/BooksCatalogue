<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['Title', 'Synopsis', 'Author', 'ReleaseYear', 'CoverURL'];

    public $timestamps = false;

    public function reviews()
    {
        return $this->hasMany('App\Review', 'BookId');
    }
}
