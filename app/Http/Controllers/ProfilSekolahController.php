<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    // Menampilkan daftar profil sekolah di halaman admin
    public function index()
    {
        $profils = ProfilSekolah::all();
        return view('admin.profilSekolah', compact('profils'));
    }

    // Menampilkan form untuk menambahkan profil sekolah baru
    public function create()
    {
        return view('admin.create_ps');
    }

    // Menyimpan profil sekolah baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah'   => 'required|string',
            'kepala_sekolah' => 'required|string',
            'foto'           => 'nullable|image',
            'logo'           => 'nullable|image',
            'npsn'           => 'required|string',
            'alamat'         => 'required|string',
            'kontak'         => 'required|string|max:13',
            'visi_misi'      => 'required|string',
            'tahun_berdiri'  => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'deskripsi'      => 'required|string',
        ]);

        $foto = null;
        $logo = null;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = time() . '_foto.' . $request->foto->extension();
            $request->foto->move(public_path('asset/image'), $foto);
        }

        // Upload logo jika ada
        if ($request->hasFile('logo')) {
            $logo = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('asset/image'), $logo);
        }

        // Simpan data profil sekolah
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

    // Menampilkan form edit profil sekolah
    public function edit($id)
    {
        $profils = ProfilSekolah::find($id);
        return view('admin.edit_ps', compact('profils'));
    }

    // Memperbarui data profil sekolah
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah' => 'required|string',
            'kepala_sekolah' => 'required|string',
            'foto' => 'nullable|image',
            'logo' => 'nullable|image',
            'npsn' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:13',
            'visi_misi' => 'required|string',
            'tahun_berdiri' => 'required|digits:4|integer|min:1500|max:' . date('Y'),
            'deskripsi' => 'required|string',
        ]);

        $profils = ProfilSekolah::find($id);

        // Ambil data yang diupdate
        $data = $request->only([
            'nama_sekolah', 'kepala_sekolah', 'npsn',
            'alamat', 'kontak', 'visi_misi',
            'tahun_berdiri', 'deskripsi',
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            $foto = time() . '_foto.' . $request->foto->extension();
            $request->foto->move(public_path('asset/image'), $foto);
            $data['foto'] = $foto;
        }

        // Upload logo baru jika ada
        if ($request->hasFile('logo')) {
            $logo = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('asset/image'), $logo);
            $data['logo'] = $logo;
        }

        // Update data profil sekolah
        $profils->update($data);
        $profils->save();

        return redirect()->route('Admin.ps.index')->with('success', 'Profil berhasil diupdate');
    }

    // Menghapus data profil sekolah
    public function destroy($id)
    {
        $profils = ProfilSekolah::find($id);
        $profils->delete();
        return redirect()->route('Admin.ps.index')->with('success', 'Berhasil di hapus');
    }

    // Menampilkan profil sekolah di halaman frontend
    public function ps()
    {
        $profil = ProfilSekolah::first();
        return view('profil', compact('profil'));
    }
}
