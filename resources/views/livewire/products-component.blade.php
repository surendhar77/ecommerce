<div> {{-- Single root element --}}
    <div class="container mt-4">
        <h1>All Products</h1>

        {{-- Dot Spinner Loader --}}
        {{-- Livewire Dot Spinner Loader --}}
        <div wire:loading class="text-center my-5">
            <div class="dot-spinner">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <p class="mt-2">Loading products...</p>
        </div>

        {{-- Products List --}}
        <div wire:loading.remove class="row">
            @php $usdToInr = 83; @endphp

            @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    {{-- Image --}}
                    @if(isset($product['images']) && count($product['images']) > 0)
                    <img src="{{ $product['images'][0] }}" class="card-img-top img-fluid" style="object-fit: cover; max-height: 300px;">
                    @else
                    <img src="https://via.placeholder.com/300x300.png?text=No+Image" class="card-img-top img-fluid" style="object-fit: cover; max-height: 300px;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product['title'] }}</h5>

                        <p class="card-text">
                            <span class="short-desc">
                                {{ \Illuminate\Support\Str::limit($product['description'], 100) }}
                                @if(strlen($product['description']) > 100)
                                <a href="javascript:void(0);" class="read-more-link">Read More</a>
                                @endif
                            </span>

                            <span class="full-desc d-none">
                                {{ $product['description'] }}
                                <a href="javascript:void(0);" class="read-less-link">Read Less</a>
                            </span>
                        </p>

                        <p class="card-text">Price: ₹{{ number_format($product['price'] * $usdToInr, 2) }}</p>
                        <p class="card-text">Category: {{ $product['category'] ?? 'N/A' }}</p>
                        <p class="card-text">Brand: {{ $product['brand'] ?? 'N/A' }}</p>
                        <p class="card-text">Stock: {{ $product['stock'] ?? 'N/A' }}</p>
                        <p class="card-text">Rating: {{ $product['rating'] ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    {{-- Read More JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => { // ensure elements are rendered
                document.querySelectorAll('.read-more-link').forEach(link => {
                    link.addEventListener('click', function() {
                        const cardBody = this.closest('.card-body');
                        cardBody.querySelector('.short-desc').classList.add('d-none');
                        cardBody.querySelector('.full-desc').classList.remove('d-none');
                    });
                });

                document.querySelectorAll('.read-less-link').forEach(link => {
                    link.addEventListener('click', function() {
                        const cardBody = this.closest('.card-body');
                        cardBody.querySelector('.full-desc').classList.add('d-none');
                        cardBody.querySelector('.short-desc').classList.remove('d-none');
                    });
                });
            }, 500);
        });
    </script>
</div>