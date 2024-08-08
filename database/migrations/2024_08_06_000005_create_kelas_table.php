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
        Schema::create('kelas',function(Blueprint $table){
            $table->id();
            $table->enum('tingkat_kelas', ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII']);
            $table->enum('jurusan', ['IPA', 'IPS', 'UMUM', 'TIDAK_ADA']);
            $table->string('urusan_kelas');
            $table->string('kelompok')->nullable();
            $table->text('live')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
