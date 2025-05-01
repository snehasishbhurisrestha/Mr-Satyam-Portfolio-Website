@extends('layouts.app')

@section('title','Graphic Design')

@section('content')

   <div class="page-title-box">
      <div class="row align-items-center">
         <div class="col-md-8">
            <h6 class="page-title">Graphic Design</h6>
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('graphic-design.index') }}">Graphic Design</a></li>
               <li class="breadcrumb-item active" aria-current="page">Edit Graphic Design</li>
            </ol>
         </div>
         <div class="col-md-4">
            <div class="float-end d-none d-md-block">
               <div class="dropdown">
                  <a href="{{ route('graphic-design.index') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end page title -->

   <form action="{{ route('graphic-design.update',$item->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
               <div class="card-header bg-primary text-light">
                  Edit Graphic Design
               </div>
               <div class="card-body">
                  <div class="mb-3">
                     <label class="form-label">Name</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control" required
                           placeholder="Enter title" name="name" value="{{ $item->name }}" id="name">
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Parent Design</label>
                     <select class="select2 form-control" name="graphic_designs_id" data-placeholder="Choose ...">
                        <option value="" selected disabled>Select...</option> 
                        @foreach($GraphicDesigns as $GraphicDesign)
                         <option value="{{ $GraphicDesign->id }}" @if($item->graphic_designs_id == $GraphicDesign->id) selected @endif>{{ $GraphicDesign->name }}</option>
                         @endforeach
                     </select>
                 </div>

                  <div class="mb-3">
                     <label class="form-label">Description</label>
                     <div>
                        <textarea name="description"  class="form-control editor" rows="5">{{ $item->description }}</textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
         <div class="col-lg-3">
            <div class="card">
               <div class="card-header bg-primary text-light">
                     Image
               </div>
               <div class="card-body text-center">
                     <div class="mb-2">
                        <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="{{ $item->getFirstMediaUrl('graphic-design') }}" data-holder-rendered="true" style="display: {{ is_have_image($item->getFirstMediaUrl('graphic-design')) }};">
                     </div>
                     <div class="mb-0">
                        <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                     </div> 
               </div>
            </div>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" {{ check_uncheck($item->is_visible,1) }}>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0" {{ check_uncheck($item->is_visible,0) }}>
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div>

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
