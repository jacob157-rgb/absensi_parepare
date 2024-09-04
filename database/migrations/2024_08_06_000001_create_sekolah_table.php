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
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('instansi');
            $table->string('sub_instansi');
            $table->string('nama');
            $table->enum('level', ['TK/RA', 'SD/MI', 'SMP/MTS', 'SMA/MA', 'PERGURUAN TINGGI']);
            $table->enum('status', ['ACTIVE', 'NON ACTIVE']);
            $table->string('nsm', 12);
            $table->string('npsn', 8);
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('latitude');
            $table->string('longitude');

            $table->string('logo_kanan')->nullable();
            $table->string('logo_kiri')->nullable();
            $table->string('nama_kamad')->nullable();
            $table->enum('status_kamad', ['PNS','NON PNS'])->nullable();
            $table->string('nip_kamad')->nullable();

            $table->string('tempat_cetak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
