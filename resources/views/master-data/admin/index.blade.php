@extends('layout.page')

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
            <li class="breadcrumb-item text-gray-700">Master Akun</li>
        </ul>
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">List Master Akun</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        {{-- <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-2"></i>
                            Filter
                        </button>
                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                            <i class="ki-duotone ki-exit-up fs-2"></i>
                            Export
                        </button> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                            <i class="ki-duotone ki-plus fs-2"></i>
                            Tambah Akun
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Visible</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            @foreach ($data as $user)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="{{ $user->id }}" />
                                    </div>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role_name }}</td>
                                <td>
                                    <span class="badge badge-pill {{ $user->visible == 1 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $user->visible == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>                                
                                <td class="text-end">
                                    <a href="{{ route('master-akun.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('master-akun.destroy', $user->id) }}')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal Tambah Akun --}}
        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Baru</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('master-akun.store')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" class="form-control" name="role" required>
                                    <option value="">Pilih Role</option>
                                    <option value="ASN">ASN</option>
                                    <option value="kasatpel">kasatpel</option>
                                    <option value="tenaga_ahli">tenaga_ahli</option>
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

        {{-- Modal Hapus --}}
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus layanan ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteForm" method="get">
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let filter = this.value.toUpperCase();
        let rows = document.querySelectorAll('#userTableBody tr');

        rows.forEach(row => {
            let name = row.querySelector('td:nth-child(2)').innerText.toUpperCase();
            let email = row.querySelector('td:nth-child(3)').innerText.toUpperCase();

            if (name.indexOf(filter) > -1 || email.indexOf(filter) > -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    function confirmDelete(deleteUrl) {
        document.getElementById('deleteForm').action = deleteUrl;
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        deleteModal.show();
    }
</script>

@endsection
