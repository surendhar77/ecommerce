<div>
    <div class="container mt-4">
        <h1>All Products</h1>

        {{-- Loader --}}
        <div wire:loading class="text-center my-5">
            <div class="dot-spinner">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <p class="mt-2">Loading products...</p>
        </div>

        {{-- Product Categories --}}
        <div wire:loading.remove>
            @php
            $usdToInr = 83;
            // Group products by category
            $groupedProducts = collect($products)->groupBy('category');
            @endphp

            @foreach($groupedProducts as $categoryName => $categoryProducts)
            <div class="mb-5">
                {{-- Category Heading --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">{{ ucfirst($categoryName) ?? 'Uncategorized' }}</h3>
                    @if($categoryProducts->count() > 5)
                    <a href="{{ route('category.show', ['category' => $categoryName]) }}" class="btn btn-outline-primary btn-sm">
                        View All
                    </a>

                    @endif
                </div>

                {{-- Category Products Row --}}
                <div class="row">
                    @foreach($categoryProducts->take(5) as $product)
                    <div class="col-md-4 col-lg-2 mb-4">
                        <div class="card h-100">
                            {{-- Image --}}
                            @if(isset($product['images']) && count($product['images']) > 0)
                            <img src="{{ $product['images'][0] }}" class="card-img-top img-fluid" style="object-fit: cover; max-height: 200px;">
                            @else
                            <img src="https://via.placeholder.com/300x300.png?text=No+Image" class="card-img-top img-fluid" style="object-fit: cover; max-height: 200px;">
                            @endif

                            <div class="card-body p-2">
                                <h6 class="card-title">{{ $product['title'] }}</h6>

                                <p class="mb-1">
                                    ₹{{ number_format($product['price'] * $usdToInr, 2) }}
                                </p>

                                {{-- Rating --}}
                                @php
                                $ratingValue = $product['rating'] ?? 0;
                                $percentage = ($ratingValue / 5) * 100;
                                @endphp
                                <small>
                                    <span class="star-rating">
                                        <span class="star-rating-fill" style="width: {{ $percentage }}%;">★★★★★</span>
                                        <span class="star-rating-empty">★★★★★</span>
                                    </span>
                                    ({{ number_format($ratingValue, 1) }})
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>