<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Menampilkan daftar galeri di halaman admin
    public function index()
    {
        $galeris = Galeri::all(); // Ambil semua galeri
        return view('admin.galeri', compact('galeris')); // Kirim data ke view
    }

    // Menampilkan form untuk menambahkan galeri baru
    public function create()
    {
        return view('admin.create_galeri');
    }

    // Menyimpan galeri baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'file' => 'required|mimes:jpg,jpeg,png,mp4,avi,mov|max:30480', // max 20MB
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();

            // Upload file ke folder sesuai kategori
            $request->file->move(public_path('asset/image'), $fileName);

            // Simpan data galeri
            Galeri::create([
                'judul'      => $request->judul,
                'keterangan' => $request->keterangan,
                'file'       => $fileName,
                'kategori'   => $request->kategori,
                'tanggal'    => $request->tanggal,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.galeri.index')->with('success','Berhasil ditambahkan');
    }

    // Menampilkan form edit galeri
    public function edit($id)
    {
        $galeri = Galeri::find($id);
        return view('admin.edit_galeri', compact('galeri'));
    }

    // Memperbarui galeri yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $validate = $request->validate([
            'judul' => 'required|string',
            'keterangan' => 'required|string',
            'file' => 'nullable|mimes:jpg,jpeg,png,mp4,avi,mov|max:30480',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        $galeri = Galeri::find($id);

        // Jika ada file baru, hapus file lama dan upload file baru
        if ($request->hasFile('file')) {
            $oldPath = public_path('asset/' . $galeri->kategori . '/' . $galeri->file);
            if ($galeri->file && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $fileName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('asset/image'), $fileName);
            $validate['file'] = $fileName;
        }

        // Update data galeri
        $galeri->update($validate);

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.galeri.index')->with('success','Berhasil di Ubah');
    }

    // Menghapus galeri
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $galeri->delete();

        return redirect()->route('Admin.galeri.index')->with('success','Berhasil di hapus');
    }

    // Menampilkan galeri di halaman publik (frontend)
    public function galeri()
    {
        $galeris = Galeri::all();
        return view('galeri', compact('galeris'));
    }
}
