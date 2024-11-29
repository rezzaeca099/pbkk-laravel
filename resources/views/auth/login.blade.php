@extends('auth.layout')

@section('content')
<div class="d-flex flex-column flex-lg-row-fluid py-10">
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <div class="w-lg-500px p-10 p-lg-15 mx-auto" style="box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1); border-radius: 20px; background-color: #fff;">
            
            <!-- flash/sweetalert Message -->
            @if (session('success'))
                <script> 
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#3B82F6'
                    });
                </script>
            @endif

            @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                        confirmButtonColor: '#3B82F6'
                    });
                </script>
            @endif

            <!--begin::Form-->
            <form class="form w-100" action="{{ route('auth.proseslogin') }}" method="post">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 700;">Masuk Ke Layanan Dinas</h1>
                    <div class="text-gray-500 fw-semibold fs-4">Baru Disini?
                        <a href="{{ route('auth.register') }}" class="link-primary fw-bold" style="color: #3B82F6;">Buat Akun</a>
                    </div>
                </div>
                
                <!-- Input group: Email -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" style="border-radius: 10px 0 0 10px;">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </span>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" style="border-radius: 0 10px 10px 0;" />
                    </div>
                </div>

                <!-- Input group: Password -->
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text" style="border-radius: 10px 0 0 10px;">
                            <i class="fas fa-lock text-gray-500"></i>
                        </span>
                        <input class="form-control form-control-lg form-control-solid" type="password" id="password" name="password" autocomplete="off" style="border-radius: 0;" />
                        <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer; border-radius: 0 10px 10px 0;">
                            <i id="togglePasswordIcon" class="fas fa-eye text-gray-500"></i>
                        </span>
                    </div>
                </div>

                <!-- Actions: Login Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mb-5" style="background-color: #3B82F6; border-radius: 10px;">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Links -->
    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
        <div class="d-flex flex-center fw-semibold fs-6">
            <a href="#" class="text-muted text-hover-primary px-2">About</a>
            <a href="#" class="text-muted text-hover-primary px-2">Support</a>
            <a href="#" class="text-muted text-hover-primary px-2">Purchase</a>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        }
    }
</script>
@endsection
