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
            <form action="{{ url('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="exampleInputName1" name="email" type="email" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" type="password" placeholder="Password" required>
                </div>

                <button class="btn btn-primary btn-block" type="submit">Login</button>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

            </form>
        </section>
    </div>
</div>

@endsection
