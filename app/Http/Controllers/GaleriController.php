<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $galeris = galeri::all();
        return view('admin.galeri', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create_galeri');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $request->validate([
        'judul'=> 'required|string',
        'keterangan'=> 'required|string',
        'file'=> 'required|mimes:jpg,jpeg,png,mp4,avi,mov|max:20480', // max 20MB
        'kategori'=> 'required|in:foto,video',
        'tanggal'=> 'required|date',
    ]);

        if ($request->hasFile('file')) {
        $fileName = time().'.'.$request->file->extension();

        if ($request->kategori == 'foto') {
            $request->file->move(public_path('asset/image'), $fileName);
        } else {
            $request->file->move(public_path('asset/image'), $fileName);
        }

        galeri::create([
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
            'file'       => $fileName,
            'kategori'   => $request->kategori,
            'tanggal'    => $request->tanggal,
        ]);
    }

        return redirect()->route('Admin.galeri.index')->with('success','Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(galeri $galeri)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $galeri = galeri::find($id);
        return view('admin.edit_galeri',compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
       $validate = $request->validate([
        'judul'=> 'required|string',
        'keterangan'=> 'required|string',
        'file'=> 'nullable|mimes:jpg,jpeg,png,mp4,avi,mov|max:20480',
        'kategori'=> 'required|in:foto,video',
        'tanggal'=> 'required|date',
    ]);

    $galeri = galeri::find($id);

    if ($request->hasFile('file')) {
        $fileName = time().'.'.$request->file->extension();

        if ($request->kategori == 'foto') {
            $request->file->move(public_path('asset/image'), $fileName);
        } else {
            $request->file->move(public_path('asset/image'), $fileName);
        }

        $validate['file'] = $fileName;
    }

    $galeri->update($validate);

        return redirect()->route('Admin.galeri.index')->with('success','Berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $galeri = galeri::find($id);
        $galeri->delete();
        return redirect()->route('Admin.galeri.index')->with('success','Berhasil di hapus');
    }

    public function galeri()
    {
        $galeris = galeri::all();
        return view('galeri', compact('galeris'));
    }
}
