<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Sadece aşağıdaki alanlara veritabanı üzerinden veri eklenebilir
    protected $fillable = ['title', 'content', 'image'];

    /**
     * Fotoğraf URL'sini döndüren bir accessor.
     * Eğer 'image' alanı boş değilse, fotoğraf URL'sini döndürür.
     */
    public function getImageUrlAttribute()
    {
        // 'image' alanı boşsa null döndürüyoruz, aksi takdirde fotoğraf URL'sini döndürüyoruz
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
