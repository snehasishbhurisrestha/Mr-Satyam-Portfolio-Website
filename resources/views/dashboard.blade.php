@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Dashboard</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Welcome to {{ config('app.name') }} Dashboard</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <a href="{{ route('contact.index') }}">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/admin-assets/images/services-icon/1.png') }}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Contatc Us</h5>
                        <h4 class="fw-medium font-size-24" style="color:white;">{{ $contact }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <a href="{{ route('testimonial.index') }}">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/admin-assets/images/services-icon/2.png') }}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Testimonial</h5>
                        <h4 class="fw-medium font-size-24" style="color:white;">{{ $testimonial }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <a href="{{ route('blog.index') }}">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/admin-assets/images/services-icon/3.png') }}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Blogs</h5>
                        <h4 class="fw-medium font-size-24" style="color:white;">{{ $blog}}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <a href="{{ route('graphic-design.index') }}">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/admin-assets/images/services-icon/4.png') }}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Graphic Design</h5>
                        <h4 class="fw-medium font-size-24" style="color:white;">{{ $graphic_design}}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <a href="{{ route('project-cgi.index') }}">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/admin-assets/images/services-icon/5.png') }}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">CGI Projects</h5>
                        <h4 class="fw-medium font-size-24" style="color:white;">{{ $project_cgi }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <a href="{{ route('project-motion-graphic.index') }}">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/admin-assets/images/services-icon/6.png') }}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Motion Graphic</h5>
                        <h4 class="fw-medium font-size-24" style="color:white;">{{ $motion_graphic }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
