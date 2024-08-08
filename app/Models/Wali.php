<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Wali extends Authenticatable
{
    use HasFactory;
    protected $table = 'wali';
    protected $guarded = ['id'];
    protected $hidden = [
        'password'
    ];
}
