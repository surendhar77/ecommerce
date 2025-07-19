<x-guest-layout>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevents scrolling */
        }

        .login-bg {
        
            background: url('{{ asset('images/login/banner1.avif') }}') no-repeat center center;
            background-size: cover;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* Prevents scrollbars if content overflows slightly */
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }
    </style>

    <div class="login-bg">
        <div class="login-card shadow">
            <h2 class="text-center mb-4">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <!-- Submit & Forgot Password -->
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
    </div>
</x-guest-layout>
