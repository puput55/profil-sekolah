<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Menampilkan daftar guru di halaman admin
    public function index()
    {
        $gurus = Guru::all(); // Ambil semua data guru
        return view('admin.guru', compact('gurus')); // Kirim data ke view
    }

    // Menampilkan form untuk menambahkan guru baru
    public function create()
    {
        return view('admin.create_guru');
    }

    // Menyimpan guru baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|string',
            'mapel' => 'required|string',
            'foto' => 'required|image',
        ]);

        // Upload foto guru
        $foto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('asset/image'), $foto);

        // Simpan data guru
        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $foto,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.guru.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit guru
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('admin.edit_guru', compact('guru'));
    }

    // Memperbarui data guru yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|string',
            'mapel' => 'required|string',
            'foto' => 'required|image',
        ]);

        $guru = Guru::find($id);

        // Jika ada file foto baru, upload dan update
        if ($request->hasFile('foto')) {
            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('asset/image'), $foto);
            $guru->foto = $foto;
        }

        // Update data guru lainnya
        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->mapel = $request->mapel;
        $guru->save();

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.guru.index')->with('success', 'Data berhasil diubah');
    }

    // Menghapus data guru
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.guru.index')->with('success','Data berhasil dihapus');
    }

    // Menampilkan daftar guru di halaman publik (frontend)
    public function guru()
    {
        $guru = Guru::all();
        return view('guru', compact('guru'));
    }
}
