<div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
                    
    <div class="app-navbar-item ms-3 ms-lg-4 me-lg-2" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-30px symbol-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img src="{{ asset('assets/media/avatars/300-2.jpg') }}" alt="admin" />
        </div>
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">   
                        <img alt="Logo" src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">{{ Auth()->user()->name }}
                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ Auth()->user()->role_name }}</span>
                        </div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth()->user()->email }}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->

            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="{{ route('profile.index') }}" class="menu-link px-5">My Profile</a>
            </div>

            <!--begin::Menu item-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5" id="logout-link">Sign Out</a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::User menu-->
    <!--begin::Action-->
    <div class="app-navbar-item ms-3 ms-lg-4 me-lg-6">
        <!--begin::Link-->
        <a href="../dist/authentication/sign-in/basic.html" class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
            <i class="ki-duotone ki-setting-3 fs-1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
            </i>
        </a>
        <!--end::Link-->
    </div>
    <!--end::Action-->
    <!--begin::Header menu toggle-->
    <div class="app-navbar-item ms-3 ms-lg-4 ms-n2 me-3 d-flex d-lg-none">
        <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" id="kt_app_aside_mobile_toggle">
            <i class="ki-duotone ki-burger-menu-2 fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
                <span class="path6"></span>
                <span class="path7"></span>
                <span class="path8"></span>
                <span class="path9"></span>
                <span class="path10"></span>
            </i>
        </div>
    </div>
    <!--end::Header menu toggle-->
</div>

<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah link langsung diakses
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari akun ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "login"; // Arahkan ke halaman logout jika user mengonfirmasi
            }
        })
    });


</script>
