@extends('layouts.app-login')

@section('content')

<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">

            @error('password')
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <p style="font-family:SansaSoft,Calibri,sans-serif;font-weight: 300;font-size: 30px;">Please confirm your password before continuing.</p>

            <form action="{{ route('password.confirm') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" type="password" placeholder="Current password" required autocomplete="current-password">
                </div>

                <button class="btn btn-primary btn-block" type="submit">Login</button>
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
