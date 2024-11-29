<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\Check;

class CheckController extends Controller
{
    public function check($id)
    {
        // Ambil data permohonan berdasarkan ID
        $permohonan = Permohonan::findOrFail($id);
        return view('permohonan.check', compact('permohonan'));
    }

    public function store(Request $request)
    {
        // Ambil data input tanpa validasi
        $permohonan_id = $request->input('permohonan_id');
        $status = $request->input('status');
        $judul = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $deskripsi = $request->input('deskripsi');

        // Ambil data kasatpel_id dan tenaga_ahli_id dari permohonan_layanan
        $permohonan = Permohonan::findOrFail($permohonan_id);

        $kasatpel_id = $permohonan->kasatpel_id;
        $tenaga_ahli_id = $permohonan->tenaga_ahli_id;

        // Simpan data ke tabel checks
        $check = new Check();
        $check->permohonan_id = $permohonan_id;
        $check->status = $status;
        $check->judul = $judul;
        $check->tanggal = $tanggal;
        $check->deskripsi = $deskripsi;
        $check->kasatpel_id = $kasatpel_id; // Masukkan kasatpel_id
        $check->tenaga_ahli_id = $tenaga_ahli_id; // Masukkan tenaga_ahli_id
        $check->save();

        // Redirect ke halaman permohonan dengan pesan sukses
        return redirect()->route('permohonan.index')->with('success', 'Data berhasil disimpan.');
    }
    
    public function update(Request $request, $id){
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->layanan = $request->layanan;
        $permohonan->nama = $request->nama;
        $permohonan->jabatan = $request->jabatan;
        $permohonan->skpd = $request->skpd;
        $permohonan->email = $request->email;
        $permohonan->user_id = Auth()->user()->id; 
        $permohonan->no_whatsapp = $request->nowhatsappaktif;
        $permohonan->lampiran = $request->lampiran;
        $permohonan->tanggal_pelaksana = $request->tanggal_pelaksana;
        $permohonan->tenaga_ahli_id = $request->tenaga_ahli;

        $permohonan->update();

        return redirect()->route('permohonan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

}
