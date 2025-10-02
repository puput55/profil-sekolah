<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $beritas = berita::all();
        return view('admin.berita', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create_berita');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul'=> 'required|string|max:255',
            'isi' => 'required|string',
            'gambar'=>'required|image',
        ]);
        $gambar = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('asset/image'), $gambar);

        berita::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'tanggal'=>now(),
            'gambar'=>$gambar,
            'id_user'=>1, //Auth::user()->id
        ]);

        return redirect()->route('Admin.berita.index')->with('success', 'Berita created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita = berita::find($id);
        return view('berita-tampil', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $berita = berita::find($id);
        return view('admin.edit_berita', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'judul'=>'required|string|max:255',
            'isi'=>'required|string',
            'tanggal'=>'required|date',
            'gambar'=>'required|image',
        ]);
        $berita = berita::find($id);

        if($request->hasFile('gambar')){
            $gambar = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('asset/image'), $gambar);
            $berita->gambar = $gambar;
        }
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal;
        $berita->save();
        return redirect()->route('Admin.berita.index')->with('success','Berita berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $berita = berita::find($id);
        $berita->delete();
        return redirect()->route('Admin.berita.index')->with('success', 'Berita Berhasil dihapus');
    }

    public function berita()
    {
        $beritas = berita::all();
        return view('berita', compact('beritas'));
    }
}
