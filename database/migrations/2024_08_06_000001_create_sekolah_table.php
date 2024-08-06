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
            $table->enum('level', ['sd', 'smp', 'sma']);
            $table->enum('status', ['aktif', 'tidakaktif']);
            $table->string('npsn');
            $table->string('nsm');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('kalendar_akademik');
            $table->string('no');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('logo_kanan');
            $table->string('logo_kiri');
            $table->string('nama_kamad');
            $table->enum('status_kamad', ['aktif','tidakaktif']);
            $table->string('nip_kamad');
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
