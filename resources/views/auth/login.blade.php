@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background: url('{{ asset('images/login/banner1.avif') }}') no-repeat center center fixed;
        background-size: cover;
    }

    main.container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        max-width: 400px;
        width: 100%;
        padding: 20px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<main class="container">
    <div class="login-card">
        <h2 class="text-center mb-4">Login</h2>

     <form method="POST" action="{{ route('login.store') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus autocomplete="username" class="form-control">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" autocomplete="current-password" class="form-control">
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
        <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        @if (Route::has('password.request'))
            <a class="text-decoration-none" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <button type="submit" class="btn btn-primary">
            {{ __('Log in') }}
        </button>
    </div>
</form>

    </div>
</main>
@endsection