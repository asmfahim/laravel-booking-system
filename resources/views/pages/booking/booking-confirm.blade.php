@extends('layouts.app')
@section('title','Booking Confirm')

@section('style-css')
    <style>
        #pdf{
            float:right;
        }
    </style>
@endsection

@php
$usr = Auth::user();
@endphp

@section('content')

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <br>
                        <h2>Accepted Bookings List</h2>
                        <a id="pdf" href="{{route('booking.pdf')}}" class="btn btn-success">Export Pdf</a>
                        <div class="clearfix"></div>
                        <i><span style="color:red;">If you do not see you booking request in this list within 48 hours of booking request, <br> please contact administration. You booking request may have been rejected.</span></i>
                    </div>
                    <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>NO</th>
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
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row['category']['category_name']}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->start}}</td>
                                    <td>{{$row->end}}</td>
                                    <td>
                                        {{$row->status === 1 ? 'Confirmed' : 'Pending'}}
                                    </td>
                                    <td>{{$row['user']['email']}}</td>
                                    @if ($usr->can('bookings.view') || $usr->can('bookings.delete') || $usr->can('bookings.create') )
                                        <td>
                                            <ul class="d-flex justify-content-center list-inline">
                                                @if($usr->can('bookings.create'))

                                                <li class="mr-2 h5 list-unstyled list-inline-item"><a href="{{route('booking.confirm',$row->id)}}" class="text-secondary badge badge-secondary"><span class="badge badge-secondary">Confirm</span></a></li>
                                                @endif
                                                @if ( $usr->can('bookings.delete'))
                                                <li class="h5 list-unstyled list-inline-item">
                                                    <a href="{{route('booking.destroy',$row->id)}}" class=" badge  badge-danger" onclick="show_confirm('delete-form-{{$row->id}}')">
                                                        <span class="badge badge-danger">Delete</span>
                                                    </a>

                                                    <form id="delete-form-{{ $row->id }}" action="{{ route('booking.destroy', $row->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </li>
                                                @endif

                                            </ul>
                                        </td>
                                    @endif
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
