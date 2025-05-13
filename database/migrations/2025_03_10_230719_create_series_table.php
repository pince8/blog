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
        Schema::create('series', function (Blueprint $table) {
            $table->id(); // Varsayılan id alanı
            $table->string('series_name'); // Dizi adı
            $table->string('director');   // Yönetmen
            $table->string('genre');
            $table->integer('season');  //Sezon
            $table->decimal('rating', 3, 1); // Puan (0-10 arası, 1 ondalıklı sayı)
            $table->text('description')->nullable(); // Açıklama (isteğe bağlı)
            $table->timestamps(); // Oluşturulma ve güncellenme zamanları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
