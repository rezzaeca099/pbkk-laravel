<?php

namespace App\Http\Controllers;
use App\Models\User;   // Impor model di sini
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class profilecontroller extends Controller
{
    public function index(){
        return view('profile.index'); //
    }

    public function edit($id){
        // Ambil data user berdasarkan ID
        $user = User::find($id);

    // Pastikan user ditemukan
    if (!$user) {
        return redirect()->route('profile.index')->with('error', 'User not found.');
    }

        // Kirim data user ke view edit
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id){

        // Cari user berdasarkan ID
        $user = User::find($id);

    // Pastikan user ditemukan
    if (!$user) {
        return redirect()->route('profile.index')->with('error', 'User not found.');
    }

        // Update data user
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;

    // Jika ada password yang diisi, maka update password
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile.index')->with('success', 'Profile and password updated successfully.');
    }
    

}
