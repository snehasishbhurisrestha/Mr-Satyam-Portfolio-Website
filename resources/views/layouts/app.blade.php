<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    
        <meta charset="utf-8">
        <title>@yield('title') | {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Design And Developed By Snehasish Bhurisrestha" name="description">
        <meta content="Themesbrand" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/site-asset/images/logo.png') }}">
    
        <link href="{{ asset('assets/admin-assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">
    
        <!-- DataTables -->
        <link href="{{ asset('assets/admin-assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/admin-assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/admin-assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Bootstrap Css -->
        {{-- <link href="{{ asset('assets/admin-assets/css/bootstrap-dark.min.css') }}" id="bootstraps-style" rel="stylesheet" type="text/css"> --}}
        <link href="{{ asset('assets/admin-assets/css/bootstrap.min.css') }}" id="bootstraps-style" rel="stylesheet" type="text/css">
        
        <!-- Bootstrap Rating css -->
        <link href="{{ asset('assets/admin-assets/libs/bootstrap-rating/bootstrap-rating.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin-assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('assets/admin-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        
        <!-- App Css-->
        {{-- <link href="{{ asset('assets/admin-assets/css/app-dark.min.css') }}" id="apps-style" rel="stylesheet" type="text/css"> --}}
        <link href="{{ asset('assets/admin-assets/css/app.min.css') }}" id="apps-style" rel="stylesheet" type="text/css">
    
        
        <!-- Toast message -->
        <link href="{{ asset('assets/admin-assets/libs/toast/toastr.css') }}" rel="stylesheet" type="text/css" />
        <!-- Toast message -->

        @yield('css-style')
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('layouts.admin-include.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.admin-include.left-side-bar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('content')

                        @isset($slot)
                            {{ $slot }}
                        @endisset

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }} <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://snehasishbhurisrestha.github.io/My-Portfolio/">Snehasish Bhurisrestha.</a></span>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{ asset('assets/admin-assets/images/layouts/layout-1.jpg') }}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{ asset('assets/admin-assets/images/layouts/layout-2.jpg') }}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" data-bsStyle="{{ asset('assets/admin-assets/css/bootstrap-dark.min.css') }}" 
                            data-appStyle="{{ asset('assets/admin-assets/css/app-dark.min.css') }}" />
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    {{-- <div class="mb-2">
                        <img src="{{ asset('assets/admin-assets/images/layouts/layout-3.jpg') }}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="{{ asset('assets/admin-assets/css/app-rtl.min.css') }}" />
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div> --}}

                    {{-- <div class="d-grid">
                        <a href="https://1.envato.market/grNDB" class="btn btn-primary mt-3" target="_blank"><i class="mdi mdi-cart me-1"></i> Purchase Now</a>
                    </div> --}}

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/admin-assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- toast message -->
        <script src="{{ asset('assets/admin-assets/libs/toast/toastr.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/js/pages/toastr.init.js') }}"></script>
        <!-- toast message -->
        @include('layouts._massages')

        <!-- Required datatable js -->
        <script src="{{ asset('assets/admin-assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/admin-assets/js/pages/datatables.init.js') }}"></script> 

        <!-- form mask -->
        <script src="{{ asset('assets/admin-assets/libs/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>

        <!-- form mask init -->
        <script src="{{ asset('assets/admin-assets/js/pages/form-mask.init.js') }}"></script>
        <!--tinymce js-->
        <script src="{{ asset('assets/admin-assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ asset('assets/admin-assets/js/pages/form-editor.init.js') }}"></script>

        <script src="{{ asset('assets/admin-assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>

        <!-- Bootstrap rating js -->
        <script src="{{ asset('assets/admin-assets/libs/bootstrap-rating/bootstrap-rating.min.js') }}"></script>

        <!-- Peity chart-->
        <script src="{{ asset('assets/admin-assets/libs/peity/jquery.peity.min.js') }}"></script>

        <script src="{{ asset('assets/admin-assets/libs/select2/js/select2.full.min.js') }}"></script>
        <!-- Plugin Js-->
        <script src="{{ asset('assets/admin-assets/libs/chartist/chartist.min.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>

        <script src="{{ asset('assets/admin-assets/js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('assets/admin-assets/js/pages/form-advanced.init.js') }}"></script>

        <script src="{{ asset('assets/admin-assets/js/app.js') }}"></script>

        <script>
            $('#imgInp').on('change', function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result).css('display', 'block');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        </script>    
        @yield('script')
    </body>

</html>