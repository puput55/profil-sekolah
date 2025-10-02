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
    public function showLoginForm()
    {
        return view('login');
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // cek login berdasarkan username
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            // redirect sesuai role
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('Admin.dashboard');
            } elseif (Auth::user()->role == 'Operator') {
                return redirect()->route('Operator.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('error', 'Username atau password salah.');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    // ========== CRUD USER ==========

    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function create()
    {
        return view('admin.create_user');
    }

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

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|min:3',
            'role' => 'required',
        ]);

        $user = User::find($id);

        $data = [
            'username' => $request->username,
            'password' => $user->password,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('Admin.user.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('Admin.user.index')->with('success', 'User deleted successfully');
    }

    // halaman home
    public function home()
    {
        $ekskuls = ekstrakulikuler::take(4)->get();
        $profil = ProfilSekolah::first();
        $beritas = berita::take(4)->get();

           // ambil jumlah guru & siswa
        $jumlahGuru  = guru::count();
        $jumlahSiswa = siswa::count();
        return view('home', compact('ekskuls','profil','beritas','jumlahGuru','jumlahSiswa'));

    }
}
