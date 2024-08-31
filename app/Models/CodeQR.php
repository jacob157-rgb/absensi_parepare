<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeQR extends Model
{
    use HasFactory;

    protected $table = 'code_qr';
    protected $guarded = [''];
}
