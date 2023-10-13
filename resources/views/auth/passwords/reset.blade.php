@extends('layouts.app-login')

@section('content')

<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">

            @error('email')
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            @error('password')
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <p style="font-family:SansaSoft,Calibri,sans-serif;font-weight: 300;font-size: 30px;">Nilai Booking System</p>

            <form action="{{ route('password.update') }}" method="post">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="exampleInputName1" name="email" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" type="password" placeholder="Password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input class="form-control" id="exampleInputPassword2" name="password_confirmation" type="password" placeholder="Confirm Password" required autocomplete="new-password">
                </div>

                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>


            </form>
        </section>
    </div>

</div>

@endsection
