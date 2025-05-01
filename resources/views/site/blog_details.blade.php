@extends('layouts.web-app')

@section('title','Projects')

@section('css')

@endsection

@section('content')
<div class="pagepiling">
    <section class="projects pp-scrollable pagepiling">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 justify-content-center">
                    <div class="text-center testimonial-title">
                        <h2 class="title-uppercase mb-0"><span>{{ $blog->title }}</span></h2>
                    </div>
                </div>
            </div>
            

            <div class="row align-items-center">
                <!-- Text Section -->
                <div class="col-md-6">
                    <h1 class="mb-3">{{ $blog->title }}</h1>
                    <p class="text-muted">Published on {{ format_date($blog->publish_date) }}</p>
                    {!! $blog->description !!}
                </div>
        
                <!-- Image Section -->
                <div class="col-md-6">
                    <img src="{{ $blog->getFirstMediaUrl('blog-image') }}" class="img rounded" alt="Blog Image">
                </div>
            </div>
            
        </div>
    </section>
</div>
  @endsection  