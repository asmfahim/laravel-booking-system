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
                <h2>Sub Category Create</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="form-wrapper newForm">
                    <form action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName4">Select Category Name</label>
                                <select id="exampleInputName4" class="form-control " name="category_id" >
                                    <option value="">Select Sub Category</option>
                                    @foreach($categories as $row)
                                        <option value="{{$row->id}}" {{($row->id == $subcategories->category_id) ? "selected" : " " }}>{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputName1">Sub Category Name</label>
                                <input class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputName1" name="subcategory_name" type="text" value="{{$subcategories->subcategory_name}}" required>
                            </div>
                        </div>

                        <br>
                        <input  class="btn btn-success btn-ok" type="submit" name="submit" value="Update SubCategory">
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('script')


@endsection
