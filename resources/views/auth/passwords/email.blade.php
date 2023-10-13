@extends('layouts.app-login')

@section('content')

<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">

            @if(session('status'))
            <div class="alert alert-success">
                <strong>{{session('status') }}</strong>
            </div>
            @endif
            @error('email')
                <div class="alert alert-danger">
                    <strong>{{ $message  }}</strong>
                </div>
            @enderror

            <p style="font-family:SansaSoft,Calibri,sans-serif;font-weight: 300;font-size: 30px;">Nilai Booking System</p>
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="exampleInputName1" name="email" type="email" placeholder="Enter email address" required
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <button class="btn btn-primary btn-block" type="submit" >Send Password Reset Link</button>


            </form>
        </section>
    </div>


</div>
@endsection
