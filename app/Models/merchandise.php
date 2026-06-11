<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class merchandise extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'description',
        'stock',
        'image_file'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
