@extends('layouts.app')
@section('title','Permission Create')

@section('style-css')

@endsection

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <br>
                <h2>Permission Create</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form method="POST" action="{{route('permission.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="Inputname">Permission Group Name</label>
                        <input type="text" class="form-control" id="myInput"   name="group_name">
                    </div>
                    <div class="form-group">
                        <label for="name">Check Permissions</label>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkPermission1" name="checkPermissions[]" value="">
                            <label class="form-check-label" for="checkPermission1"></label><br>
                            <input type="checkbox" class="form-check-input" id="checkPermission2" name="checkPermissions[]" value="">
                            <label class="form-check-label" for="checkPermission2"></label><br>
                            <input type="checkbox" class="form-check-input" id="checkPermission3" name="checkPermissions[]" value="">
                            <label class="form-check-label" for="checkPermission3"></label><br>
                            <input type="checkbox" class="form-check-input" id="checkPermission4" name="checkPermissions[]" value="">
                            <label class="form-check-label" for="checkPermission4"></label><br>
                        </div>
                        <p id="demo"></p>
                    </div>


                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        // This is for permission create

        document.querySelector('label[for="checkPermission1"]').textContent = "VIEW";
        document.querySelector('label[for="checkPermission2"]').textContent = "CREATE";
        document.querySelector('label[for="checkPermission3"]').textContent = "EDIT";
        document.querySelector('label[for="checkPermission4"]').textContent = "DELETE";

        document.getElementById("myInput").addEventListener("input", function(){

            let val= document.getElementById('myInput').value.toLowerCase();


            if(val.length >= 3){
                //    This is view
                document.getElementById('checkPermission1').value = val+ '.' +'view';
                document.querySelector('label[for="checkPermission1"]').textContent = val.toUpperCase() + " . " +"VIEW";
                // This is Create
                document.getElementById('checkPermission2').value = val+'.'+'create';
                document.querySelector('label[for="checkPermission2"]').textContent =val.toUpperCase() + " . " +"CREATE";

                // This is Edit
                document.getElementById('checkPermission3').value = val+'.'+'edit';
                document.querySelector('label[for="checkPermission3"]').textContent =val.toUpperCase() + " . " +"EDIT";
                // This is Delete
                document.getElementById('checkPermission4').value = val+'.'+'delete';
                document.querySelector('label[for="checkPermission4"]').textContent =val.toUpperCase() + " . " +"DELETE";

            }else{
                document.getElementById('checkPermission1').value = null;
                document.getElementById('checkPermission2').value = null;
                document.getElementById('checkPermission2').value = null;
                document.getElementById('checkPermission2').value = null;
                document.querySelector('label[for="checkPermission1"]').textContent = "VIEW";
                document.querySelector('label[for="checkPermission2"]').textContent = "CREATE";
                document.querySelector('label[for="checkPermission3"]').textContent = "EDIT";
                document.querySelector('label[for="checkPermission4"]').textContent = "DELETE";
            }

        });
    </script>
@endsection
