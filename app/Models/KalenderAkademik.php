<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
    use HasFactory;
    protected $table = 'kalender_akademik';
    protected $guarded = ['id'];

    public function lembaga()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
    
    static function getByLembaga($lembaga) {
        return static::where('sekolah_id', $lembaga)->get();
    }
}
