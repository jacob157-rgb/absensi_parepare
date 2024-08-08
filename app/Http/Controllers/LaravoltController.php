<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Provinsi;
use Laravolt\Indonesia\Facade as Indonesia;

class LaravoltController extends Controller
{
    public function provinsi()
    {
        return response()->json([
            'provinsi' => Provinsi::all(),
        ]);
    }
    
    public function kabupaten(Request $request)
    {
        return response()->json([
            'kabupaten' => Indonesia::search($request->provinsi)->allCities(),
        ]);
    }

    # Kecamatan
    public function kecamatan(Request $request)
    {
        return response()->json([
            'kecamatan' => Indonesia::search($request->kabupaten)->allDistricts(),
        ]);
    }

    # Kelurahan
    public function kelurahan(Request $request)
    {
        return response()->json([
            'kelurahan' => Indonesia::search($request->kecamatan)->allVillages(),
        ]);
    }
}
