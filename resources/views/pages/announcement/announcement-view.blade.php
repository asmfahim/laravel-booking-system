@extends('layouts.app')
@section('title','User List')

@section('style-css')

@endsection

@section('content')

    {{--    This section for user list--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <br>
                        <h2>User List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Title</th>
                                <th>Notice Date</th>
                                <th>Publish Date</th>
                                <th>Message To</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($announcement as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->notice_date}}</td>
                                    <td>{{$row->publish_date}}</td>
                                    <td>{{$row['role']['name']}}</td>
                                    <td>{{$row->created_by}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center list-inline">
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.edit'))--}}
                                            <li class="mr-2 h5 list-unstyled list-inline-item"><a href="{{route('announcement.edit',$row->id)}}" class="text-secondary badge badge-secondary"><span class="badge badge-secondary">Edit</span></a></li>
                                            {{--                                                @endif--}}
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.delete'))--}}
                                            <li class="h5 list-unstyled list-inline-item">
                                                <a href="{{route('announcement.destroy',$row->id)}}" class=" badge  badge-danger" onclick="show_confirm('delete-form-{{$row->id}}')">
                                                    <span class="badge badge-danger">Delete</span>
                                                </a>

                                                <form id="delete-form-{{ $row->id }}" action="{{ route('announcement.destroy', $row->id) }}" method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </li>
                                            {{--                                                @endif--}}

                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        function show_confirm(id){
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    document.getElementById(id).submit();
                }
            });
        }
    </script>
@endsection
