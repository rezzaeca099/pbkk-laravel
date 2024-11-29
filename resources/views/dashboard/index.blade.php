@extends('layout.page')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('dashboard.index') }}" class="text-gray-500">
                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dashboard</li>
        </ul>
        <h1 class="page-heading text-dark fw-bolder fs-2">Dashboard</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <div class="card-header py-3">
                <h3 class="card-title fw-bold text-gray-700">Laporan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle" id="dataTable">
                        <thead class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($check as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    @if ($item->asn_id)
                                        <span class="badge bg-success">Dialihkan ke ASN</span>
                                    @else
                                        <span class="badge bg-warning">Belum Dialihkan</span>
                                    @endif
                                </td>

                                {{-- Button --}}
                                <td>
                                    @if (!$item->asn_id)
                                    <form action="{{ route('laporan.assign', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengalihkan laporan ini ke akun ASN?')">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-sm">
                                            <i class="ki-duotone ki-arrow-right fs-6"></i> Alihkan ke ASN
                                        </button>
                                    </form>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>

                            {{-- Jika Tidak Ada data Laporan --}}
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
