<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bio',
        'languages',
        'profile_picture'
    ];

    protected $casts = [
        'languages' => 'array' // JSON formatında saklamak için
    ];
}
