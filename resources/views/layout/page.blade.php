<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head><base href=""/>
    <title>Layanan Dinas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/logo-dinas.png')}}" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    
    
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    
    {{-- alert Logout --}}
        <!-- SweetAlert2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- alert Logout --}}
</head>

<body id="kt_app_body" 
data-kt-app-header-fixed="true" 
data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" 
data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" 
data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" 
data-kt-app-toolbar-enabled="true" data-kt-app-aside-enabled="true" 
data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" 
data-kt-app-aside-push-footer="true"
class="app-default">


<div class="d-flex flex-column flex-root app-root" id="kt_app_root" style="background-color: #F5F7F8">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--begin::Header-->
        <div id="kt_app_header" class="app-header d-flex flex-column flex-stack" style="background-color: #F5F7F8">
            <!--begin::Header main-->
            <div class="d-flex align-items-center flex-stack flex-grow-1">
                <div class="app-header-logo d-flex align-items-center flex-stack px-lg-11 mb-2" id="kt_app_header_logo">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
                        <i class="ki-duotone ki-abstract-14 fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Sidebar mobile toggle-->

                    <!--begin::Logo-->
                    <a href="dashboard" class="app-sidebar-logo">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-dinas.png')}}" class="h-30px theme-light-show" />
                    </a>
                    <!--end::Logo-->
                        
                    <!--begin::Sidebar toggle-->
                    <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-sm btn-icon btn-color-warning me-n2 d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                        <i class="ki-duotone ki-exit-left fs-2x rotate-180">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Sidebar toggle-->
                </div>

                <!--navbar-->
                @include('layout.navbar')
                <!--Navbar-->

            </div>
            
            <div class="app-header-separator"></div>
            <!--end::Separator-->
        </div>
        
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            
            <!--menu-->
            @include('layout.menu')
            <!--end::menu-->
            
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar pt-5">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                            <!--begin::Toolbar wrapper-->
                            @yield('toolbar')
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    
                    @yield('content')
                    
                </div>
                
                @include('layout.footer')
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>

<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>

<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script src="{{ asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{ asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-account.js')}}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>

@stack('custom-script')

</body>
<!--end::Body-->
</html>
