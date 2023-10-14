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
                <h2>Category Create</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName1">Category Name</label>
                                <input class="form-control @error('category_name') is-invalid @enderror" id="exampleInputName1" name="category_name" type="text" placeholder="Enter category name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName2">Image</label>
                                <input class="form-control @error('category_image') is-invalid @enderror" id="exampleInputName2" name="category_image" type="file" required>
                            </div>
                        </div>

                        <br>
                        <input  class="btn btn-success btn-ok" type="submit" name="submit" value="Add Category">
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
                        <h2>Category List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->category_name}}</td>
                                    <td>{{$row->category_slug}}</td>
                                    <td>
                                        <img src="{{asset('public/upload/category/'.$row->category_image)}}" alt="" style="width: 70px; height:60px; border-radius:5px;">
                                    </td>
                                    <td>
                                        <ul class="d-flex justify-content-center list-inline">
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.edit'))--}}
                                            <li class="mr-2 h5 list-unstyled list-inline-item"><a href="{{route('category.edit',$row->id)}}" class="text-secondary badge badge-secondary"><span class="badge badge-secondary">Edit</span></a></li>
                                            {{--                                                @endif--}}
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.delete'))--}}
                                            <li class="h5 list-unstyled list-inline-item">
                                                <a href="{{route('category.destroy',$row->id)}}" class=" badge  badge-danger" onclick="show_confirm('delete-form-{{$row->id}}')">
                                                    <span class="badge badge-danger">Delete</span>
                                                </a>

                                                <form id="delete-form-{{ $row->id }}" action="{{ route('category.destroy', $row->id) }}" method="POST" style="display: none;">
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
