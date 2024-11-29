<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Check;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        // Ambil ID Kasatpel yang sedang login
        $kasatpelId = Auth::user()->id;

        // Filter data berdasarkan kasatpel_id atau laporan yang sudah dialihkan ke ASN
        $check = Check::where('kasatpel_id', $kasatpelId)
            ->orWhereNotNull('asn_id') // Termasuk laporan yang sudah dialihkan ke ASN
            ->get();

        // Kirim data ke view
        return view('dashboard.index', compact('check'));
    }

    public function assign($id)
    {
        // Temukan laporan berdasarkan ID
        $check = Check::findOrFail($id);

        // Temukan akun ASN yang akan menerima laporan
        $asn = User::where('role_name', 'ASN')->first();  // Ambil ASN pertama

        // Pastikan ASN ditemukan
        if (!$asn) {
            return redirect()->back()->with('error', 'ASN tidak ditemukan.');
        }

        // Mengalihkan laporan ke ASN
        $check->asn_id = $asn->id;  // Menyimpan ID ASN pada laporan
        $check->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dialihkan ke akun ASN.');
    }


}
