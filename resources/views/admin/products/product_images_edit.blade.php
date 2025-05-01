@extends('layouts.app')

@section('title','Products')

@section('css-style')
<link rel="stylesheet" href="{{ asset('assets/admin-assets/libs/file-uploader/css/jquery.dm-uploader.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/admin-assets/libs/file-uploader/css/styles.css') }}"/>
@endsection

@section('content')

    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Product</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <a href="{{ route('product.index') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    @include('admin.products.nav-tabs-edit')
                    <input type="hidden" name="id" value="{{ request()->segment(3) }}">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="pricedetails" role="tabpanel">
                            <div class="dm-uploader-container">
                                <div id="drag-and-drop-zone" class="dm-uploader text-center">
                                    <p class="dm-upload-icon">
                                        <i class="icon-upload"></i>
                                    </p>
                                    <p class="dm-upload-text">Drop files here or click to upload.&nbsp;<span style="text-decoration: underline">Browse</span></p>
                            
                                    <a class='btn btn-md dm-btn-select-files'>
                                        <input type="file" name="file" size="40" multiple="multiple">
                                    </a>
                            
                                    <ul class="dm-uploaded-files" id="files-image">
                                        <?php if (!empty($product_images)):
                                            foreach ($product_images as $image):?>
                                                <li class="media" id="uploaderFile<?php echo $image->getCustomProperty('file_id'); ?>">
                                                    <img src="{{ $image->getUrl() }}" alt="">
                                                    <a href="javascript:void(0)" class="btn-img-delete btn-delete-product-img text-center" data-file-id="{{ $image->getCustomProperty('file_id') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    @if ($image->getCustomProperty('is_main'))
                                                        <a href="javascript:void(0)" class="float-start btn btn-success mt-1 btn-sm waves-effect btn-set-image-main" style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;">Main</a>
                                                    @else
                                                        <a href="javascript:void(0)" class="float-start btn btn-secondary btn-sm mt-1 waves-effect btn-set-image-main" style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;" data-file-id="{{ $image->getCustomProperty('file_id') }}">Main</a>
                                                    @endif
                                                </li>
                                            <?php endforeach;
                                        endif; ?>
                                    </ul>
                            
                                    <div class="error-message-img-upload"></div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Publish
                </div>
                <div class="card-body">
                    <form action="{{ route('products.product-images-process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ request()->segment(3) }}">
                    <div class="mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Save & Next
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect">
                                Cancel
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script src="{{ asset('assets/admin-assets/libs/file-uploader/js/jquery.dm-uploader.min.js') }}"></script>
<script src="{{ asset('assets/admin-assets/libs/file-uploader/js/demo-ui.js') }}"></script>

<script type="text/html" id="files-template-image">
    <li class="media">
        <img class="preview-img" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="bg">
        <div class="media-body">
            <div class="progress">
                <div class="dm-progress-waiting">Waiting...</div>
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </li>
</script>
<script>
    $(document).ready(function() {
        /*
        * Image Uploader
        */
        $('#drag-and-drop-zone').dmUploader({
            url: "{{ route('products.product-gallery-save') }}",
            maxFileSize: 5242880, // 5MB
            maxFiles: 4, // Allow up to 4 files
            queue: true,
            allowedTypes: 'image/*',
            extFilter: ["jpg", "jpeg", "png", "gif", "webp"],
            extraData: function(id) {
                return {
                    "file_id": id,
                    "product_id": "{{ request()->segment(3) }}",
                    "_token": "{{ csrf_token() }}"
                };
            },
            onDragEnter: function() {
                this.addClass('active');
            },
            onDragLeave: function() {
                this.removeClass('active');
            },
            onNewFile: function(id, file) {
                ui_multi_add_file(id, file, "image");
                if (typeof FileReader !== "undefined") {
                    var reader = new FileReader();
                    var img = $('#uploaderFile' + id).find('img');

                    reader.onload = function(e) {
                        img.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            },
            onBeforeUpload: function(id) {
                $('#uploaderFile' + id + ' .dm-progress-waiting').hide();
                ui_multi_update_file_progress(id, 0, '', true);
                ui_multi_update_file_status(id, 'uploading', 'Uploading...');
            },
            onUploadProgress: function(id, percent) {
                ui_multi_update_file_progress(id, percent);
            },
            onUploadSuccess: function(id, response) {
                if (response.success) {
                    ui_multi_update_file_status(id, 'success', 'Upload Complete');
                    ui_multi_update_file_progress(id, 100, 'success', false);
                    // Fetch and update the product images
                    $.ajax({
                        type: "POST",
                        url: "{{ route('products.get-product-temp-images') }}",
                        data: {
                            "file_id": id,
                            "product_id": "{{ request()->segment(3) }}",
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            console.log(response.html);
                            document.getElementById("uploaderFile" + id).innerHTML = response.html;
                        }
                    });
                } else if (response.errors) {
                    // Show validation errors using Toastr
                    $.each(response.errors, function(key, value) {
                        toastr.error(value[0]); // Display the first error message
                    });
                    ui_multi_update_file_status(id, 'danger', 'Upload Failed');
                }
            },
            onUploadError: function(id, xhr, status, message) {
                console.log(message);
                $("#uploaderFile" + id).remove();
                toastr.error("An error occurred during the upload.");
            },
            onFileSizeError: function(file) {
                toastr.error("File Size too Big");
            },
            onFileTypeError: function(file) {
                toastr.error("Invalid File Type");
            },
            onFileExtError: function(file) {
                toastr.error("Invalid File Extension");
            },
        });
    });


    $(document).on("click", ".btn-delete-product-img", function() {
        var b = $(this).attr("data-file-id");

        if (confirm('Are you sure you want to delete this image?')) {
            var a = {
                "file_id": b,
                "product_id": "{{ request()->segment(3) }}",
                "_token": "{{ csrf_token() }}"
            };
            $.ajax({
                type: "POST",
                url: "{{ route('products.delete-product-images') }}",
                data: a,
                success: function() {
                    $("#uploaderFile" + b).remove();
                },
            });
        } else {
            console.log('Deletion cancelled');
        }
    });

    $(document).on("click", ".btn-set-image-main", function() {
        var b = $(this).attr("data-file-id");
        var a = {
            "file_id": b,
            "product_id": "{{ request()->segment(3) }}",
            "_token": "{{ csrf_token() }}"
        };
        $(".badge-is-image-main").removeClass("btn-primary");
        $(".badge-is-image-main").addClass("btn-secondary");
        $(this).removeClass("btn-secondary");
        $(this).addClass("btn-primary");
        $.ajax({
            type: "POST",
            url: "{{ route('products.set-main-product-image') }}",
            data: a,
            success: function(c) {
                document.getElementById("files-image").innerHTML = c.html;
            }
        });
    });
</script>
@endsection