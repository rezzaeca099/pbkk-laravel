<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\MasterLayanan; // Import model MasterLayanan

class PermohonanLayananController extends Controller
{
    public function index() {
        $permohonans = Permohonan::all();
        return view('permohonan.index', compact('permohonans'));
    }

    public function create(){
        $layananList = MasterLayanan::where('visible', 1)->get();
        return view('permohonan.create', compact('layananList'));
    }

    public function edit($id){
        // Ambil data permohonan berdasarkan ID
        $permohonan = Permohonan::findOrFail($id);
        // Ambil data layanan dari tabel master_layanan
        $layananOptions = \App\Models\MasterLayanan::where('visible', 1)->get();
    
        return view('permohonan.edit', compact('permohonan', 'layananOptions'));
    }
    

    public function store(Request $request){
        $data = new Permohonan();
        $data->layanan = $request->layanan;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->skpd = $request->skpd;
        $data->email = $request->email;
        $data->no_whatsapp = $request->nowhatsappaktif;
        $data->lampiran = $request->lampiran;
        $data->tanggal_pelaksana = $request->tanggalpelaksana;
        $data->save();

        return redirect()->route('permohonan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id){
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->layanan = $request->layanan;
        $permohonan->nama = $request->nama;
        $permohonan->jabatan = $request->jabatan;
        $permohonan->skpd = $request->skpd;
        $permohonan->email = $request->email;
        $permohonan->no_whatsapp = $request->nowhatsappaktif;
        $permohonan->lampiran = $request->lampiran;
        $permohonan->tanggal_pelaksana = $request->tanggal_pelaksana;
        $permohonan->update();

        return redirect()->route('permohonan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id){
        $permohonan = Permohonan::find($id);
        if ($permohonan) {
            $permohonan->delete();
        }
        return redirect()->route('permohonan.index')->with(['success' => 'Permohonan berhasil dihapus!']);
    }
}
