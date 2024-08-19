<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $guarded = ['id'];

    static function isLembaga()
    {
        $metaData = metaData();
        // Bypass nsm checking if roles is master
        if ($metaData['roles'] == 'MASTER') {
            return true;
        }

        $lembaga = static::where('nsm', $metaData['username'])->first();
        if ($lembaga == null) {
            request()->session()->flush();
            Auth::guard('admin')->logout();
            request()->session()->regenerate();
            throw new ModelNotFoundException('Lembaga tidak ditemukan');
        }
        return $lembaga;
    }
}
