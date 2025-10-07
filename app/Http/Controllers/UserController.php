<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ekstrakulikuler;
use App\Models\guru;
use App\Models\ProfilSekolah;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Proses login user berdasarkan username dan password.
     * Melakukan validasi input, autentikasi, dan redirect sesuai role.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek login berdasarkan username dan password
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Redirect ke halaman sesuai role
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('Admin.dashboard');
            } elseif (Auth::user()->role == 'Operator') {
                return redirect()->route('Operator.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        // Jika login gagal
        return back()->with('error', 'Username atau password salah.');
    }

    /**
     * Logout user, hapus session, dan redirect ke halaman login.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    // ============================================================
    // ====================== CRUD USER ===========================
    // ============================================================

    /**
     * Menampilkan daftar semua user.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    /**
     * Menampilkan form untuk menambah user baru.
     */
    public function create()
    {
        return view('admin.create_user');
    }

    /**
     * Menyimpan data user baru ke database setelah validasi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:3',
            'role' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('Admin.user.index')->with('success', 'User created successfully');
    }

    /**
     * Menampilkan form edit untuk user berdasarkan ID.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit_user', compact('user'));
    }

    /**
     * Memperbarui data user berdasarkan ID dengan validasi input.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|min:3',
            'role' => 'required',
        ]);

        $user = User::find($id);

        // Siapkan data yang akan diupdate
        $data = [
            'username' => $request->username,
            'password' => $user->password, // default: tetap gunakan password lama
            'role' => $request->role,
        ];

        // Jika password diisi, update password baru
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update data user
        $user->update($data);

        return redirect()->route('Admin.user.index')->with('success', 'User updated successfully');
    }

    /**
     * Menghapus user berdasarkan ID.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('Admin.user.index')->with('success', 'User deleted successfully');
    }

    /**
     * Menampilkan halaman utama (home) untuk user biasa.
     * Menampilkan data ekskul, profil sekolah, berita terbaru,
     * serta jumlah guru dan siswa.
     */
    public function home()
    {
        $ekskuls = ekstrakulikuler::take(8)->get(); // ambil 8 data ekskul
        $profil = ProfilSekolah::first(); // ambil profil sekolah
        $beritas = Berita::orderBy('tanggal', 'desc')->take(8)->get(); // ambil 8 berita terbaru
        $jumlahGuru  = guru::count(); // hitung total guru
        $jumlahSiswa = siswa::count(); // hitung total siswa

        return view('home', compact('ekskuls', 'profil', 'beritas', 'jumlahGuru', 'jumlahSiswa'));
    }
}
