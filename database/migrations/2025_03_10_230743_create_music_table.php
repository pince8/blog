<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Şarkı adı
            $table->string('singer');         // Şarkıcı adı
            $table->string('genre');          // Müzik türü
            $table->decimal('rating', 3, 1);  // Puan (örneğin: 8.5)
            $table->boolean('status')->default(true); // 1: aktif, 0: pasif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('musics');
    }
};
