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
    .gallery-section {
        aspect-ratio: .1538584822501803 / 1;
        flex: none;
        height: auto;
        overflow: visible;
        position: relative;
        width: 100%;
    }
    @media (min-width: 810px) and (max-width: 1199px) {
        .gallery-section {
            height: auto;
            width: 100%;
        }
    }
    @media (max-width: 809px) {
        .gallery-section {
            height: auto;
            order: 4;
            width: 100%;
        }
    }
    /* .pagepiling {
        touch-action: auto !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
    }
    .pp-scrollable {
        overflow-y: auto !important;
        max-height: 100vh;
        -webkit-overflow-scrolling: touch;
    } */
</style>
@include('site.project-in-mind-css')
@endsection

@section('content')
<div class="pagepiling">
    <section class="projects pp-scrollable pagepiling" style="padding: 6rem 0rem !important;overflow-y: auto;">
        <div class="container" style="margin-top: 25px;padding-left:5px;padding-right:5px;">
            {{-- <div class="row d-flex">
                <div class="col-md-6 justify-content-center">
                    <div class="text-center testimonial-title">
                        <h1 class="title-uppercase mb-0" style="color: #272727;">{{ $design->name }}</h1>
                    </div>
                </div>
            </div> --}}

            {{-- <section class="gallery-sections"> --}}
                <div class="gallery-section">
                    <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0">
                        @if ($designs && $designs->getFirstMediaUrl('graphic-design'))
                        {{-- <img src="{{ $designs->getFirstMediaUrl('graphic-design') }}" alt="Thumbnail" style="    display: block;
                                        width: 100%;
                                        height: 100%;
                                        border-radius: inherit;
                                        object-position: center center;
                                        /*object-fit: cover;*/
                                        image-rendering: auto;"> --}}
                        <img src="{{ $designs->getFirstMediaUrl('graphic-design') }}" alt="Thumbnail" style="
                                        display: block;
                                        width: 100%;
                                        height: auto;
                                        border-radius: inherit;
                                        object-fit: contain;
                                        object-position: top center;
                                        image-rendering: auto;">

                        @endif
                    </div>
                </div>
            {{-- </section> --}}
            @include('site.project-in-mind-code')
        </div>
    </section>
</div>
  @endsection  