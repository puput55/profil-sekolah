<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gurus = guru::all();
        return view('admin.guru', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create_guru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_guru'=>'required|string',
            'nip'=>'required|string',
            'mapel'=>'required|string',
            'foto'=>'required|image',
        ]);
        $foto = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('asset/image'), $foto);

        guru::create([
            'nama_guru'=> $request->nama_guru,
            'nip'=> $request->nip,
            'mapel'=> $request->mapel,
            'foto'=> $foto,
        ]);

        return redirect()->route('Admin.guru.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(guru $guru)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $guru = guru::find($id);
        return view('admin.edit_guru', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_guru'=>'required|string',
            'nip'=>'required|string',
            'mapel'=>'required|string',
            'foto'=>'required|image',
        ]);
        $guru = guru::find($id);

        if($request->hasFile('foto')){
            $foto = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('asset/image'), $foto);
            $guru->foto = $foto;
        }
        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->mapel = $request->mapel;
        $guru->save();
        return redirect()->route('Admin.guru.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $guru = guru::find($id);
        $guru->delete();
        return redirect()->route('Admin.guru.index')->with('success','Data berhasil dihapus');
    }
    public function guru()
    {
        $guru = guru::all();
        return view('guru', compact('guru'));
    }
}
