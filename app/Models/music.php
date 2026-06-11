<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class music extends Model
{
    protected $table = 'music';

    protected $fillable = [
        'user_id',
        'title',
        'artist',
        'genre',
        'music_file',
        'image_file',
    ];
}
