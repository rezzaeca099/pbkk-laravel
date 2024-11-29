<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\layanan;
use App\Models\Permohonan;
use App\Models\MasterLayanan; // Import model MasterLayanan
use App\Models\user;

class PermohonanLayananController extends Controller
{
    public function index() {
        $user = auth()->user();

        if ($user->role_name == 'ASN') {
            // Ambil data permohonan untuk ASN
            $permohonans = Permohonan::where('user_id', $user->id)->get();
        } elseif ($user->role_name == 'tenaga_ahli') {
            // Ambil data permohonan untuk tenaga ahli berdasarkan disposisi
            $permohonans = Permohonan::where('tenaga_ahli_id', $user->id)->get();
        } else {
            // Ambil data permohonan untuk kasatpel
            $permohonans = Permohonan::where('kasatpel_id', $user->id)->get();
        }

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
        $layananOptions = MasterLayanan::where('visible', 1)->get();

        // Ambil data pengguna dengan role 'tenaga_ahli' yang terkait dengan kasatpel yang sedang login
        $kasatpel = Auth()->user();
        $tenagaAhli = User::where('role_name', 'tenaga_ahli')
                    ->where('kasatpel_id', $kasatpel->id) // Tambahkan kondisi kasatpel
                    ->get();

        return view('permohonan.edit', compact('permohonan', 'layananOptions', 'tenagaAhli'));
    }

    public function store(Request $request){

        $layanan = layanan::where('id',$request->layanan)->first();
        $data = new Permohonan();
        $data->layanan = $request->layanan;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->kasatpel_id = $layanan->kasatpel_id;
        $data->skpd = $request->skpd;
        $data->user_id = Auth()->user()->id; 
        $data->email = $request->email;
        $data->no_whatsapp = $request->nowhatsappaktif;
        $data->tanggal_pelaksana = $request->tanggalpelaksana;

        // Logic Untuk Gambar 
        if(!empty($request->lampiran) && $request->lampiran != null){
            $file = $request->file('lampiran');
            $filename = rand(0, 99).time().'_'.$file->getClientOriginalName();
            $file->storeAs('public', $filename);

            $data->lampiran = $filename;
        }

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
        $permohonan->user_id = Auth()->user()->id; 
        $permohonan->no_whatsapp = $request->nowhatsappaktif;
        // $permohonan->lampiran = $request->lampiran;
        $permohonan->tanggal_pelaksana = $request->tanggal_pelaksana;
        $permohonan->tenaga_ahli_id = $request->tenaga_ahli;
        

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

    public function disposisi(Request $request, $id)
    {
        // Ambil ID tenaga ahli berdasarkan nama
        $tenagaAhli = User::where('role_name', 'tenaga_ahli') // Menyaring pengguna dengan role "tenaga_ahli"
            ->where('name', $request->tenaga_ahli) // Mencocokkan nama tenaga ahli
            ->select('id') // Ambil ID 
            ->first();

        // Jika tenaga ahli tidak ditemukan, kembalikan dengan pesan error
        if (!$tenagaAhli) {
            return redirect()->back()->with('error', 'Tenaga Ahli tidak ditemukan!');
        }

        // Update data di tabel permohonan_layanan
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->update([
            'tenaga_ahli_id' => $tenagaAhli->id, // Update ID tenaga ahli
            'status' => 'disposisi', // Update status
        ]);
        

        // Redirect dengan pesan sukses
        return redirect()->route('permohonan.index')->with('success', 'Disposisi berhasil dilakukan!');
    }

    public function showDisposisiForm($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // Ambil data layanan
        $layananOptions = MasterLayanan::where('visible', 1)->get();

        // Ambil data tenaga ahli yang terkait dengan kasatpel
        $tenagaAhli = User::where('role_name', 'tenaga_ahli')
            ->where('kasatpel_id', auth()->user()->id)
            ->get();

        // Kirim no_whatsapp ke view
        return view('permohonan.disposisi', compact('permohonan', 'layananOptions', 'tenagaAhli'));
    }

    // public function check($id)
    // {
    //     $permohonan = Permohonan::findOrFail($id);
    //     // Tambahkan logika atau pengecekan data di sini
    //     return view('permohonan.check', compact('permohonan'));
    // }



}
