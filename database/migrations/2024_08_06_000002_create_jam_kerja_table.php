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
        Schema::create('jam_kerja',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('sekolah_id');
            $table->string('nama');
            $table->string('hari_libur'); // ex : ['SENIN', 'SELASA', 'ETC..']
            $table->timestamps();

            $table->foreign('sekolah_id')->references('id')->on('sekolah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_kerja');
    }
};
