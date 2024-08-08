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
        Schema::create('jam_absen',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('sekolah_id');
            $table->string('hari');
            $table->time('jam_masuk');
            $table->time('jam_terlambat');
            $table->timestamps();
            $table->foreign('sekolah_id')->references('id')->on('sekolah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_absen');
    }
};
