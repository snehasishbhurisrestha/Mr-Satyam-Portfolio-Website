@extends('layouts.app')

@section('title','Project Motion Graphics')

@section('content')


    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h6 class="page-title">Project Motion Graphics</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Project Motion Graphics</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="my-4 text-center">
                    <!-- Small modal -->
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModalScrollable">Parent Order</button>
                </div>

                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                    Parent Order (Drag and drop to maintain the order)</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-wrap">Sl No.</th>
                                            <th class="text-wrap">Title</th>
                                            <th class="text-wrap">Created At</th>
                                            <th class="text-wrap">Visibility</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable">
                                        @foreach($projects_parent as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-wrap">{{ $item->name }}</td>
                                            <td class="text-wrap">{{ format_datetime($item->created_at) }}</td>
                                            <td><?= check_visibility($item->is_visible);?> </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                    <a href="{{ route('project-motion-graphic.create') }}" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
                                <th class="text-wrap">Project Motion Graphics Title</th>
                                <th class="text-wrap">Parent</th>
                                <th class="text-wrap">Project Motion Graphics Link</th>
                                <th class="text-wrap">Created At</th>
                                <th class="text-wrap">Visibility</th>
                                <th class="text-wrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-wrap"><a href="{{ route('project-motion-graphic.edit',$item->id) }}">{{ $item->name }}</a></td>
                                <td class="text-wrap"><a href="{{ route('project-motion-graphic.edit',$item->id) }}">{{ $item->parent?->name }}</a></td>
                                <td class="text-wrap">
                                    @if(!empty($item->video_link))
                                        {{$item->video_link }}
                                    @else
                                    <img src="{{ $item->getFirstMediaUrl('project-motion-graphics') }}" alt="" width="50px">
                                    @endif
                                </td>
                                <td class="text-wrap">{{ format_datetime($item->created_at) }}</td>
                                <td><?= check_visibility($item->is_visible);?> </td>
                                <td>
                                    <a href="{{ route('project-motion-graphic.edit',$item->id) }}" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>

                                    <form action="{{ route('project-motion-graphic.destroy', $item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
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

@section('script')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script>
    $(function () {
        $("#sortable").sortable({
            placeholder: "ui-state-highlight"
        });

        // Save Order Button Click
        $(".modal-footer .btn-primary").on("click", function () {
            let order = [];
            $("#sortable tr").each(function (index, element) {
                order.push({
                    id: $(element).data("id"),      // <-- add id from HTML
                    position: index + 1
                });
            });

            // Send AJAX request to Laravel
            $.ajax({
                url: "{{ route('project-motion-graphic.update-order') }}", // Update this route name
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    order: order
                },
                success: function (response) {
                    showToast('success', 'Success', 'Order saved successfully!');
                    location.reload();
                },
                error: function () {
                    showToast('error', 'Error', 'Something went wrong.');
                }
            });
        });
    });
</script>

@endsection