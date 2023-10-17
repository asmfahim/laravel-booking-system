@extends('layouts.app')
@section('title','User List')

@section('style-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endsection

@section('content')

    {{--This section for user creat--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Booking</h2>
                <p>First select a date</p>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                    <form action="{{route('booking.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="exampleInputName4">Select Booking</label>
                                <select id="exampleInputName4" class="form-control " name="category_id" >
                                    <option value="" selected="">Select category </option>
                                    @foreach($categories as $row)
                                        <option value="{{$row->id}}">{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="exampleInputName7">Select Sub Booking</label>
                                <select id="exampleInputName7" class="form-control " name="subcategory_id" >
                                    <option value="" selected="">Select sub category</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="exampleInputName3">Title</label>
                                <input class="form-control " id="exampleInputName3" name="title" type="text" placeholder="Enter booking title" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="exampleInputName9">Start</label>
                                <input class="form-control " id="exampleInputName9" name="start" type="datetime-local" placeholder="Enter booking title" required>
                            </div>
                            <div class="col-md-4 form-group">

                            </div>
                            <div class="col-md-4 form-group">
                                <label for="exampleInputName8">End</label>
                                <input class="form-control " id="exampleInputName8" name="end" type="datetime-local" placeholder="Enter booking title" required>
                            </div>
                        </div>

                        <br>
                        <input  class="btn btn-success btn-ok" type="submit"  name="submit"  value="Submit">
                    </form>
                </div>

            </div>
        </div>
    </div>


    {{--This section for user creat--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Booking</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                  <div id="calendar"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
{{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--        Launch demo modal--}}
{{--    </button>--}}

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                let category_id = $(this).val();
                console.log(category_id);
                if(category_id){

                        $.ajax({
                            url:"{{url('booking/ajax')}}/"+category_id,
                            type:"GET",
                            dataType: "json",
                            success:function(data){

                                if(data.length == 0){
                                    let d = $('select[name="subcategory_id"]').empty();
                                    let e = $('select[name="subcategory_id"]').append('<option value="" selected="">Select Not Found</option>');
                                }
                                else{
                                    let d = $('select[name="subcategory_id"]').empty();
                                    let e = $('select[name="subcategory_id"]').append('<option value="" selected="">Sub Category</option>');
                                }

                                $.each(data,function(key,value){
                                        console.log(value.id);
                                    $('select[name="subcategory_id"]').append(
                                        '<option value="'+value.id +'">'+value.subcategory_name + '</option>'
                                    );
                                });
                            },
                        })
                    }
                    else{
                        let d = $('select[name="subcategory_id"]').empty();
                        let e = $('select[name="subcategory_id"]').append('<option value="" selected="">Select Sub Category</option>');


                    }
                });
            });
        </script>

        <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>


        <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({

                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events:'{{url("/booking/data")}}',
                selectable:false,
                selectHelper: false,
                select:function(start, end, allDay)
                {

                        end = new Date(start);
                        end.setHours(end.getHours() + 1);

                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay,

                            },

                            true // make the event "stick"
                        );

                },
                eventColor: 'red',
                eventClick:function(event)
                {
                    if(confirm("Are you sure you want to remove it?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"{{url("/booking/delete")}}",
                            type:"POST",
                            data:{
                                id:id,
                                type:"delete"
                            },
                            success:function(response)
                            {
                                calendar.fullCalendar('refetchEvents');

                            }
                        })
                    }
                }
            });

        });


    </script>


@endsection
