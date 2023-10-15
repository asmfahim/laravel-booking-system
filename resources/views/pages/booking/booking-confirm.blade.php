@extends('layouts.app')
@section('title','Booking Confirm')

@section('style-css')

@endsection

@section('content')

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <br>
                        <h2>Accepted Bookings List</h2>
                        <div class="clearfix"></div>
                        <i><span style="color:red;">If you do not see you booking request in this list within 48 hours of booking request, <br> please contact administration. You booking request may have been rejected.</span></i>
                    </div>
                    <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Booking Id</th>
                                <th>Booking</th>
                                <th>Title</th>
                                <th>Booking From</th>
                                <th>Booking Till</th>
                                <th>Status</th>
                                <th>Booking Requested By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($booking as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row['category']['category_name']}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->start}}</td>
                                    <td>{{$row->end}}</td>
                                    <td>
                                        {{$row->status === 1 ? 'Confirmed' : 'Pending'}}
                                    </td>
                                    <td>{{$row['user']['email']}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center list-inline">
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.edit'))--}}
                                            <li class="mr-2 h5 list-unstyled list-inline-item"><a href="{{route('booking.confirm',$row->id)}}" class="text-secondary badge badge-secondary"><span class="badge badge-secondary">Confirm</span></a></li>

                                            {{--                                                @endif--}}
                                            {{--                                                @if (Auth::guard('admin')->user()->can('admin.delete'))--}}
                                            <li class="h5 list-unstyled list-inline-item">
                                                <a href="{{route('booking.destroy',$row->id)}}" class=" badge  badge-danger" onclick="show_confirm('delete-form-{{$row->id}}')">
                                                    <span class="badge badge-danger">Delete</span>
                                                </a>

                                                <form id="delete-form-{{ $row->id }}" action="{{ route('booking.destroy', $row->id) }}" method="POST" style="display: none;">
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
    </div>
    </div>

@endsection

@section('script')

@endsection
