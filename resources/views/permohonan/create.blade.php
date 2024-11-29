@extends('layout.page')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('permohonan.index')}}" class="text-gray-500">
                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Permohonan Layanan</li>
        </ul>
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Tambah Layanan Permohonan</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Layanan Permohonan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <select class="form-control" id="layanan" name="layanan" required>
                            <option value="">Pilih Layanan</option>
                            @foreach($layananList as $layanan)
                                <option value="{{ $layanan->id }}">{{ $layanan->layanan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="skpd" class="form-label">SKPD</label>
                        <input type="text" class="form-control" id="skpd" name="skpd" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="nowhatsappaktif" class="form-label">No WhatsApp Aktif</label>
                        <input type="text" class="form-control" id="nowhatsappaktif" name="nowhatsappaktif" required>
                    </div>

                    <div class="mb-3">
                        <label for="lampiran" class="form-label">Lampiran</label>
                        <input type="file" class="form-control" id="lampiran" name="lampiran" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tanggalpelaksana" class="form-label">Tanggal Pelaksana</label>
                        <input type="date" class="form-control" id="tanggalpelaksana" name="tanggalpelaksana" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="cancel" class="btn btn-light">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
