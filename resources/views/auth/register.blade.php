@extends('auth.layout')
@section('content')

<div class="d-flex flex-column flex-lg-row-fluid py-10" style="background-color: #F3F4F6;">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-600px p-10 p-lg-15 mx-auto" style="box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1); border-radius: 20px; background-color: #fff;">
            <!--begin::Form-->
            <form class="form w-100" method="POST" action="{{ route('register.store') }}" novalidate="novalidate" id="kt_sign_up_form">
                @csrf <!-- Menambahkan token CSRF untuk keamanan -->
                <!--begin::Heading-->
                <div class="mb-10 text-center">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 700;">Buat Akun</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-500 fw-semibold fs-4">Sudah punya akun?
                        <a href='login' class="link-primary fw-bold" style="color: #3B82F6;">Masuk di sini</a>
                    </div>
                    <!--end::Link-->
                </div>
                <!--end::Heading-->
                <!--begin::Separator-->
                <div class="d-flex align-items-center mb-10">
                    <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                </div>
                <!--end::Separator-->
                
                <!--begin::Input group-->
                <div class="row fv-row mb-7">
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bold text-dark fs-6">Nama Depan</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" style="border-radius: 10px;" required />
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bold text-dark fs-6">Nama Belakang</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" autocomplete="off" style="border-radius: 10px;" required />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <label class="form-label fw-bold text-dark fs-6">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" style="border-radius: 10px;" required />
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <label class="form-label fw-bold text-dark fs-6">NRK</label>
                    <input class="form-control form-control-lg form-control-solid" type="number" placeholder="" name="nrk" autocomplete="off" style="border-radius: 10px;" required />
                </div>
                <!--end::Input group-->
                
                <!--begin::Input group-->
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Label-->
                        <label class="form-label fw-bold text-dark fs-6">Password</label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" style="border-radius: 10px;" required />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="ki-duotone ki-eye-slash fs-2"></i>
                                <i class="ki-duotone ki-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka & simbol.</div>
                    <!--end::Hint-->
                </div>
                <!--end::Input group=-->

                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <label class="form-label fw-bold text-dark fs-6">Confirm Password</label>
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" style="border-radius: 10px;" required />
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <label class="form-check form-check-custom form-check-solid form-check-inline">
                        <input class="form-check-input" type="checkbox" name="toc" value="1" required />
                        <span class="form-check-label fw-semibold text-gray-700 fs-6">Saya Setuju 
                            <a href="#" class="ms-1 link-primary" style="color: #3B82F6;">Syarat dan ketentuan.</a>.
                        </span>
                    </label>
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="text-center">
                    <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary w-100" style="background-color: #3B82F6; border-radius: 10px; transition: background-color 0.3s ease;">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
    
    <!--begin::Footer-->
    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
        <!--begin::Links-->
        <div class="d-flex flex-center fw-semibold fs-6">
            <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
            <a href="https://devs.keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
            <a href="https://keenthemes.com/products/saul-html-pro" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>

@endsection
