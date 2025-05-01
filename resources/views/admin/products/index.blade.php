@extends('layouts.app')

@section('title','Products')

@section('content')

    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Product</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <a href="{{ route('products.basic-info-create') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
                                <th class="text-wrap">Description</th>
                                <th class="text-wrap">Categories</th>
                                <th class="text-wrap">Image</th>
                                <th class="text-wrap">Price</th>
                                <th class="text-wrap">Visibility</th>
                                <th class="text-wrap">Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proucts as $prouct)
                            <tr>
                                <td class="text-wrap">{{ $loop->iteration }}</td>   
                                <td class="text-wrap">{{ $prouct->name }}</td>
                                <td class="text-wrap">{!! $prouct->sort_description !!}</td>
                                <td class="text-wrap"> @foreach($prouct->categories as $cata) {{ $cata->name.' / ' }} @endforeach</td>
                                <td><img class="img-thumbnail rounded me-2" src="{{ getProductMainImage($prouct->id) }}" width="100" alt=""></td>
                                <td class="text-wrap">₹ {{ $prouct->total_price }}</td>
                                <td class="text-wrap">{!! check_visibility($prouct->is_visible) !!}</td>
                                <td class="text-wrap">{!! format_datetime($prouct->created_at) !!}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('products.basic-info-edit',$prouct->id) }}" alt="edit"><i class="ti-check-box"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Are You Sure?')" href="{{ route('products.delete',$prouct->id) }}"><i class="ti-trash"></i></a>
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