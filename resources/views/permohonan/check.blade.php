@extends('layout.page')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                <a href="{{ route('permohonan.index') }}" class="text-gray-500">
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
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Check Status</li>
        </ul>
        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Check Status Permohonan</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <!-- Form -->
            <form action="{{ route('check.store') }}" method="POST">
                @csrf

                <div class="card-body">
                    <!-- Hidden Input for Permohonan ID -->
                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">

                    <!-- Dropdown Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Pilih Status</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="progres">Progres</option>
                            <option value="kendala">Kendala</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <!-- Form Laporan Kerja -->
                    <div id="laporan-kerja" style="display: none;">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan Judul Laporan" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi laporan"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="card-footer d-flex justify-content-start">
                    <a href="{{ route('permohonan.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusDropdown = document.getElementById('status');
        const laporanKerja = document.getElementById('laporan-kerja');

        // Event listener untuk menampilkan/menyembunyikan form laporan kerja
        statusDropdown.addEventListener('change', function () {
            if (this.value === 'selesai') {
                laporanKerja.style.display = 'block';
            } else {
                laporanKerja.style.display = 'none';
            }
        });
    });
</script>
