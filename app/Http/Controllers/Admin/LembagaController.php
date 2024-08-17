<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = metaData();
        if ($roles['roles'] == 'MASTER') {
            $data = [
                'pages' => 'Data Lembaga',
                'lembaga' => Sekolah::orderBy('id', 'desc')->paginate(10),
            ];
            return view('admin.lembaga.index', $data);
        } else {
            $lembaga = Sekolah::isLembaga();
            $data = [
                'pages' => Str::upper('Informasi ' . $lembaga->nama),
                'lembaga' => $lembaga,
            ];
            return view('admin.lembaga.show_by_lembaga', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'pages' => 'Data Lembaga',
        ];
        return view('admin.lembaga.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'instansi' => 'required|string',
            'sub_instansi' => 'required|string',
            'nama' => 'required|string',
            'level' => 'required|in:TK/RA,SD/MI,SMP/MTS,SMA/MA,PERGURUAN TINGGI',
            'status' => 'required|in:ACTIVE,NON ACTIVE',
            'nsm' => 'required|string|max:12',
            'npsn' => 'required|string|max:8',
            'provinsi' => 'required|string|exists:indonesia_provinces,name',
            'kabupaten' => 'required|string|exists:indonesia_cities,name',
            'kecamatan' => 'required|string|exists:indonesia_districts,name',
            'kelurahan' => 'required|string|exists:indonesia_villages,name',
            'alamat' => 'required|string',
            'tempat_cetak' => 'required|string',
            'no_telp' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'logo_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the logo_kiri file upload
        if ($request->hasFile('logo_kiri')) {
            $logoKiri = $request->file('logo_kiri');
            $logoKiriFilename = time() . '_logo_kiri.' . $logoKiri->getClientOriginalExtension();
            $logoKiriPath = public_path('images/logo_kiri/');

            // Create directory if it doesn't exist
            if (!File::isDirectory($logoKiriPath)) {
                File::makeDirectory($logoKiriPath, 0755, true);
            }

            // Resize and save the image
            Image::read($logoKiri->getRealPath())
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($logoKiriPath . $logoKiriFilename);
        }

        // Handle the logo_kanan file upload
        if ($request->hasFile('logo_kanan')) {
            $logoKanan = $request->file('logo_kanan');
            $logoKananFilename = time() . '_logo_kanan.' . $logoKanan->getClientOriginalExtension();
            $logoKananPath = public_path('images/logo_kanan/');

            // Create directory if it doesn't exist
            if (!File::isDirectory($logoKananPath)) {
                File::makeDirectory($logoKananPath, 0755, true);
            }

            // Resize and save the image
            Image::read($logoKanan->getRealPath())
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($logoKananPath . $logoKananFilename);
        }

        // Create a new Sekolah record
        Sekolah::create([
            'instansi' => $request->instansi,
            'sub_instansi' => $request->sub_instansi,
            'nama' => $request->nama,
            'level' => $request->level,
            'status' => $request->status,
            'nsm' => $request->nsm,
            'npsn' => $request->npsn,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tempat_cetak' => $request->tempat_cetak,
            'logo_kiri' => $request->hasFile('logo_kiri') ? 'images/logo_kiri/' . $logoKiriFilename : null,
            'logo_kanan' => $request->hasFile('logo_kanan') ? 'images/logo_kanan/' . $logoKananFilename : null,
        ]);

        // Create a new Admin record
        Admin::create([
            'nama' => 'Admin',
            'username' => $request->nsm,
            'password' => bcrypt('1234'),
            'roles' => 'LEMBAGA',
        ]);

        return redirect('/admin/lembaga')->with('success', 'Data lembaga berhasil didaftarkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'pages' => 'Data Lembaga',
            'lembaga' => Sekolah::find($id),
        ];
        return view('admin.lembaga.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'pages' => 'Data Lembaga',
            'edit' => Sekolah::find($id),
        ];
        return view('admin.lembaga.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'instansi' => 'required|string',
            'sub_instansi' => 'required|string',
            'nama' => 'required|string',
            'level' => 'required|in:TK/RA,SD/MI,SMP/MTS,SMA/MA,PERGURUAN TINGGI',
            'status' => 'required|in:ACTIVE,NON ACTIVE',
            'nsm' => 'required|string|max:12',
            'npsn' => 'required|string|max:8',
            'provinsi' => 'required|string|exists:indonesia_provinces,name',
            'kabupaten' => 'required|string|exists:indonesia_cities,name',
            'kecamatan' => 'required|string|exists:indonesia_districts,name',
            'kelurahan' => 'required|string|exists:indonesia_villages,name',
            'alamat' => 'required|string',
            'tempat_cetak' => 'required|string',
            'no_telp' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'logo_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $lembaga = Sekolah::find($id);

        // Handle logo_kiri file upload
        if ($request->hasFile('logo_kiri')) {
            // Delete the old logo_kiri if it exists
            if ($lembaga->logo_kiri && file_exists(public_path($lembaga->logo_kiri))) {
                unlink(public_path($lembaga->logo_kiri));
            }

            // Upload and save the new logo_kiri
            $logoKiri = $request->file('logo_kiri');
            $logoKiriFilename = time() . '_logo_kiri.' . $logoKiri->getClientOriginalExtension();
            $logoKiriPath = public_path('images/logo_kiri/');

            if (!File::isDirectory($logoKiriPath)) {
                File::makeDirectory($logoKiriPath, 0755, true);
            }

            Image::read($logoKiri->getRealPath())
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($logoKiriPath . $logoKiriFilename);

            // Update the lembaga record with the new logo_kiri path
            $lembaga->logo_kiri = 'images/logo_kiri/' . $logoKiriFilename;
        }

        // Handle logo_kanan file upload
        if ($request->hasFile('logo_kanan')) {
            // Delete the old logo_kanan if it exists
            if ($lembaga->logo_kanan && file_exists(public_path($lembaga->logo_kanan))) {
                unlink(public_path($lembaga->logo_kanan));
            }

            // Upload and save the new logo_kanan
            $logoKanan = $request->file('logo_kanan');
            $logoKananFilename = time() . '_logo_kanan.' . $logoKanan->getClientOriginalExtension();
            $logoKananPath = public_path('images/logo_kanan/');

            if (!File::isDirectory($logoKananPath)) {
                File::makeDirectory($logoKananPath, 0755, true);
            }

            Image::read($logoKanan->getRealPath())
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($logoKananPath . $logoKananFilename);

            // Update the lembaga record with the new logo_kanan path
            $lembaga->logo_kanan = 'images/logo_kanan/' . $logoKananFilename;
        }

        // Update the lembaga record with the other fields
        $lembaga->update([
            'instansi' => $request->instansi,
            'sub_instansi' => $request->sub_instansi,
            'nama' => $request->nama,
            'level' => $request->level,
            'status' => $request->status,
            'nsm' => $request->nsm,
            'npsn' => $request->npsn,
            'provinsi' => $request->provinsi ?? $lembaga->provinsi,
            'kabupaten' => $request->kabupaten ?? $lembaga->kabupaten,
            'kecamatan' => $request->kecamatan ?? $lembaga->kecamatan,
            'kelurahan' => $request->kelurahan ?? $lembaga->kelurahan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tempat_cetak' => $request->tempat_cetak,
        ]);

        return redirect('/admin/lembaga')->with('success', 'Data lembaga berhasil diupdate');
    }

    public function updateKamad(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'nama_kamad' => 'required|string',
            'status_kamad' => 'required|string',
            'nip_kamad' => $request->input('status_kamad') == 'PNS' ? 'required|numeric' : 'nullable|numeric',
            'logo_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password_old' => 'nullable|string',
            'password' => $request->input('password-old') != null ? 'required|string|confirmed' : 'nullable|string',
            'password_confirmation' => $request->input('password-old') != null ? 'required|string' : 'nullable|string',
        ]);

        $lembaga = Sekolah::findOrFail($id);

        if ($request->hasFile('logo_kiri')) {
            $logoKiri = $request->file('logo_kiri');
            $logoKiriFilename = time() . '_logo_kiri.' . $logoKiri->getClientOriginalExtension();
            $logoKiriPath = public_path('images/logo_kiri/');

            // Create directory if it doesn't exist
            if (!File::isDirectory($logoKiriPath)) {
                File::makeDirectory($logoKiriPath, 0755, true);
            }

            // Resize and save the image
            Image::read($logoKiri->getRealPath())
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($logoKiriPath . $logoKiriFilename);

            // Delete the old logo if it exists and the user chose to remove it
            if ($request->input('remove_logo_kiri') == '1' && $lembaga->logo_kiri) {
                File::delete(public_path($lembaga->logo_kiri));
            }

            // Update the logo_kiri path in the database
            $lembaga->logo_kiri = 'images/logo_kiri/' . $logoKiriFilename;
        }

        if ($request->hasFile('logo_kanan')) {
            $logoKanan = $request->file('logo_kanan');
            $logoKananFilename = time() . '_logo_kanan.' . $logoKanan->getClientOriginalExtension();
            $logoKananPath = public_path('images/logo_kanan/');

            // Create directory if it doesn't exist
            if (!File::isDirectory($logoKananPath)) {
                File::makeDirectory($logoKananPath, 0755, true);
            }

            // Resize and save the image
            Image::read($logoKanan->getRealPath())
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($logoKananPath . $logoKananFilename);

            // Delete the old logo if it exists and the user chose to remove it
            if ($request->input('remove_logo_kanan') == '1' && $lembaga->logo_kanan) {
                File::delete(public_path($lembaga->logo_kanan));
            }

            // Update the logo_kanan path in the database
            $lembaga->logo_kanan = 'images/logo_kanan/' . $logoKananFilename;
        }

        $lembaga->nama_kamad = $request->nama_kamad;
        if ($request->status_kamad == 'PNS') {
            $lembaga->nip_kamad = $request->nip_kamad;
        }

        if ($request->password_old != null) {
            $authId = Auth::id();
            $admin = Admin::findOrFail($authId);

            if (Hash::check($request->password_old, $admin->password)) {
                $admin->password = Hash::read($request->password);
                $admin->save();
            } else {
                return redirect()->back()->withErrors(['password_old' => 'Password lama tidak cocok.']);
            }
        }

        $lembaga->save();

        return redirect()->route('lembaga.index')->with('success', 'Data Kepala Sekolah berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lembaga = Sekolah::find($id);
        $account = Admin::where('username', $lembaga->nsm)->first();
        $lembaga->delete();
        $account->delete();
        return redirect('/admin/lembaga')->with('success', 'Data lembaga berhasil dihapus');
    }
}
