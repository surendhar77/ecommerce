<!DOCTYPE html>
<html>

<head>
    <title>Laravel eCommerce</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles


</head>

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

    @include('layouts.header')


    <main class="container py-4">
        @yield('content')
    </main>

    @include('layouts.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Loader JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Loader JS -->
    <script>
        const loader = document.getElementById('global-loader');
        const percentageText = document.querySelector('.percentage-text');
        let percent = 0;
        let interval;

        function startLoaderInterval() {
            percent = 0;
            percentageText.textContent = "0%";
            interval = setInterval(() => {
                if (percent < 99) {
                    percent++;
                    percentageText.textContent = percent + "%";
                }
            }, 20);
        }

        function showLoader() {
            loader.style.display = 'flex';
            startLoaderInterval();
        }

        function hideLoader() {
            clearInterval(interval);
            percent = 100;
            percentageText.textContent = "100%";
            setTimeout(() => {
                loader.style.display = 'none';
            }, 300);
        }

        // Hide loader after initial load
        window.addEventListener('load', hideLoader);

        // Show loader only on button clicks (not links)
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('button, input[type="submit"]').forEach(button => {
                button.addEventListener('click', function() {
                    showLoader();
                });
            });
        });

        // Livewire hooks
        document.addEventListener("livewire:load", () => {
            Livewire.hook('message.sent', () => {
                showLoader();
            });
            Livewire.hook('message.processed', () => {
                hideLoader();
            });
        });
    </script>


    @yield('scripts')
    @livewireScripts
</body>

</html>