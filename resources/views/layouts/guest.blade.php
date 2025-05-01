<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    
        <meta charset="utf-8">
        <title>@yield('title') | {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Design And Developed By Soumyadeep Kr. Dey, Puja Koley, Antara Debnath, Madhumita Dutta, Prity Bagchi" name="description">
        <meta content="Themesbrand" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/site-asset/images/logo.png') }}">
    
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/admin-assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('assets/admin-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{ asset('assets/admin-assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    
        <style>
            
            .btn-grad {background-image: linear-gradient(to right, #FF512F 0%, #F09819  51%, #FF512F  100%)}
            .btn-grad {
                margin: 10px;
                padding: 15px 45px;
                text-align: center;
                text-transform: uppercase;
                transition: 0.5s;
                background-size: 200% auto;
                color: white;            
                box-shadow: 0 0 20px #eee;
                border-radius: 10px;
                display: block;
            }

            .btn-grad:hover {
                background-position: right center; /* change the direction of the change here */
                color: #fff;
                text-decoration: none;
            }
         
        </style>
    </head>

    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('{{ asset('assets/admin-assets/images/bg.jpg') }}');background-size: cover;background-position: center;height: 100vh;"></div>
        <div class="account-pages my-2 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card overflow-hidden" style="background-color: #3b383854 !important;">
                            
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <a href="{{ route('home') }}" class="">
                                    <img src="{{ asset('assets/site-asset/images/logo.png') }}" height="75" alt="logo">
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="p-3">
                                    {{ $slot }}
                                    <div class="mt-5 text-center" style="position: relative;color:#fff !important;">
                                        <!-- <p>Don't have an account ? <a href="pages-register.html" class="fw-medium text-primary"> Signup now </a> </p> -->
                                        © 2025 MrSytam. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://snehasishbhurisrestha.github.io/My-Portfolio/" style="color: #b8f31b;"><b>Snehasish Bhurisrestha</b></a>
                                    </div>

                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>

    

                <!-- JAVASCRIPT -->
                <script src="{{ asset('assets/admin-assets/libs/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('assets/admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <script src="{{ asset('assets/admin-assets/libs/metismenu/metisMenu.min.js') }}"></script>
                <script src="{{ asset('assets/admin-assets/libs/simplebar/simplebar.min.js') }}"></script>
                <script src="{{ asset('assets/admin-assets/libs/node-waves/waves.min.js') }}"></script>


        <script src="{{ asset('assets/admin-assets/js/app.js') }}"></script>

    </body>
</html>
