<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    //
    public function index()
    {
        $profils = ProfilSekolah::all();
        return view('admin.profilSekolah', compact('profils'));
    }

    public function create()
    {
        return view('admin.create_ps');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama_sekolah'   => 'required|string',
        'kepala_sekolah' => 'required|string',
        'foto'           => 'nullable|image',
        'logo'           => 'nullable|image',
        'npsn'           => 'required|string',
        'alamat'         => 'required|string',
        'kontak'         => 'required|string|max:13',
        'visi_misi'      => 'required|string',
        'tahun_berdiri'  => 'required|digits:4|integer|min:1900|max:'.date('Y'),
        'deskripsi'      => 'required|string',
    ]);

    $foto = null;
    $logo = null;

    if ($request->hasFile('foto')) {
        $foto = time().'_foto.'.$request->foto->extension();
        $request->foto->move(public_path('asset/image'), $foto);
    }

    if ($request->hasFile('logo')) {
        $logo = time().'_logo.'.$request->logo->extension();
        $request->logo->move(public_path('asset/image'), $logo);
    }

    ProfilSekolah::create([
        'nama_sekolah'   => $request->nama_sekolah,
        'kepala_sekolah' => $request->kepala_sekolah,
        'foto'           => $foto,
        'logo'           => $logo,
        'npsn'           => $request->npsn,
        'alamat'         => $request->alamat,
        'kontak'         => $request->kontak,
        'visi_misi'      => $request->visi_misi,
        'tahun_berdiri'  => $request->tahun_berdiri,
        'deskripsi'      => $request->deskripsi,
    ]);

    return redirect()->route('Admin.ps.index')->with('success', 'Profil berhasil ditambahkan');
    }

    public function edit($id)
    {
        $profils = ProfilSekolah::find($id);
        return view('admin.edit_ps', compact('profils'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required|string',
            'kepala_sekolah' => 'required|string',
            'foto' => 'nullable|image',
            'logo' => 'nullable|image',
            'npsn' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:13',
            'visi_misi' => 'required|string',
            'tahun_berdiri' => 'required|digits:4|integer|min:1500|max:'.date('Y'),
            'deskripsi' => 'required|string',
        ]);

        $profils = ProfilSekolah::find($id);

        $data = $request->only([
       'nama_sekolah', 'kepala_sekolah', 'npsn',
       'alamat', 'kontak', 'visi_misi',
       'tahun_berdiri', 'deskripsi',

       ]);

       $foto = null;
       $logo = null;

        if($request->hasFile('foto')){
            $foto = time().'_foto'.$request->foto->extension();
            $request->foto->move(public_path('asset/image'), $foto);
            $data['foto'] = $foto;
        }
        if($request->hasFile('logo')){
            $logo = time().'_logo'.$request->logo->extension();
            $request->logo->move(public_path('asset/image'), $logo);
            $data['logo'] = $logo;
        }

        $profils->update($data);
        $profils->save();
        return redirect()->route('Admin.ps.index')->with('success', 'Profil berhasil diupdate');

    }

    public function destroy($id)
    {
        $profils = ProfilSekolah::find($id);
        $profils->delete();
        return redirect()->route('Admin.ps.index')->with('success','Berhasil di hapus');
    }
    // public function home()
    // {
    //     $profil = ProfilSekolah::all();
    //     return view('home', compact('profil'));
    // }
    public function ps()
    {
        $profil = ProfilSekolah::first();
        return view('profil',compact('profil'));
    }
}
