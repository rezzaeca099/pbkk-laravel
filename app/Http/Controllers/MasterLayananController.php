<?php

namespace App\Http\Controllers;

use App\Models\Layanan; // import Model di sini
use Illuminate\Http\Request;

class MasterLayananController extends Controller
{
    public function index(){
        $layanans = Layanan::all(); // Mengambil semua data layanan dari database
        return view('master-data.layanan.index', compact('layanans')); // Mengirim data ke view
        // return view('master-data.layanan.index');
    }

    public function edit($id){
        $layanan = Layanan::find($id); // Mengambil data berdasarkan ID
        return view('master-data.layanan.edit', compact('layanan')); // Kirim data layanan ke view
    }

    public function show(){
        return view('master-data.layanan.show');
    }
    
    public function create(){
        return view('master-data.layanan.create');
    }

    public function store(Request $request){
        $data = new Layanan;
        $data->kode = $request->kode;
        $data->layanan = $request->layanan;
        $data->visible = $request->visible;
        $data->created_by = 'admin';
        $data->save();

    // //redirect to index
    return redirect()->route('master-layanan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id){
    // Mencari data layanan berdasarkan ID
    $layanan = Layanan::find($id);

    // Periksa apakah layanan ditemukan
    if (!$layanan) {
        return redirect()->route('master-layanan.index')->with(['error' => 'Data tidak ditemukan.']);
    }

    // Update data layanan
    $layanan->kode = $request->kode;
    $layanan->layanan = $request->layanan;
    $layanan->visible = $request->visible;
    $layanan->created_by = 'admin';
    $layanan->update();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('master-layanan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id){
    // Cari layanan berdasarkan ID
    $layanan = Layanan::find($id);
    
    // Hapus layanan
    if ($layanan) {
        $layanan->delete();
    }

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('master-layanan.index')->with(['success' => 'Layanan berhasil dihapus!']);
    }

    
    
}
