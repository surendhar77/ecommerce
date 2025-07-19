<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Laravel eCommerce</h1>
        <nav>
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
