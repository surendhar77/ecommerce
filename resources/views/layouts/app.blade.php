<!DOCTYPE html>
<html>
<head>
    <title>Laravel eCommerce</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your app CSS (optional) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Laravel eCommerce</h1>
            <nav>
                <a href="{{ route('home') }}" class="btn btn-outline-light me-2">Home</a>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                @else
                    <span class="me-2">Welcome, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-light">Logout</button>
                    </form>
                @endguest
            </nav>
        </div>
    </header>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3">
        <p class="mb-0">&copy; {{ date('Y') }} Laravel eCommerce. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS CDN (optional for dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
