<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    // Mengambil total data dari beberapa tabel untuk ditampilkan
    // di halaman dashboard, seperti total user, berita, siswa, guru, galeri, dan ekstrakulikuler.
    public function index()
    {
        // Menghitung total user
        $totalUser = User::count();

        // Menghitung total berita
        $totalBerita = Berita::count();

        // Menghitung total siswa
        $totalSiswa = Siswa::count();

        // Menghitung total guru
        $totalGuru = Guru::count();

        // Menghitung total galeri
        $totalGaleri = Galeri::count();

        // Menghitung total ekstrakulikuler
        $totalEkskul = Ekstrakulikuler::count();

        // Mengirim data ke view dashboard
        return view('admin.dashboard', compact(
            'totalUser', 'totalBerita', 'totalSiswa', 'totalGuru', 'totalGaleri', 'totalEkskul'
        ));
    }
}
