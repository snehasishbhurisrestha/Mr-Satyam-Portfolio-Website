@extends('layouts.app')

@section('title','Project Video Production')

@section('content')


    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Project Video Production</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Project Video Production</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                    <a href="{{ route('video-production.create') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
                                <th class="text-wrap">Sl No.</th>
                                <th class="text-wrap">Project Video Production Title</th>
                                <th class="text-wrap">Parent</th>
                                <th class="text-wrap">Project Video Production Link</th>
                                <th class="text-wrap">Created At</th>
                                <th class="text-wrap">Visibility</th>
                                <th class="text-wrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-wrap"><a href="{{ route('video-production.edit',$item->id) }}">{{ $item->name }}</a></td>
                                <td class="text-wrap"><a href="{{ route('video-production.edit',$item->id) }}">{{ $item->parent?->name }}</a></td>
                                <td class="text-wrap">
                                    @if(!empty($item->video_link))
                                        {{$item->video_link }}
                                    @else
                                    <img src="{{ $item->getFirstMediaUrl('project-video-production') }}" alt="" width="50px">
                                    @endif
                                </td>
                                <td class="text-wrap">{{ format_datetime($item->created_at) }}</td>
                                <td><?= check_visibility($item->is_visible);?> </td>
                                <td>
                                    <a href="{{ route('video-production.edit',$item->id) }}" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>

                                    <form action="{{ route('video-production.destroy', $item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
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