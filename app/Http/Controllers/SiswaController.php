<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // ===============================
    //  Menampilkan daftar siswa di halaman admin
    // ===============================
    public function index()
    {
        $siswas = Siswa::all(); // Ambil semua data siswa
        return view('admin.siswa', compact('siswas')); // Kirim data ke view
    }

    // ===============================
    //  Menampilkan form tambah siswa
    // ===============================
    public function create()
    {
        return view('admin.create_siswa');
    }

    // ===============================
    //  Menyimpan data siswa baru
    // ===============================
    public function store(Request $request)
    {
        // Validasi input, termasuk cek NISN unik
        $request->validate([
            'nisn' => 'required|string|unique:siswas,nisn', // ✅ NISN tidak boleh sama
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
        ], [
            'nisn.unique' => 'NISN sudah terdaftar, silakan gunakan NISN lain.', // Pesan error khusus
        ]);

        // Simpan data siswa baru
        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('Admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    // ===============================
    //  Menampilkan form edit siswa
    // ===============================
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.edit_siswa', compact('siswa'));
    }

    // ===============================
    //  Memperbarui data siswa
    // ===============================
    public function update(Request $request, $id)
    {
        // Validasi input dengan pengecualian NISN sendiri
        $request->validate([
            'nisn' => 'required|string|unique:siswas,nisn,' . $id, // ✅ Abaikan dirinya sendiri
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tahun_masuk' => 'required|digits:4',
        ], [
            'nisn.unique' => 'NISN sudah digunakan oleh siswa lain.',
        ]);

        $siswa = Siswa::find($id);

        // Update data siswa
        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('Admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    // ===============================
    //  Menghapus data siswa
    // ===============================
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('Admin.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }

    // ===============================
    //  Menampilkan daftar siswa di halaman publik
    // ===============================
    public function siswa()
    {
        $siswas = Siswa::all();
        return view('siswa', compact('siswas'));
    }
}
