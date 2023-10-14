@extends('layouts.app')
@section('title','Category List')

@section('style-css')

@endsection

@section('content')

    {{--This section for Category edit--}}
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Category Create</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                    <form action="{{route('category.update',$categories->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName1">Category Name</label>
                                <input class="form-control @error('category_name') is-invalid @enderror" id="exampleInputName1" name="category_name" type="text" value="{{$categories->category_name}}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="category_image">Image</label>
                                <input class="form-control @error('category_image') is-invalid @enderror" id="category_image" name="category_image" type="file" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">

                            </div>
                            <div class="col-md-6 form-group">
                                <img src="{{asset('public/upload/category/'. $categories->category_image)}}" id="showImage" height="100" width="100" style="border-radius: 5px;" alt="">
                            </div>
                        </div>

                        <br>
                        <input  class="btn btn-success btn-ok" type="submit" name="submit" value="Update Category">
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('#category_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
