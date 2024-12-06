<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title', 'author', 'description', 'published_year', 'genre'];

}
