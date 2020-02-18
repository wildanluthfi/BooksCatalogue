<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['BookId', 'Comment', 'Rating', 'ReviewerName'];

    public $timestamps = false;

}
