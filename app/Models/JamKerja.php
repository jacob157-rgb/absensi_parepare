<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamKerja extends Model
{
    use HasFactory;
    protected $table = 'jam_kerja';
    protected $guarded = ['id'];

    public function lembaga()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
}
