<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamAbsen extends Model
{
    use HasFactory;
    protected $table = 'jam_absen';
    protected $guarded = ['id'];

    public function getJamMasukAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }

    // Accessor untuk jam_terlambat
    public function getJamTerlambatAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }
}
