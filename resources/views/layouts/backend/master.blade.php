<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')-{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap5.min.css') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"
        type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}"> --}}
    <link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/styleim.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/toastr.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>

</head>

<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('admin') }}" class="">
                            <span class="logo-sm">
                                <img src="" alt="" class="mt-3" height="60">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    {{-- <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form> --}}

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- <img class="rounded-circle header-profile-user" src="" alt=""> --}}
                            {{ Auth::user()->name }}
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry"></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href=""><i
                                    class="bx bx-user font-size-16 align-middle me-1"></i> <span
                                    key="t-profile">Profile</span></a>
                            <div class="dropdown-divider"></div>

                            <a href="#" id="logout" class="dropdown-item dash_logout text-danger ">Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('admin') }}" class="">
                                <img src="{{ asset('backend/images/icon/dashboard.png') }}" class="property_icon"
                                    alt="">
                                <span key="t-dashboards">Dashboards</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-apps">Pages</li>

                        @include('layouts.backend.pages')
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    {{-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                </div>
                            </div>
                        </div> --}}
                    <!-- end page title -->

                    <div class="">
                        {{-- @include('alert.messsage') --}}
                        @yield('content')
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Capitec.
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-lg-end text-sm-start">
                                Design & Developed by <a href="https://www.techdynobd.com/"
                                    target="_blank">TechdynoBD</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    {{-- <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

            </div> <!-- end slimscroll-menu-->
        </div> --}}
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>

    <script src="{{ asset('backend/js/jquery.dataTables.min2.js') }}"></script>
    <script src="{{ asset('backend/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/js/waves.min.js') }}"></script>
    <script src="{{ asset('backend/js/toastr.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/select2.min.js') }}"></script> --}}

    <!-- apexcharts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <!-- dashboard init -->
    <script src="{{ asset('backend/js/dashboard.init.js') }}"></script>
    <script>
        document.getElementById("photoInput").addEventListener("change", function() {
            var previewImage = document.getElementById("previewImage");
            var fileInput = this;

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block"; // Show the preview image
                };

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                previewImage.src = "#";
                previewImage.style.display = "none"; // Hide the preview image if no file is selected
            }
        });
        document.getElementById("photoInput2").addEventListener("change", function() {
            var previewImage = document.getElementById("previewImage2");
            var fileInput = this;

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block"; // Show the preview image
                };

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                previewImage.src = "#";
                previewImage.style.display = "none"; // Hide the preview image if no file is selected
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables for each table with the 'table' class
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $("#logout").click(function() {
            window.location.href = "/logout";
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script> --}}
   


    <!-- App js -->
    <script src="{{ asset('backend/js/app.js') }}"></script>
    @stack('script')
    {!! Toastr::message() !!}
</body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Jun 2023 10:57:27 GMT -->

</html>
