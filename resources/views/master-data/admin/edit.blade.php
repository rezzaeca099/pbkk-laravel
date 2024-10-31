@extends('layout.page')
@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('master-akun.index')}}" class="text-gray-500">
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
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Edit Master Akun</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h5>Edit Akun</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('master-akun.update', $user->id) }}" method="post">
                    @csrf
                    {{-- @method('PUT') --}}

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" class="form-control" name="role" required>
                            <option value="">Pilih Role</option>
                            <option value="ASN" {{ $user->role == 'ASN' ? 'selected' : '' }}>ASN</option>
                            <option value="kasatpel" {{ $user->role == 'kasatpel' ? 'selected' : '' }}>kasatpel</option>
                            <option value="tenaga_ahli" {{ $user->role == 'tenaga_ahli' ? 'selected' : '' }}>tenaga_ahli</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="visible" class="form-label">Visible</label>
                        <select id="visible" class="form-control" name="visible">
                            <option value="1" {{ $user->visible == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $user->visible == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    {{-- Button --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('master-akun.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/custom/datatables.js') }}"></script>
@endpush
