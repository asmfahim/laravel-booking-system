@extends('layouts.app')
@section('title','Category List')

@section('style-css')

@endsection

@section('content')

    {{--This section for Category creat--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sub Category Create</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                    <form action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName4">Select Category Name</label>
                                <select id="exampleInputName4" class="form-control " name="category_id" >
                                    <option value="">Select Sub Category</option>
                                    @foreach($categories as $role)
                                        <option value="{{$role->id}}">{{$role->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName1">Sub Category Name</label>
                                <input class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputName1" name="subcategory_name" type="text" placeholder="Enter Sub category name" required>
                            </div>
                        </div>

                        <br>
                        <input  class="btn btn-success btn-ok" type="submit" name="submit" value="Add SubCategory">
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{--    This section for Category list--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <br>
                        <h2>Sub Category List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subcategories as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row['category']['category_name']}}</td>
                                    <td>{{$row->subcategory_name}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center list-inline">
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.edit'))--}}
                                            <li class="mr-2 h5 list-unstyled list-inline-item"><a href="{{route('subcategory.edit',$row->id)}}" class="text-secondary badge badge-secondary"><span class="badge badge-secondary">Edit</span></a></li>
                                            {{--                                                @endif--}}
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.delete'))--}}
                                            <li class="h5 list-unstyled list-inline-item">
                                                <a href="{{route('subcategory.destroy',$row->id)}}" class=" badge  badge-danger" onclick="show_confirm('delete-form-{{$row->id}}')">
                                                    <span class="badge badge-danger">Delete</span>
                                                </a>

                                                <form id="delete-form-{{ $row->id }}" action="{{ route('subcategory.destroy', $row->id) }}" method="POST" style="display: none;">
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
