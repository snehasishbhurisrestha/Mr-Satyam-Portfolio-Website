@extends('layouts.web-app')

@section('title','Projects')

@section('css')
<style>
    body {
        background: rgb(255 255 255);;
    }
    header {
        background-color: #272727 !important;
    }
    /* Centering the gallery section */
    .gallery-section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
        width: 100%;
    }
    
    /* Make the gallery grid responsive */
    .gallery {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 columns */
        gap: 40px;
        max-width: 1000px;
        width: 100%;
    }
    
    /* Responsive Design: 1 column on smaller screens */
    @media (max-width: 768px) {
        .gallery {
            grid-template-columns: repeat(1, 1fr); /* 1 column on mobile */
        }
    }
    
    /* Style for gallery items */
    .gallery-item {
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        box-shadow: 0px 5px 15px rgba(245, 245, 245, 0.413); /* Soft shadow effect */
        border-radius: 12px;
    }
    
    /* Image hover effect */
    .gallery-item img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
    }
    
    /* Hover effect: shadow remains, image zooms */
    .gallery-item:hover {
        transform: scale(1.1);
    }
    /* .pagepiling {
        touch-action: auto !important;
    } */
    /* @media (max-width: 768px) {
        .pagepiling, .pp-scrollable {
            touch-action: auto !important;
            overflow: auto;
            overflow-y: auto !important;
        }
    } */

</style>
@endsection

@section('content')
<div class="pagepiling">
    <section class="projects pp-scrollable pagepiling mt-3" style="padding: 6rem 2rem !important;">
        <div class="container" style="margin-top: 25px;padding-left:5px;padding-right:5px;">
            <div class="row d-flex">
                <div class="col-md-6 justify-content-center">
                    {{-- <div class="text-center testimonial-title">
                        <h2 class="title-uppercase mb-0" style="color: #272727;">Eye-Catching Designs Boost <span> Brand Visibility</span> Globally</h2>
                        <p>Join the creative wave and make an impact!</p>
                    </div> --}}
                    <div class="text-center testimonial-title">
                        <img src="{{ asset('assets/site-asset/images/projrct-page/1.png') }}" alt="" style="display: inline-block; max-width: 100%; height: auto; vertical-align: middle;">
                        <p>Join the creative wave and make an impact!</p>    
                    </div>
                </div>
            </div>

            <section class="gallery-section">
                <div class="gallery-inner">
                    <div class="gallery">
                        @foreach($designs as $design)
                        <div class="gallery-item">
                            <a href="{{ route('project.grapic-design-details',$design->slug) }}">
                                <img src="{{ $design->getFirstMediaUrl('graphic-design') }}" alt="Thumbnail">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
  @endsection  