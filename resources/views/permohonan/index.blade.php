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
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Menu Layanan</li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Permohonan Layanan</li>
        </ul>
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">List Permohonan Layanan</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        @if(session('role') === 'ASN' || session('role') === 'kasatpel' || session('role') === 'tenaga_ahli')
        <div class="card">
            <div class="card-header border-0 pt-6 d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <input type="text" id="searchInput" class="form-control me-3" placeholder="Cari Permohonan..." style="width: 250px;">
                </div>

                @if(session('role') === 'ASN')
                <a href="{{ route('permohonan.create') }}" class="btn btn-primary">
                    <i class="ki-duotone ki-plus fs-2"></i> Tambah Permohonan
                </a>
                @endif
            </div>

            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Layanan</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>SKPD</th>
                                <th>Email</th>
                                <th>No WhatsApp</th>
                                <th>Lampiran</th>
                                <th>Tanggal Pelaksana</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="permohonanTableBody">
                            @foreach ($permohonans as $permohonan)
                            <tr>
                                <td>{{ $permohonan->layanan }}</td>
                                <td>{{ $permohonan->nama }}</td>
                                <td>{{ $permohonan->jabatan }}</td>
                                <td>{{ $permohonan->skpd }}</td>
                                <td>{{ $permohonan->email }}</td>
                                <td>{{ $permohonan->no_whatsapp }}</td>
                                <td>
                                    @if($permohonan->lampiran)
                                    <a href="{{ asset('storage/' . $permohonan->lampiran) }}" target="_blank">Lihat Lampiran</a>
                                    @else
                                    Tidak ada lampiran
                                    @endif
                                </td>
                                <td>{{ $permohonan->tanggal_pelaksana }}</td>
                                <td>

                                    {{-- Buttons  --}}
                                    <div class="d-flex gap-2">
                                        @if(session('role') === 'kasatpel')
                                        <a href="{{ route('permohonan.disposisi', $permohonan->id) }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-send"></i> Disposisi
                                        </a>
                                        @endif

                                        @if(session('role') === 'kasatpel' || session('role') === 'ASN')
                                        <a href="{{ route('permohonan.edit', $permohonan->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        @endif

                                        @if(session('role') === 'tenaga_ahli')
                                        <a href="{{ route('permohonan.check', $permohonan->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi-check2"></i> Check
                                        </a>
                                        @endif

                                        @if(session('role') === 'kasatpel')
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('permohonan.destroy', $permohonan->id) }}')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-warning">
            Anda tidak memiliki akses ke menu layanan ini.
        </div>
        @endif
    </div>
</div>

<!-- Modal for delete confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus permohonan ini?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('custom-script')
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input = this.value.toLowerCase();
        var rows = document.getElementById('permohonanTableBody').getElementsByTagName('tr');

        Array.from(rows).forEach(function(row) {
            var layanan = row.cells[0].textContent.toLowerCase();
            if (layanan.indexOf(input) !== -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    function confirmDelete(actionUrl) {
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = actionUrl;
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        deleteModal.show();
    }
</script>
@endpush
@endsection
