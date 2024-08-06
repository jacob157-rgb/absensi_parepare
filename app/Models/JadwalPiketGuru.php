<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPiketGuru extends Model
{
    use HasFactory;
    protected $table = 'jadwal_piket_guru';
    protected $guarded = ['id'];

}
