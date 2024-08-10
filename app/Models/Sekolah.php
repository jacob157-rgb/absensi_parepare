<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $guarded = ['id'];

    static function isLembaga()
    {
        $metaData = metaData();
        return static::where('nsm', $metaData['username'])->first();
    }
}
