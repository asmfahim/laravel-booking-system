@extends('layouts.app')
@section('title','User List')

@section('style-css')

@endsection

@section('content')

{{--This section for user creat--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Create</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName1">First Name</label>
                                <input class="form-control @error('fname') is-invalid @enderror" id="exampleInputName1" name="fname" type="text" placeholder="Enter your first name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName2">Last Name</label>
                                <input class="form-control @error('lname') is-invalid @enderror" id="exampleInputName2" name="lname" type="text" placeholder="Enter your last name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName3">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="exampleInputName3" name="email" type="email" placeholder="Enter email address" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName4">Role assign</label>
                                <select id="exampleInputName4" class="form-control " name="role" >
                                    <option value="">Select a Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" type="password" placeholder="Password" required autocomplete="new-password">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input class="form-control" id="exampleInputPassword2" name="password_confirmation" type="password" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                        </div>
                            <br>
                        <input  class="btn btn-success btn-ok" type="submit" name="submit" value="Add User">
                    </form>
                </div>

            </div>
        </div>
    </div>

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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($user as $row)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$row->fname}}</td>
                                        <td>{{$row->lname}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>
                                            @foreach($row->roles as $role)
                                                {{$role->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            <ul class="d-flex justify-content-center list-inline">
{{--                                                @if (Auth::guard('admin')->user()->can('admin.edit'))--}}
                                                    <li class="mr-2 h5 list-unstyled list-inline-item"><a href="{{route('user.edit',$row->id)}}" class="text-secondary badge badge-secondary"><span class="badge badge-secondary">Edit</span></a></li>
{{--                                                @endif--}}
{{--                                                @if (Auth::guard('admin')->user()->can('admin.delete'))--}}
                                                    <li class="h5 list-unstyled list-inline-item">
                                                        <a href="{{route('user.destroy',$row->id)}}" class=" badge  badge-danger" onclick="show_confirm('delete-form-{{$row->id}}')">
                                                            <span class="badge badge-danger">Delete</span>
                                                        </a>

                                                        <form id="delete-form-{{ $row->id }}" action="{{ route('user.destroy', $row->id) }}" method="POST" style="display: none;">
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
