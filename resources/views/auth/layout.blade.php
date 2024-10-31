<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="../../"/>
    <title>Layanan Dinas</title>
    <meta charset="utf-8" />
    
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/logo-dinas.png')}}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="kt_body" class="app-blank">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Header-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="login" class="py-2 py-lg-20">
                            <img alt="Logo" src="{{ asset('assets/media/logos/logo-dinas.png')}}" class="h-40px h-lg-50px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-5 pb-md-10">Selamat Datang</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="d-none d-lg-block fw-semibold fs-2 text-white">Perindustrian Perdagangan Koperasi Usaha Kecil
                            <br />dan Menengah Provinsi DKI Jakarta.</p>
                        <!--end::Description-->
                    </div>
                        <!--end::Header-->
                </div>
                    <!--end::Wrapper-->
            </div>
                <!--begin::Aside-->
                @yield('content')
        </div>
    </div>  


        <script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
        <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>  
</body>
<!--end::Body-->
</html>
