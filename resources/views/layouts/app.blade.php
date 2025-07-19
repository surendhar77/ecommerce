<!DOCTYPE html>
<html>

<head>
    <title>Laravel eCommerce</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- App CSS -->
    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body>

    <body>
        <!-- Dot Circle Loader with Percentage -->
        <div id="global-loader">
            <div class="dot-circle-loader-container">
                <div class="dot-circle">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
                <div class="percentage-text mt-2">0%</div>
                <p class="loading-text">Loading...</p>
            </div>
        </div>


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

        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Hide global loader after page load -->
        <script>
            window.addEventListener('load', function() {
                const loader = document.getElementById('global-loader');
                if (loader) {
                    loader.style.display = 'none';
                }
            });
        </script>
        <script>
            const loader = document.getElementById('global-loader');
            const percentageText = document.querySelector('.percentage-text');

            let percent = 0;

            const interval = setInterval(() => {
                if (percent < 99) {
                    percent++;
                    percentageText.textContent = percent + "%";
                }
            }, 20);

            window.addEventListener('load', () => {
                clearInterval(interval);
                percent = 100;
                percentageText.textContent = "100%";

                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            });
        </script>



        @yield('scripts')
        @livewireScripts
    </body>

</html>