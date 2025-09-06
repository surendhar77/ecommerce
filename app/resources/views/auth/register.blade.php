@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background: url('{{ asset("images/login/banner1.avif") }}') no-repeat center center fixed;
        background-size: cover;
    }

    main.container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        padding: 30px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<main class="container">
    <div class="register-card">
        <h3 class="text-center mb-4">Create Account</h3>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name" value="{{ old('name') }}"
                       placeholder="Enter your full name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email" value="{{ old('email') }}"
                       placeholder="Enter your email">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password" placeholder="Enter your password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control"
                       id="password_confirmation"
                       placeholder="Confirm your password">
            </div>

            {{-- Register Button --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </form>

        <p class="text-center mt-3 mb-0">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</main>
@endsection
