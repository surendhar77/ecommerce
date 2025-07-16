<!DOCTYPE html>
<html>
<head>
    <title>Laravel eCommerce</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Laravel eCommerce</h1>
        <nav>
            <a href="{{ route('home') }}">Home</a>

            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @else
                <span>Welcome, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endguest
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Laravel eCommerce. All rights reserved.</p>
    </footer>
</body>
</html>
