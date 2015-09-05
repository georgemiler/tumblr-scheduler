<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $casts = [
        'data' => 'json'
    ];

    protected $fillable = ['id', 'data'];


}
