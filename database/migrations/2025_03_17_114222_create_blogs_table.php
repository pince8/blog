<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Başlık
            $table->text('content'); // İçerik
            $table->string('image')->nullable(); // Resim sütunu ekledik (nullable çünkü her blogda fotoğraf olmayabilir)
            $table->timestamps(); // Oluşturulma ve güncellenme tarihi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs'); // Eğer tabloyu geri almak istersek, tabloyu siliyoruz
    }
};
