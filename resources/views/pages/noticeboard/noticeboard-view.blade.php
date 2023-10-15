@extends('layouts.app')
@section('title','Category List')

@section('style-css')

@endsection

@section('content')

    @foreach($notice as $row)

    {{--    This section for Category list--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <br>
                        <h2>{{$row->strToUpper('title')}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Notice Date: {{$row->notice->date}} to Publish Date: {{$row->publish_date}}</h5>

                                <blockquote class="blockquote mb-0">
                                    <p>{!! $row->message !!} </p>
                                    <footer class="blockquote-footer">{{$row->created_by}} </footer>
                                </blockquote>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

@endsection

@section('script')

@endsection
