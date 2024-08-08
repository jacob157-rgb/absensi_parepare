<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Authenticatable
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];
    protected $hidden = [
        'password'
    ];
}
