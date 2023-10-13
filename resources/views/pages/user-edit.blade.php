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
                <h2>User Edit</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                    <form action="{{route('user.update',$user->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName1">First Name</label>
                                <input class="form-control @error('fname') is-invalid @enderror" id="exampleInputName1" name="fname" type="text" value="{{$user->fname}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName2">Last Name</label>
                                <input class="form-control @error('lname') is-invalid @enderror" id="exampleInputName2" name="lname" type="text" value="{{$user->lname}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName3">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="exampleInputName3" name="email" type="email" value="{{$user->email}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName4">Role assign</label>
                                <select id="exampleInputName4" class="form-control " name="role" >
                                    <option value="">Select a Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}" {{$user->hasRole($role->name) ? "selected" : ""}}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h2>If need password change</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" type="password" placeholder="Password"  autocomplete="new-password">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input class="form-control" id="exampleInputPassword2" name="password_confirmation" type="password" placeholder="Confirm Password"  autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <input  class="btn btn-success btn-ok" type="submit" name="submit" value="Update User">
                    </form>
                </div>

            </div>
        </div>
    </div>




@endsection
