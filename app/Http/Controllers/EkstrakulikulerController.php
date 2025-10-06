<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    // Menampilkan daftar semua ekstrakulikuler di halaman admin
    public function index()
    {
        $ekskuls = Ekstrakulikuler::all(); // Ambil semua data ekstrakulikuler
        return view('admin.ekskul', compact('ekskuls')); // Kirim data ke view
    }

    // Menampilkan halaman ekstrakulikuler di frontend
    public function ekskul()
    {
        $ekskuls = Ekstrakulikuler::all();
        return view('ekskul', compact('ekskuls'));
    }

    // Menampilkan form untuk menambahkan ekstrakulikuler baru
    public function create()
    {
        return view('admin.create_ekskul');
    }

    // Menyimpan ekstrakulikuler baru ke database
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_ekskul'=> 'required|string',
            'pembina'=> 'required|string',
            'jadwal_latihan'=> 'required|string',
            'deskripsi'=> 'required|string',
            'gambar'=> 'required|image',
        ]);

        // Upload gambar
        $gambar = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('asset/image'), $gambar);

        // Simpan data ekstrakulikuler
        Ekstrakulikuler::create([
            'nama_ekskul'=> $request->nama_ekskul,
            'pembina'=> $request->pembina,
            'jadwal_latihan'=> $request->jadwal_latihan,
            'deskripsi'=> $request->deskripsi,
            'gambar'=> $gambar,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.ekskul.index')->with('success','Berhasil ditambahkan');
    }

    // Menampilkan detail ekstrakulikuler di halaman publik
    public function show($id)
    {
        $ekskul = Ekstrakulikuler::find($id);
        return view('ekskul-tampil', compact('ekskul'));
    }

    // Menampilkan form edit ekstrakulikuler
    public function edit($id)
    {
        $ekskul = Ekstrakulikuler::find($id);
        return view('admin.edit_ekskul', compact('ekskul'));
    }

    // Memperbarui data ekstrakulikuler yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_ekskul'=> 'required|string',
            'pembina'=> 'required|string',
            'jadwal_latihan'=> 'required|string',
            'deskripsi'=> 'required|string',
            'gambar'=> 'nullable|image', // gambar opsional saat update
        ]);

        $ekskul = Ekstrakulikuler::find($id);

        // Jika ada gambar baru, upload dan update
        if ($request->hasFile('gambar')) {
            $gambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('asset/image'), $gambar);
            $ekskul->gambar = $gambar;
        }

        // Update data lainnya
        $ekskul->nama_ekskul = $request->nama_ekskul;
        $ekskul->pembina = $request->pembina;
        $ekskul->jadwal_latihan = $request->jadwal_latihan;
        $ekskul->deskripsi = $request->deskripsi;
        $ekskul->save();

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.ekskul.index')->with('success','Berhasil di update');
    }

    // Menghapus data ekstrakulikuler
    public function destroy($id)
    {
        $ekskul = Ekstrakulikuler::find($id);
        $ekskul->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('Admin.ekskul.index')->with('success', 'Berhasil Di hapus');
    }
}
