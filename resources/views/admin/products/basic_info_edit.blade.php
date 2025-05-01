@extends('layouts.app')

@section('title','Products')

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
    <form action="{{ route('products.add-basic-edit-info') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{ $product->id}}" name="product_id">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    @include('admin.products.nav-tabs-edit')

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="basicinfo" role="tabpanel">
                            <div class="card-body row">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Name</label>
                                        <div>
                                            <input data-parsley-type="text" type="text" class="form-control" required placeholder="Enter Product Title" name="product_name" value="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Sort Description</label>
                                    <div>
                                        <textarea class="editor" name="sort_description">{{ $product->sort_description }}</textarea>
                                    </div>    
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Long Description</label>
                                    <div>
                                        <textarea class="editor" name="long_description">{{ $product->login_description }}</textarea>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <div class="d-flex flex-wrap">
                        <span class="me-2">Category</span>
                        {{-- <a class="fw-bold fs-9 text-white" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                            <i class="fas fa-plus-circle"></i>
                        </a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="category-tree" style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                        @if (!empty($categorys))
                            @foreach ($categorys as $category)
                                <!-- Only display top-level categories -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category{{ $category->id }}" {{ isset($selectedCategories) && in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="category{{ $category->id }}"> {{ $category->name }} </label>
                                </div>
                                @include('admin.products.subcategory', [
                                    'subcategories' => $category->children,
                                    'parent_id' => $category->id,
                                    'margin' => 20,
                                    'selectedCategories' => isset($selectedCategories) ? $selectedCategories : [],
                                ])
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Publish
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Special Product</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="is_special1" name="is_special" class="form-check-input" value="1" {{ check_uncheck($product->is_special,1) }}>
                            <label class="form-check-label" for="is_special1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="is_special2" name="is_special" class="form-check-input" value="0" {{ check_uncheck($product->is_special,1) }}>
                            <label class="form-check-label" for="is_special2">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" {{ check_uncheck($product->is_visible,1) }}>
                            <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0" {{ check_uncheck($product->is_visible,0) }}>
                            <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#service_type').on('change', function (){
                if($(this).val() == 'surveyRequired'){
                    $('#service-survey-required').show();
                    $('#service-survey-required').find('select').attr('required', true);
                }else{
                    $('#service-survey-required').hide();
                    $('#service-survey-required').find('select').removeAttr('required');
                }
            });
        });
    </script>
@endsection