<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ekstrakulikuler;
use App\Models\galeri;
use App\Models\guru;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $totalUser = User::count();
        $totalBerita = berita::count();
        $totalSiswa = siswa::count();
        $totalGuru = guru::count();
        $totalGaleri = galeri::count();
        $totalEkskul = ekstrakulikuler::count();
        return view('admin.dashboard', compact(
            'totalUser', 'totalBerita', 'totalSiswa', 'totalGuru', 'totalGaleri', 'totalEkskul'));
    }
}
