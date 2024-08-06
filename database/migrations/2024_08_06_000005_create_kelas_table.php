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
            $table->enum('tingkat', ['sd', 'smp', 'sma']);
            $table->enum('jurusan', ['ipa', 'ips']);
            $table->string('urusan_kelas');
            $table->string('kelompok');
            $table->string('live');
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
