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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->rememberToken();
            $table->unsignedBigInteger('sekolah_id');
            $table->unsignedBigInteger('kelas_id');
            $table->string('nisn')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN']);
            $table->string('password');
            $table->string('password_view');
            $table->timestamps();

            $table->foreign('sekolah_id')->references('id')->on('sekolah')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
