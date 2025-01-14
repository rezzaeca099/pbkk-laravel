<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Check;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role_name;

        // Jika user adalah ASN, hanya ambil laporan yang sesuai dengan asn_id
        if ($userRole === 'ASN') {
            $check = Check::where('asn_id', $userId)->get();
        } else {
            // Jika user adalah Kasatpel, ambil data berdasarkan kasatpel_id atau laporan yang sudah dialihkan ke ASN
            $check = Check::where('kasatpel_id', $userId)
                ->orWhereNotNull('asn_id') // Termasuk laporan yang sudah dialihkan ke ASN
                ->get();
        }

        // Ambil daftar pengguna dengan role ASN
        $asnUsers = User::where('role_name', 'ASN')->get();

        // Kirim data ke view
        return view('dashboard.index', compact('check', 'asnUsers'));
    }

    public function assign($id, Request $request)
    {
        // Temukan laporan berdasarkan ID
        $check = Check::findOrFail($id);

        // Ambil ASN ID dari request atau pilih ASN secara otomatis
        $asnId = $request->input('asn_id');
        if (!$asnId) {
            $asn = User::where('role_name', 'ASN')->first(); // Ambil ASN pertama jika tidak dipilih
            if (!$asn) {
                return redirect()->back()->with('error', 'ASN tidak ditemukan.');
            }
            $asnId = $asn->id;
        }

        // Pastikan ASN yang dipilih ada di database
        $asn = User::find($asnId);
        if (!$asn || $asn->role_name !== 'ASN') {
            return redirect()->back()->with('error', 'ASN tidak valid.');
        }

        // Mengalihkan laporan ke ASN
        $check->asn_id = $asnId; // Menyimpan ID ASN pada laporan
        $check->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dialihkan ke akun ASN.');
    }

    public function asnDashboard()
    {
        // Ambil ID ASN yang sedang login
        $asnId = Auth::user()->id;

        // Ambil laporan yang telah dialihkan ke ASN yang sedang login
        $reports = Check::where('asn_id', $asnId)->get();

        // Kirim data ke view
        return view('asn.dashboard', compact('reports'));
    }
}
