@extends('layouts.app')

@section('title','Category')

@section('content')

<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Category</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <div class="dropdown">
                    <a href="{{ route('category.create') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                        <i class="fas fa-plus me-2"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th class="text-wrap">SL No</th>
                            <th class="text-wrap">Name</th>
                            <th class="text-wrap">Slug</th>
                            <th class="text-wrap">Parent Category</th>
                            <th class="text-wrap">Description</th>
                            <th class="text-wrap">Image</th>
                            <th class="text-wrap">Visibility</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorys as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>   
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->parent_category_name }}</td>
                            <td>{!! $category->description !!}</td>
                            <td><img src="{{ $category->getFirstMediaUrl('category') }}" alt="" width="60px"></td>
                            <td>{!! check_visibility($category->is_visible) !!}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}" alt="edit"><i class="ti-check-box"></i></a>
                                {{-- <a class="btn btn-danger" onclick="return confirm('Are You Sure?')" href="{{ route('service.delete',$service->id) }}"><i class="ti-trash"></i></a> --}}
                                <form action="{{ route('category.destroy', $category->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="ti-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection