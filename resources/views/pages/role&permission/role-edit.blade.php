@extends('layouts.app')
@section('title','Role Edit')

@section('style-css')

@endsection

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <br>
                <h2>Role Create</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="POST" action="{{route('roles.update', $role->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputname">Role Name</label>
                        <input type="text" class="form-control" id="exampleInputname" value="{{$role->name}}" name="name" placeholder="Enter Role Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Permissions</label>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkPermissionAll">All</label>
                        </div>
                        <hr>
                        @php $i = 1; @endphp
                        @foreach ($permission_groups as $group)
                            <div class="row">
                                @php
                                    $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                    $j = 1;
                                @endphp

                                <div class="col-md-4 form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                    </div>
                                </div>

                                <div class="col-md-8 form-group role-{{ $i }}-management-checkbox">

                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                        @php  $j++; @endphp
                                    @endforeach
                                    <br>
                                </div>

                            </div>
                        <hr>
                            @php  $i++; @endphp
                        @endforeach
                    </div>


                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>

            </div>
        </div>
    </div>




@endsection


@section('script')
    @include('pages.role&permission.script')
@endsection
