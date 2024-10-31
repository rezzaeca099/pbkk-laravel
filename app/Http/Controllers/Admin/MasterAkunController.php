<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // import Model di sini
use Illuminate\Http\Request;

class MasterAkunController extends Controller
{
    public function index(){
        $data = User::orderBy('id', 'desc')->get();

        return view('master-data.admin.index', [
            'data' => $data
        ]); 
    }

    public function edit($id){
        $user = user::find($id); // Mengambil data berdasarkan ID
        return view('master-data.admin.edit', compact('user')); // Kirim data layanan ke view
    }

    public function store(Request $request){
    
        // Proses penyimpanan data
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->role_name = $request->role;
        $data->visible = $request->visible;
        // created_at dan updated_at otomatis diisi oleh Laravel, tidak perlu diisi manual
        $data->save();

         //redirect to index
        return redirect()->route('master-akun.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id){
        // Mencari data user berdasarkan ID
        $user = User::find($id);
    
        // Periksa apakah user ditemukan
        if (!$user) {
            return redirect()->route('master-akun.index')->with(['error' => 'Data tidak ditemukan.']);
        }
    
        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role_name = $request->role;
        $user->visible = $request->visible;
        $user->save(); // Simpan perubahan
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('master-akun.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    
    
    public function destroy($id){
        // Cari layanan berdasarkan ID
        $user = user::find($id);
        
        // Hapus user
        if ($user) {
            $user->delete();
        }

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('master-akun.index')->with(['success' => 'userberhasil dihapus!']);
    }
}
