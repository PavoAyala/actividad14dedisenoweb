<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'body',
        'classification'
    ];

    protected $casts = [
        'date_time' => 'datetime'
    ];
}
