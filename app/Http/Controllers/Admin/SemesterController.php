<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pages' => 'Data Semester',
            'semester' => Semester::orderBy('id', 'desc')->paginate(10),
        ];
        return view('admin.semester.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'semester' => 'required',
        ]);

        Semester::create([
            'nama' => $request->semester,
        ]);

        return redirect()->back()->with('success', 'Semester berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json([
            'success' => true,
            'edit' => Semester::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'semester' => 'required',
        ]);

        Semester::whereId($id)->update([
            'nama' => $request->semester,
        ]);

        return redirect()->back()->with('success', 'Semester berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $semester = Semester::whereId($id);
        $semester->delete();
        return redirect()->back()->with('success', 'Semester berhasil dihapus.');
    }
}
