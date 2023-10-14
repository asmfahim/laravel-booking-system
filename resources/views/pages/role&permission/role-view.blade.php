@extends('layouts.app')
@section('title','Role view')

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
                        <h2>Role List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Role Name</th>
                                <th>Permission Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>
                                         @foreach ($row->permissions as $permission )
                                            <span class="badge badge-pill badge-secondary ">
                                                {{ $permission->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <ul class="d-flex justify-content-center list-inline">
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.edit'))--}}
                                            <li class="mr-2 h5 list-unstyled list-inline-item"><a href="{{route('roles.edit',$row->id)}}" class="text-secondary badge badge-secondary"><span class="badge badge-secondary">Edit</span></a></li>
                                            {{--                                                @endif--}}
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.delete'))--}}
                                            <li class="h5 list-unstyled list-inline-item">
                                                <a href="{{route('roles.destroy',$row->id)}}" class=" badge  badge-danger" onclick="show_confirm('delete-form-{{$row->id}}')">
                                                    <span class="badge badge-danger">Delete</span>
                                                </a>

                                                <form id="delete-form-{{ $row->id }}" action="{{ route('roles.destroy', $row->id) }}" method="POST" style="display: none;">
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
