@extends('layouts.app')

@section('title','CGI Projects')

@section('content')

   <div class="page-title-box">
      <div class="row align-items-center">
         <div class="col-md-8">
            <h6 class="page-title">CGI Projects</h6>
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('project-cgi.index') }}">CGI Projects</a></li>
               <li class="breadcrumb-item active" aria-current="page">Edit CGI Projects</li>
            </ol>
         </div>
         <div class="col-md-4">
            <div class="float-end d-none d-md-block">
               <div class="dropdown">
                  <a href="{{ route('project-cgi.index') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end page title -->

   <form action="{{ route('project-cgi.update',$project->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
         <div class="col-lg-9">
            <div class="card">
               <div class="card-header bg-primary text-light">
                  Edit CGI Projects
               </div>
               <div class="card-body">
                  <div class="mb-3 text-center">
                     <div class="form-check form-check-inline">
                        <input type="radio" id="parent_child1" name="parent_child" class="form-check-input" value="1" @if($project->parent_id == NULL) checked @endif>
                        <label class="form-check-label" for="parent_child1">Edit Parent</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" id="parent_child2" name="parent_child" class="form-check-input" value="0" @if($project->parent_id != NULL) checked @endif>
                        <label class="form-check-label" for="parent_child2">Edit Child</label>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Project Title</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control" required
                           placeholder="Enter Project title" name="name" value="{{ $project->name }}" id="name">
                     </div>
                  </div>
                  <div class="mb-3" id="parent-design" style="display: block;">
                     <label class="form-label">Parent Design</label>
                     <select class="select2 form-control" name="parent_id" data-placeholder="Choose ...">
                        <option value="" selected disabled>Select...</option> 
                        @foreach($projectcgis as $projectcgis)
                         <option value="{{ $projectcgis->id }}" @if($project->parent_id == $projectcgis->id) selected @endif>{{ $projectcgis->name }}</option>
                         @endforeach
                     </select>
                 </div>

                  <div class="mb-3" id="video-link" style="display: block;">
                     <label class="form-label">Project Video Link</label>
                     <div>
                        <input data-parsley-type="text" type="text"
                           class="form-control"
                           placeholder="Enter Video link" name="video_link" value="{{ $project->video_link }}">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
         <div class="col-lg-3">
            <div class="card" id="parent-image" style="display: none;">
               <div class="card-header bg-primary text-light">
                     Image
               </div>
               <div class="card-body text-center">
                     <div class="mb-2">
                        <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="{{ $project->getFirstMediaUrl('project-cgi') }}" data-holder-rendered="true" style="display: {{ is_have_image($project->getFirstMediaUrl('project-cgi')) }};">
                     </div>
                     <div class="mb-0">
                        <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                     </div> 
               </div>
            </div>
            <div class="card" id="details-page-image" style="display: none;">
               <div class="card-header bg-primary text-light">
                  Details Page Image
               </div>
               <div class="card-body text-center">
                     <div class="mb-2">
                        <img class="img-thumbnail rounded me-2" id="blah2" alt="" width="200" src="{{ $project->getFirstMediaUrl('project-cgi-details') }}" data-holder-rendered="true" style="display: {{ is_have_image($project->getFirstMediaUrl('project-cgi-details')) }};">
                     </div>
                     <div class="mb-0">
                        <input type="file" name="file2" class="filestyle" id="imgInp2" data-input="false" data-buttonname="btn-secondary">
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
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" {{ check_uncheck($project->is_visible,1) }}>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0" {{ check_uncheck($project->is_visible,0) }}>
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

@section('script')
<script>
    $(document).ready(function() {
    function toggleOptions() {
        if ($('#parent_child1').is(':checked')) {
            $('#parent-design').hide();
            $('#video-link').hide();
            $('#parent-image').show();
            $('#details-page-image').show();
        } else {
            $('#parent-design').show();
            $('#video-link').show();
            $('#parent-image').hide();
            $('#details-page-image').hide();
        }
    }

    // Run on page load
    toggleOptions();

    // Run on radio button change
    $('input[name="parent_child"]').change(function() {
        toggleOptions();
    });
});


</script>
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
