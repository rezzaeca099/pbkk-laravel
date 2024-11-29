@extends('layout.page')
@section('content')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('dashboard.index')}}" class="text-gray-500">
                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Master Data</li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700">Master Layanan</li>
        </ul>
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">List Master Layanan</h1>
    </div>
</div>
@endsection

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-toolbar d-flex justify-content-between w-100">
                    <div class="d-flex align-items-center">
                        <input type="text" id="searchInput" class="form-control me-3" placeholder="Cari Layanan..." style="width: 250px;">
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahLayanan">
                            <i class="ki-duotone ki-plus fs-2"></i> Tambah Layanan
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Layanan</th>
                                <th>Kasatpel</th>
                                <th>Visible</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="layananTableBody">
                            @foreach ($layanans as $layanan)
                            <tr>
                                <td>{{ $layanan->kode }}</td>
                                <td>{{ $layanan->layanan }}</td>
                                <td>{{ $layanan->kasatpel }}</td>
                                <td>
                                    <span class="badge badge-pill {{ $layanan->visible == 1 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $layanan->visible == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>                                
                                <td>{{ $layanan->created_at }}</td>
                                <td>
                                    <a href="{{ route('master-layanan.edit', $layanan->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('master-layanan.destroy', $layanan->id) }}')">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambahLayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Layanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('master-layanan.store')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="Kode" class="form-label">Kode layanan</label>
                                <input type="text" class="form-control" id="Kode" name="kode" required>
                            </div>

                            <div class="mb-3">
                                <label for="Layanan" class="form-label">Layanan</label>
                                <input type="text" class="form-control" id="Layanan" name="layanan" required>
                            </div>

                            <div class="mb-3">
                                <label for="Kasatpel" class="form-label">Kasatpel</label>
                                <select id="Kasatpel" class="form-control" name="kasatpel_id" required>
                                    <option value="">Pilih Kasatpel</option>
                                    @foreach ($kasatpelOptions as $kasatpel)
                                        <option value="{{ $kasatpel->id }}">{{ $kasatpel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="Visible" class="form-label">Visible</label>
                                <select id="Visible" class="form-control" name="visible">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus layanan ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteForm" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('custom-script')
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var rows = document.getElementById('layananTableBody').getElementsByTagName('tr');

            Array.from(rows).forEach(function(row) {
                var layanan = row.cells[1].textContent.toLowerCase();
                if (layanan.indexOf(input) !== -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function confirmDelete(deleteUrl) {
            document.getElementById('deleteForm').action = deleteUrl;
            $('#deleteConfirmationModal').modal('show');
        }
    </script>
@endpush

@endsection
