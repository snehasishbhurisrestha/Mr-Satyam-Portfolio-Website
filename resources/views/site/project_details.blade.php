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
    .video-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Add spacing between videos */
        justify-content: center;
    }

    .video-item {
        flex: 1 1 calc(25% - 20px);
        max-width: calc(33.33% - 20px);
        box-sizing: border-box;
        position: relative;
    }

    /* Medium screens (tablets, ≤768px): 2 videos per row */
    @media (max-width: 768px) {
        .video-item {
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
        }
    }

    /* Small screens (phones, ≤480px): 1 video per row */
    @media (max-width: 480px) {
        .video-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .video-item {
            flex: 1 1 calc(50% - 10px); /* Each video takes 50% width */
            max-width: calc(50% - 10px);
        }
        /* .video-item {
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
        } */
        /* .rwd-media iframe{
            height: 256px !important;
        } */

        .rwd-media {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9; /* Ensures correct width-height ratio */
            min-height: 327px; /*
            padding-top: 56.25%;  16:9 Aspect Ratio */
            border-radius: 15px !important;
            overflow: hidden;
        }

        .rwd-media iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            background: none !important;
            border-radius: 15px !important;
        }
    }

    .rwd-media iframe {
        width: 100%;
        background: none !important;
        border-radius: 15px !important;
        border: none;
        /* height: 100%; */
    }
</style>
@include('site.project-in-mind-css')
@endsection

@section('content')
<div class="pagepiling">
    <section class="projects pp-scrollable pagepiling" style="padding: 6rem 0 !important;">
        <div class="container" style="margin-top: 25px;">
            <div class="row d-flex">
                <div class="col-md-6 justify-content-center">
                    {{-- <div class="text-center testimonial-title">
                        <h2 class="title-uppercase mb-0" style="color: #272727;">Shareable videos accelerate <span> brand recognition</span> globally</h2>
                        <p>Join the movement and be part of the buzz!</p>
                    </div> --}}
                    @if ($parent_project->hasMedia($collection))
                        <img src="{{ $parent_project->getFirstMediaUrl($collection) }}" alt="" style="display: inline-block; max-width: 100%; height: auto; vertical-align: middle;">
                    @endif

                </div>
            </div>
            <div class="video-grid">
                @foreach ($projects as $project)
                    <div class="video-item">
                        <div class="rwd-media">
                            <iframe 
                                title="vimeo-player" 
                                src="{{ $project->video_link }}" 
                                frameborder="0" 
                                webkitAllowFullScreen 
                                mozallowfullscreen 
                                allowFullScreen>
                            </iframe>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('site.project-in-mind-code')
        </div>
    </section>
</div>
  @endsection  