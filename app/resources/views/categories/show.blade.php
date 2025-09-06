@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ ucfirst($category) }} Products</h2>

    <div class="row">
        @forelse($remainingProducts as $product)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card h-100">
                {{-- Image --}}
                @if(isset($product['images']) && count($product['images']) > 0)
                <img src="{{ $product['images'][0] }}" class="card-img-top img-fluid" style="object-fit: cover; max-height: 250px;">
                @else
                <img src="https://via.placeholder.com/300x300.png?text=No+Image" class="card-img-top img-fluid" style="object-fit: cover; max-height: 250px;">
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
                    {{-- View Button --}}
                    <div class="mt-2">
                        <a href="{{ route('products.show', $product['id']) }}" class="btn btn-sm btn-primary w-100">
                            View
                        </a>
                    </div>

                </div>
            </div>
        </div>
        @empty
        <p>No products found for this category.</p>
        @endforelse
    </div>
</div>
@endsection