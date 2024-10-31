@extends('layout.page')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <!--begin::Item-->
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('dashboard.index') }}" class="text-gray-500">
                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Menu Layanan</li>
            <!--end::Item-->
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1"> Permohonan Layanan</li>
        </ul>
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">List Permohonan Layanan</h1>
        <!--end::Title-->
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Card-->
        @if(session('role') === 'ASN') <!-- Hanya tampilkan jika role user adalah ASN -->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6 d-flex justify-content-between">
                <!-- Search input -->
                <div class="d-flex align-items-center">
                    <input type="text" id="searchInput" class="form-control me-3" placeholder="Cari Permohonan..." style="width: 250px;">
                </div>
                
                <!-- Button Tambah Permohonan -->
                <a href="{{ route('permohonan.create') }}" class="btn btn-primary">
                    <i class="ki-duotone ki-plus fs-2"></i> Tambah Permohonan
                </a>
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
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
                                    {{-- Button edit dan delete --}}
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('permohonan.edit', $permohonan->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('permohonan.destroy', $permohonan->id) }}')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        @else
        <!-- Pesan untuk user yang tidak memiliki akses -->
        <div class="alert alert-warning">
            Anda tidak memiliki akses ke menu layanan ini.
        </div>
        @endif
        <!--end::Conditional content-->
        
        {{-- Modal Tambah --}}
        <!-- Modal logic and content goes here -->
        
        {{-- Modal Delete --}}
        <!-- Modal delete confirmation logic and content goes here -->
    </div>
</div>
<!--end::Content container-->

@push('custom-script')
<script>
    // Search functionality
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

    // Delete confirmation
    function confirmDelete(actionUrl) {
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = actionUrl;
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        deleteModal.show();
    }
</script>
@endpush
@endsection
