@extends('layouts.app')

@section('title','Category')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Category</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <a href="{{ route('category.index') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form class="custom-validation outer-repeater" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Add New Category
                    </div>
                    <div class="card-body row">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Name</label>
                                <div>
                                    <input data-parsley-type="text" type="text" class="form-control" required  name="name">
                                </div>
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label class="form-label">Slug</label>
                                <div>
                                    <input data-parsley-type="text" type="text" class="form-control" required  name="slug">
                                </div>
                            </div> --}}
                            <div class="col-md-12 mb-3">
                                <label for="parent_id" class="form-label">Parent Category</label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option selected disabled value="">Choose...</option>
                                    @foreach($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}" @if(old('parent_id') == $child->id) selected @endif>
                                                &nbsp;&nbsp;&nbsp;-- {{ $child->name }}
                                            </option>
                                            @foreach ($child->children as $childs)
                                                <option value="{{ $childs->id }}" @if(old('parent_id') == $childs->id) selected @endif>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- {{ $childs->name }}
                                                </option>
                                                @foreach ($childs->children as $subchilds)
                                                <option value="{{ $subchilds->id }}" @if(old('parent_id') == $subchilds->id) selected @endif>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- {{ $subchilds->name }}
                                                </option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid category.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Description</label>
                            <div>
                                <textarea class="editor" name="description"></textarea>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Category Image
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-0">
                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                        </div>
                        <div class="mb-0">
                            <input type="file" name="image" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
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