@extends('layout.page')

@section('toolbar')
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
            <li class="breadcrumb-item text-gray-500">
                <a href="{{ route('dashboard.index')}}" class="text-muted text-hover-primary">
                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-2"></i>Home
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-muted mx-1"></i>
            </li>
            <li class="breadcrumb-item text-muted">Profile</li>
            <li class="breadcrumb-item">
                <i class="ki-duotone ki-right fs-4 text-muted mx-1"></i>
            </li>
            <li class="breadcrumb-item text-muted">Edit Profile</li>
        </ul>
        <h1 class="page-heading text-dark fw-bold fs-2 lh-1">Edit Profile User</h1>
    </div>
</div>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card shadow border-0 rounded-lg p-4" style="max-width: 800px; margin: auto;">
            <div class="card-body p-5">
                <div class="profile-header text-center mb-4">
                    <img src="{{ asset('assets/media/avatars/300-2.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle mb-3" width="120" height="120" style="box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border: 4px solid #fff;">
                    <h2 class="fw-bold text-dark mb-0">{{ $user->name }}</h2>
                    <p class="text-muted fs-6">{{ $user->email }}</p>
                </div>

                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Name and Username Fields -->
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label"><strong>Name:</strong></label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="username" class="form-label"><strong>Username:</strong></label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                        </div>

                        <!-- Role and Email Fields -->
                        <div class="col-md-6 mb-4">
                            <label for="role" class="form-label"><strong>Role:</strong></label>
                            <input type="text" name="role_name" class="form-control" value="{{ $user->role_name }}" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label"><strong>Email:</strong></label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                    </div>

                    <!-- Reset Password Section -->
                    <div class="border-top pt-4 mt-4">
                        <h4 class="text-muted mb-3">Reset Password</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label"><strong>New Password:</strong></label>
                                <input type="password" name="password" class="form-control" placeholder="Enter new password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label"><strong>Confirm New Password:</strong></label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('profile.index') }}" class="btn btn-light btn-sm" style="border-radius: 30px; padding: 0.5rem 2rem;">
                            <i class="fas fa-arrow-left me-2"></i> kembali
                        </a>
                        <button type="submit" class="btn btn-success btn-sm" style="border-radius: 30px; padding: 0.5rem 2rem;">
                            <i class="fas fa-save me-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
