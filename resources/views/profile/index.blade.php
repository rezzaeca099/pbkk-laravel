@extends('layout.page')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-500">
                <a href="{{ route('dashboard.index')}}" class="text-muted text-hover-primary d-flex align-items-center">
                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-2"></i> Home
                </a>
            </li>   
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-muted mx-1"></i>
            </li>
            <li class="breadcrumb-item text-muted">Profile</li>
        </ul>
        <h1 class="page-heading text-dark fw-bold fs-2 lh-sm">Profile User</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card border-0 rounded-lg shadow-sm">
            <div class="card-body p-4 text-center">
                <div class="mb-4">
                    <img src="{{ asset('assets/media/avatars/300-2.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle mb-3" width="120" height="120" style="box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border: 4px solid #fff;">
                    <h2 class="fw-bold text-dark">{{ Auth::user()->name }}</h2>
                    <p class="text-muted fs-6">{{ Auth::user()->email }}</p>
                </div>

                <div class="row justify-content-center gap-4">
                    <div class="col-md-5 mb-3">
                        <p class="text-muted mb-1">Full Name</p>
                        <h6 class="text-dark fw-semibold">{{ Auth::user()->name }}</h6>
                    </div>
                    <div class="col-md-5 mb-3">
                        <p class="text-muted mb-1">Username</p>
                        <h6 class="text-dark fw-semibold">{{ Auth::user()->username }}</h6>
                    </div>
                    <div class="col-md-5 mb-3">
                        <p class="text-muted mb-1">Role</p>
                        <h6 class="text-dark fw-semibold">{{ Auth::user()->role_name }}</h6>
                    </div>
                    <div class="col-md-5 mb-3">
                        <p class="text-muted mb-1">Joined on</p>
                        <h6 class="text-dark fw-semibold">{{ Auth::user()->created_at->format('d M Y') }}</h6>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-2 mt-5">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-outline-secondary btn-sm" style="border-radius: 25px;">
                        <i class="fas fa-arrow-left me-2"></i> kembali
                    </a>
                    <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-primary btn-sm text-white" style="border-radius: 25px;">
                        <i class="fas fa-edit me-2"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
