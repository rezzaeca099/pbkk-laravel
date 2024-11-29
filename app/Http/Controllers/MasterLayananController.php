<?php

namespace App\Http\Controllers;

use App\Models\layanan; // import Model di sini
use App\Models\user; // import Model di sini
use Illuminate\Http\Request;

class MasterLayananController extends Controller
{
    public function index()
    {
        // Ambil data layanan dengan join ke tabel users
        $layanans = Layanan::select(
            'master_layanan.*',
            'users.name as kasatpel'
            )
            ->join('users', 'master_layanan.kasatpel_id', '=', 'users.id')
            ->where('users.role_name', 'kasatpel')
            ->get();
            
            // Ambil data kasatpel dari tabel users dengan role "kasatpel"
            $kasatpelOptions = User::where('role_name', 'kasatpel')->select('id', 'name')->distinct()->get();
            
            return view('master-data.layanan.index', compact('layanans', 'kasatpelOptions'));
    }
        
        public function edit($id)
        {
            // Ambil data layanan dengan join ke tabel users
            $layanan = Layanan::join('users', 'master_layanan.kasatpel_id', '=', 'users.id')
            ->where('users.role_name', 'kasatpel')
            ->where('master_layanan.id', $id)
            ->select('master_layanan.*', 'users.name as kasatpel')
            ->first();
            
            // Ambil data kasatpel dari tabel users dengan role "kasatpel"
            $kasatpelOptions = User::where('role_name', 'kasatpel')->select('id', 'name')->distinct()->get();
            
            return view('master-data.layanan.edit', compact('layanan', 'kasatpelOptions'));
        }
        
        public function store(Request $request)
        {
            $data = new Layanan;
            $data->kode = $request->kode;
            $data->layanan = $request->layanan;
            $data->kasatpel_id = $request->kasatpel_id;
            $data->visible = $request->visible;
            $data->created_by = 'admin';
            $data->save();
            
            return redirect()->route('master-layanan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
        
        public function update(Request $request, $id)
        {
            $layanan = Layanan::find($id);
            
            if (!$layanan) {
                return redirect()->route('master-layanan.index')->with(['error' => 'Data tidak ditemukan.']);
            }
            
            $layanan->kode = $request->kode;
            $layanan->layanan = $request->layanan;
            $layanan->kasatpel_id = $request->kasatpel_id;
            $layanan->visible = $request->visible;
            $layanan->created_by = 'admin';
            $layanan->update();
            
            return redirect()->route('master-layanan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }
        
        public function destroy($id)
        {
            $layanan = Layanan::find($id);
            
            if ($layanan) {
                $layanan->delete();
            }
            
            return redirect()->route('master-layanan.index')->with(['success' => 'Layanan berhasil dihapus!']);
        }
}
    
    
    