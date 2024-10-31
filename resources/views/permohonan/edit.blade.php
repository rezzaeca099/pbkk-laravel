@extends('layout.page')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <!--begin::Item-->
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('permohonan.index')}}" class="text-gray-500">
                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Permohonan Layanan</li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Edit Permohonan</li>
            <!--end::Item-->
        </ul>
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Edit Permohonan Layanan</h1>
        <!--end::Title-->
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header py-3">
                <h3 class="card-title">Form Edit Permohonan Layanan</h3>
            </div>
            <!--end::Card header-->
            
            <!--begin::Form-->
            <form action="{{ route('permohonan.update', $permohonan->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <select class="form-control" id="layanan" name="layanan" required>
                            <option value="">Pilih Layanan</option>
                            @foreach($layananOptions as $option)
                                <option value="{{ $option->layanan }}" {{ $permohonan->layanan == $option->layanan ? 'selected' : '' }}>
                                    {{ $option->layanan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="nama" value="{{ $permohonan->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="Jabatan" name="jabatan" value="{{ $permohonan->jabatan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="SKPD" class="form-label">SKPD</label>
                        <input type="text" class="form-control" id="SKPD" name="skpd" value="{{ $permohonan->skpd }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $permohonan->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nowhatsappaktif" class="form-label">No WhatsApp Aktif</label>
                        <input type="text" class="form-control" id="nowhatsappaktif" name="nowhatsappaktif" value="{{ $permohonan->nowhatsappaktif }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Lampiran" class="form-label">Lampiran</label>
                        <input type="file" class="form-control" id="Lampiran" name="lampiran">
                    </div>

                    <div class="mb-3">
                        <label for="TanggalPelaksana" class="form-label">Tanggal Pelaksana</label>
                        <input type="date" class="form-control" id="TanggalPelaksana" name="tanggal_pelaksana" value="{{ $permohonan->tanggal_pelaksana }}" required>
                    </div>
                </div>
                
                <!--begin::Card footer-->
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        <a href="{{ route('permohonan.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
                <!--end::Card footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@endsection
