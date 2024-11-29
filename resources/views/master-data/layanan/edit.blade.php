@extends('layout.page')
@section('content')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('master-layanan.index')}}" class="text-gray-500">
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
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Edit Data Layanan</h1>
    </div>
</div>
@endsection

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Layanan</h6>
            </div>

            <div class="card-body py-4">
                <form action="{{ route('master-layanan.update', $layanan->id ) }}" method="POST">
                    @csrf


                    <div class="mb-3">
                        <label for="Kode" class="form-label">Kode Layanan</label>
                        <input type="text" class="form-control" id="Kode" name="kode" value="{{ $layanan->kode }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Layanan" class="form-label">Layanan</label>
                        <input type="text" class="form-control" id="Layanan" name="layanan" value="{{ $layanan->layanan }}" required>
                    </div>

                    <!-- Dropdown Kasatpel -->
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
                            <option value="1" {{ $layanan->visible == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $layanan->visible == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('master-layanan.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
