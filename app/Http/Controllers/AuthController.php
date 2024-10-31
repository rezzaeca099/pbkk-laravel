<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login'); // Memanggil file login.blade.php dari folder resources/views/auth/
    }

    public function register()
    {
        return view('auth.register'); // Memanggil file register.blade.php dari folder resources/views/auth/
    }

    public function store(Request $request)
    {
        // Simpan data ke database
        User::create([
            'username'   => $request->input('email'),
            'name'       => $request->input('name'),
            'last_name'  => $request->input('last_name'),
            'role_name'  => $request->input('role'),
            'email'      => $request->input('email'),
            'nrk'        => $request->input('nrk'),
            'password'   => Hash::make($request->input('password')), // Hash password untuk keamanan
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('auth.login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }
    
    public function proseslogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->input('email'))->first();

        // Cek apakah user ditemukan
        if ($user) {
            // Cek apakah password cocok dengan yang ada di database
            if (Hash::check($request->input('password'), $user->password)) {
                // Jika password cocok, login pengguna dan simpan role ke session
                auth()->login($user);
                
                // Simpan role user ke dalam session
                Session::put('role', $user->role_name);

                return redirect()->route('dashboard.index')->with('success', 'Login berhasil!');
            } else {
                // Jika password salah, redirect kembali ke halaman login dengan pesan error
                return redirect()->back()->withErrors(['password' => 'Password yang Anda masukkan salah.']);
            }
        } else {
            // Jika email tidak ditemukan, redirect kembali ke halaman login dengan pesan error
            return redirect()->back()->withErrors(['email' => 'Akun dengan email ini tidak ditemukan.']);
        }
    }

    public function logout()
    {
        // Hapus role dari session saat logout
        Session::forget('role');
        auth()->logout();
        
        return redirect()->route('auth.login')->with('success', 'Logout berhasil!');
    }
}
