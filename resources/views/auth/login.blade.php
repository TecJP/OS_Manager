@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 mt-5 text-center">
            <img src="{{ asset('img/logotopotransp2.png') }}" alt="Logo">
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row mt-4">
                <label for="email" class="col-md-12 col-form-label">E-Mail</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-12 col-form-label">Password</label>

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-4">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection