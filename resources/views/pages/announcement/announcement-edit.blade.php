@extends('layouts.app')
@section('title','Announcement Create')

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
                    <form action="{{route('announcement.update',$announcement->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class=" form-group">
                                <label for="exampleInputName1">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="exampleInputName1" name="title" type="text" value="{{$announcement->title}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName2">Notice Date</label>
                                <input class="form-control @error('notice_date') is-invalid @enderror" id="exampleInputName2" name="notice_date" type="date" value="{{$announcement->notice_date}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName1">Publish Date</label>
                                <input class="form-control @error('publish_date') is-invalid @enderror" id="exampleInputName1" name="publish_date" type="date" value="{{$announcement->publish_date}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group">
                                <label>Message To</label>
                                <div class="form-check">
                                    @foreach($roles as $role)
                                        <input type="checkbox" class="form-check-input" id="checkPermission{{$role->id}}" name="message_to[]" value="{{$role->id}}" {{($role->id === $announcement->message_to)  ? 'checked' : ''}} >
                                        <label class="form-check-label" for="checkPermission{{$role->id}}">{{$role->name}} </label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" form-group">
                                <label for="exampleInputName3">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" style="visibility: hidden; display: none;" id="editor1" name="message" rows="6" cols="80" required></textarea>
                            </div>
                        </div>
                        <br>
                        <input  class="btn btn-success btn-ok" type="submit" name="submit" value="Update">
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('script')

    <script src="{{asset("public/vendors/editor/ckeditor/ckeditor.js")}}"></script>
    <script src="{{asset("public/vendors/editor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js")}}"></script>
    <script src="{{asset("public/vendors/editor/editor.js")}}"></script>
@endsection
