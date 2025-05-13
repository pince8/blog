<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    // Veritabanı tablosu adı
    protected $table = 'series'; // Tablo adı

    // Hangi alanların toplu olarak doldurulabileceğini belirtir
    protected $fillable = [
        'series_name', // Dizi adı
        'director',    // Yönetmen
        'genre',       // Tür
        'rating',      // Puan
        'description', // Açıklama
        'season',
    ];
}
