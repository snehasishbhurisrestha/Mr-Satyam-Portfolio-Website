@extends('layouts.app')

@section('title','Testimonial')

@section('content')


    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Testimonial</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Testimonials</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                    <a href="{{ route('testimonial.create') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                    <i class="fas fa-plus me-2"></i> Add New
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Rating</th>
                                <th>Image</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('testimonial.edit',$item->id) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->address }}</td>
                                <td class="text-wrap">{!! $item->description !!}</td>
                                <td>
                                    @for($i=0;$i<$item->rating;$i++)
                                        <i class="fas fa-star" style="color:#FF9529;"></i>
                                    @endfor
                                    @for($j=$i;$j<5;$j++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </td>
                                <td><img src="{{ $item->getFirstMediaUrl('testimonial-image') }}" width="50" /> </td>
                                <td><?= check_visibility($item->is_visible);?> </td>
                                <td>
                                    <a href="{{ route('testimonial.edit',$item->id) }}" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>

                                    <form action="{{ route('testimonial.destroy', $item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt" title="Remove"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection