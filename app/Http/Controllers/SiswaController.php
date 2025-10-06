<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Menampilkan daftar siswa di halaman admin
    public function index()
    {
        $siswas = Siswa::all(); // Ambil semua data siswa
        return view('admin.siswa', compact('siswas')); // Kirim data ke view
    }

    // Menampilkan form untuk menambahkan siswa baru
    public function create()
    {
        return view('admin.create_siswa');
    }

    // Menyimpan siswa baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tahun_masuk' => 'required|min:4',
        ]);

        // Simpan data siswa
        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('Admin.siswa.index')->with('success','Berhasil di tambahkan');
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.edit_siswa', compact('siswa'));
    }

    // Memperbarui data siswa yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
        ]);

        $siswa = Siswa::find($id);

        $data = [
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ];

        $siswa->update($data);

        return redirect()->route('Admin.siswa.index')->with('success','Berhasil di update');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('Admin.siswa.index')->with('success','Berhasil di hapus');
    }

    // Menampilkan daftar siswa di halaman frontend
    public function siswa()
    {
        $siswas = Siswa::all();
        return view('siswa', compact('siswas'));
    }
}
