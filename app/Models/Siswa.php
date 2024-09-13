<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    static function authSiswa()
    {
        if (Auth::guard('siswa')->user()) {
            return Auth::guard('siswa')->user();
        } elseif (Auth::guard('wali')->user()) {
            $wali = Auth::guard('wali')->user();
            return Siswa::find($wali->siswa_id);
        }
    }

    public function metaSiswa()
    {
        return $this->hasMany(MetaSiswa::class, 'siswa_id', 'id');
    }
    protected $hidden = ['password'];
}
