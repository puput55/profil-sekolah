<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    // Menampilkan daftar berita di halaman admin
    public function index()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('admin.berita', compact('beritas'));
    }

    // Menampilkan form tambah berita
    public function create()
    {
        return view('admin.create_berita');
    }

    // Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'required|image',
        ]);

        // Upload gambar
        $gambar = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('asset/image'), $gambar);

        // Simpan ke database
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar,
            'id_user' => Auth::check() ? Auth::user()->id_user : 1,
        ]);

        return redirect()->route('Admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Tampilkan berita publik
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita-tampil', compact('berita'));
    }

    // Form edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.edit_berita', compact('berita'));
    }

    // Update berita
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image',
        ]);

        $berita = Berita::findOrFail($id);

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {
            $gambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('asset/image'), $gambar);
            $berita->gambar = $gambar;
        }

        // Update data
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal; // update tanggal otomatis
        $berita->save();

        return redirect()->route('Admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    // Hapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('Admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    // Tampilkan berita di halaman publik
    public function berita()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('berita', compact('beritas'));
    }
}
