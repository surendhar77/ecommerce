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

                        <div class="row">
                            <div class="col-6">
                                <p class="card-text mb-2"><strong>Brand:</strong> {{ $product['brand'] ?? 'N/A' }}</p>
                            </div>
                            <div class="col-6">
                                <p class="card-text mb-2"><strong>Category:</strong> {{ $product['category'] ?? 'N/A' }}</p>
                            </div>

                            <div class="col-6">
                                <p class="card-text mb-2"><strong>Stock:</strong> {{ $product['stock'] ?? 'N/A' }}</p>
                            </div>
                            <div class="col-6">
                                <p class="card-text mb-2"><strong>Price:</strong> ₹{{ number_format($product['price'] * $usdToInr, 2) }}</p>
                            </div>

                            <div class="col-12">
                                @php
                                $ratingValue = $product['rating'] ?? 0;
                                $percentage = ($ratingValue / 5) * 100; // calculate width percentage
                                @endphp

                                <p class="card-text mb-0">
                                    <strong>Rating:</strong>
                                    <span class="star-rating">
                                        <span class="star-rating-fill" style="width: {{ $percentage }}%;">★★★★★</span>
                                        <span class="star-rating-empty">★★★★★</span>
                                    </span>
                                    ({{ number_format($ratingValue, 2) }} / 5)
                                </p>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS CDN (which depends on Popper but not jQuery in v5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Read More JS --}}
    <script>
        $(document).ready(function() {
            // Read More Click
            $(document).on('click', '.read-more-link', function() {
                var cardBody = $(this).closest('.card-body');
                cardBody.find('.short-desc').addClass('d-none');
                cardBody.find('.full-desc').removeClass('d-none');
            });

            // Read Less Click
            $(document).on('click', '.read-less-link', function() {
                var cardBody = $(this).closest('.card-body');
                cardBody.find('.full-desc').addClass('d-none');
                cardBody.find('.short-desc').removeClass('d-none');
            });
        });
    </script>

</div>