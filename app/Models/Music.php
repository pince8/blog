<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    // Bu satıra gerek yok çünkü Laravel otomatik olarak `musics` tablosunu bulur
    // Ama istersen açıkça belirtilebilir:
    protected $table = 'musics';

    protected $fillable = [
        'name',
        'singer',
        'genre',
        'rating',
        'status',
    ];
}
