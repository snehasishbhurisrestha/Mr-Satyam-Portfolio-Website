@extends('layouts.app')

@section('title','Our Client')

@section('content')

   <div class="page-title-box">
      <div class="row align-items-center">
         <div class="col-md-8">
            <h6 class="page-title">Our Client</h6>
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('our-client.index') }}">Our Client</a></li>
               <li class="breadcrumb-item active" aria-current="page">Our Client</li>
            </ol>
         </div>
         {{-- <div class="col-md-4">
            <div class="float-end d-none d-md-block">
               <div class="dropdown">
                  <a href="{{ route('our-client.index') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                  </a>
               </div>
            </div>
         </div> --}}
      </div>
   </div>
   <!-- end page title -->

    <form action="{{ route('our-client.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Our Client
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">For Big Screen <small class="text-danger">(max 2mb)</small></label>
                                <div class="mb-2">
                                    <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="@if (!is_null($client)) {{ $client->getFirstMediaUrl('our-client-laptop') ?? '' }} @endif" data-holder-rendered="true" style="display: @if (!is_null($client)) {{ is_have_image($client->getFirstMediaUrl('our-client-laptop')) ?? '' }} @endif;">
                                </div>
                                <div class="mb-0">
                                    <input type="file" name="file1" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <label for="">For Small Screen <small class="text-danger">(max 2mb)</small></label>
                                <div class="mb-2">
                                    <img class="img-thumbnail rounded me-2" id="blah2" alt="" width="200" src="@if (!is_null($client)) {{ $client->getFirstMediaUrl('our-client-mobile') ?? '' }} @endif" data-holder-rendered="true" style="display: @if (!is_null($client)) {{ is_have_image($client->getFirstMediaUrl('our-client-mobile')) ?? '' }} @endif;">
                                </div>
                                <div class="mb-0">
                                    <input type="file" name="file2" class="filestyle" id="imgInp2" data-input="false" data-buttonname="btn-secondary">
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Publish
                    </div>
                    <div class="card-body">
                        {{-- <div class="mb-3">
                            <label class="form-label mb-3 d-flex">Visiblity</label>
                            <div class="form-check form-check-inline">
                            <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                            <label class="form-check-label" for="customRadioInline1">Show</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                            <label class="form-check-label" for="customRadioInline2">Hide</label>
                            </div>
                        </div> --}}

                        <div class="mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                            Save & Publish
                            </button>
                            <!-- <button type="reset" class="btn btn-secondary waves-effect">
                            Cancel
                            </button> -->
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </form>

@endsection

@section('script')
<script>
    $('#imgInp2').on('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah2').attr('src', e.target.result).css('display', 'block');
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
</script> 
@endsection
