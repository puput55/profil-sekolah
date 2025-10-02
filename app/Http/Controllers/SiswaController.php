<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswas = siswa::all();
        return view('admin.siswa', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create_siswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nisn'=> 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tahun_masuk' => 'required|min:4',
        ]);

        siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('Admin.siswa.index')->with('success','Berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     */
    // public function show(siswa $siswa)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $siswa = siswa::find($id);
        return view('admin.edit_siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nisn'=> 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
        ]);

        $siswa = siswa::find($id);
        $data = [
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ];

        $siswa->update($data);
        return redirect()->route('Admin.siswa.index')->with('success','Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect()->route('Admin.siswa.index')->with('success','Berhasil di hapus');
    }
    public function siswa()
    {
        $siswas = siswa::all();
        return view('siswa', compact('siswas'));
    }
}
