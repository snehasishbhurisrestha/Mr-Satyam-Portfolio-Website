@extends('layouts.app')

@section('title','Blog')

@section('content')

   <div class="page-title-box">
      <div class="row align-items-center">
         <div class="col-md-8">
            <h6 class="page-title">Blog</h6>
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
               <li class="breadcrumb-item active" aria-current="page">Add new Blog</li>
            </ol>
         </div>
         <div class="col-md-4">
            <div class="float-end d-none d-md-block">
               <div class="dropdown">
                  <a href="{{ route('blog.index') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end page title -->

   <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
               <div class="card-header bg-primary text-light">
                  Add New Blog
               </div>
               <div class="card-body">
                  <div class="mb-3">
                     <label class="form-label">Blog Title</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control" required
                           placeholder="Enter blog title" name="title" id="name">
                     </div>
                  </div>
                           
                  <div class="mb-3">
                     <label class="form-label">Blog Description</label>
                     <div>
                        <textarea name="description" class="form-control editor" rows="5"></textarea>
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
                        <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
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
                        <label class="form-label">Publish Date</label>
                        <div>
                           <input data-parsley-type="date" type="date"
                              class="form-control" name="publish_date" required>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
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
