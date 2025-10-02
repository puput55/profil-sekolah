<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ekstrakulikuler;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ekskuls = ekstrakulikuler::all();
        return view('admin.ekskul',compact('ekskuls'));
    }
    // public function home()
    // {
    //     $ekskuls = ekstrakulikuler::take(4)->get();
    //     $profil = ProfilSekolah::first();
    //     $beritas = berita::all();
    //     return view('home', compact('ekskuls','profil','beritas'));
    // }
    public function ekskul()
    {
        $ekskuls = ekstrakulikuler::all();
        return view('ekskul', compact('ekskuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create_ekskul');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_ekskul'=> 'required|string',
            'pembina'=> 'required|string',
            'jadwal_latihan'=> 'required|string',
            'deskripsi'=> 'required|string',
            'gambar'=> 'required|image',
        ]);
        $gambar = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('asset/image'), $gambar);

        ekstrakulikuler::create([
            'nama_ekskul'=> $request->nama_ekskul,
            'pembina'=> $request->pembina,
            'jadwal_latihan'=> $request->jadwal_latihan,
            'deskripsi'=> $request->deskripsi,
            'gambar'=> $gambar,
        ]);
        return redirect()->route('Admin.ekskul.index')->with('success','Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $ekskul = ekstrakulikuler::find($id);
        return view('ekskul-tampil', compact('ekskul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $ekskul = ekstrakulikuler::find($id);
        return view('admin.edit_ekskul',compact('ekskul'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_ekskul'=> 'required|string',
            'pembina'=> 'required|string',
            'jadwal_latihan'=> 'required|string',
            'deskripsi'=> 'required|string',
            'gambar'=> 'nullable|image',
        ]);
        $ekskul = ekstrakulikuler::find($id);
        if($request->hasFile('gambar')){
            $gambar = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('asset/image'), $gambar);
            $ekskul->gambar = $gambar;
        }
        $ekskul->nama_ekskul = $request->nama_ekskul;
        $ekskul->pembina = $request->pembina;
        $ekskul->jadwal_latihan = $request->jadwal_latihan;
        $ekskul->deskripsi = $request->deskripsi;
        $ekskul->save();

        return redirect()->route('Admin.ekskul.index')->with('success','Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $ekskul = ekstrakulikuler::find($id);
        $ekskul->delete();
        return redirect()->route('Admin.ekskul.index')->with('success', 'Berhasil Di hapus');
    }
}
