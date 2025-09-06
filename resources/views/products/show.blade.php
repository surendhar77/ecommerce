@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            @if(isset($product['images']) && count($product['images']) > 0)
                <img src="{{ $product['images'][0] }}" class="img-fluid" alt="{{ $product['title'] }}">
            @else
                <img src="https://via.placeholder.com/500x500.png?text=No+Image" class="img-fluid">
            @endif
                                @foreach($product['images'] as $img)
                        <img src="{{ $img }}" alt="Image" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                    @endforeach

        </div>

                
        <div class="col-md-6">
            <div class="card-body">
                    <h3 class="card-title">{{ $product['title'] }}</h3>
                    <p class="text-muted">{{ $product['description'] }}</p>

                    <p><strong>Category:</strong> {{ ucfirst($product['category']) }}</p>
                    <p><strong>Brand:</strong> {{ $product['brand'] }}</p>
                    <p><strong>SKU:</strong> {{ $product['sku'] }}</p>

                    <h4 class="text-success">
                        ₹{{ number_format($product['price'] * $usdToInr, 2) }}
                        <small class="text-muted"> ({{ $product['discountPercentage'] }}% off)</small>
                    </h4>

                    <!-- Rating -->
                    @php
                        $percentage = ($product['rating'] / 5) * 100;
                    @endphp
                    <p>
                        <span class="star-rating">
                            <span class="star-rating-fill" style="width: {{ $percentage }}%;">★★★★★</span>
                            <span class="star-rating-empty">★★★★★</span>
                        </span>
                        ({{ number_format($product['rating'], 1) }})
                    </p>

                    <p><strong>Stock:</strong> {{ $product['stock'] }}</p>
                    <p><strong>Weight:</strong> {{ $product['weight'] }} g</p>
                    <p><strong>Dimensions:</strong> 
                        {{ $product['dimensions']['width'] }} x 
                        {{ $product['dimensions']['height'] }} x 
                        {{ $product['dimensions']['depth'] }}
                    </p>

                    <p><strong>Warranty:</strong> {{ $product['warrantyInformation'] }}</p>
                    <p><strong>Shipping:</strong> {{ $product['shippingInformation'] }}</p>
                    <p><strong>Availability:</strong> {{ $product['availabilityStatus'] }}</p>
                    <p><strong>Return Policy:</strong> {{ $product['returnPolicy'] }}</p>
                    <p><strong>Minimum Order Quantity:</strong> {{ $product['minimumOrderQuantity'] }}</p>

                    <p><strong>Tags:</strong> 
                        @foreach($product['tags'] as $tag)
                            <span class="badge bg-secondary">{{ $tag }}</span>
                        @endforeach
                    </p>

                    <p><strong>Barcode:</strong> {{ $product['meta']['barcode'] }}</p>
                    <p><strong>QR Code:</strong></p>
                    <img src="{{ $product['meta']['qrCode'] }}" alt="QR Code" class="img-fluid" style="width:120px;">

                </div>
        </div>
    </div>
        <!-- Reviews -->
    <div class="card mt-4">
        <div class="card-header"><strong>Customer Reviews</strong></div>
        <div class="card-body">
            @if(!empty($product['reviews']))
                @foreach($product['reviews'] as $review)
                    <div class="border-bottom pb-2 mb-2">
                        <p>
                            <strong>{{ $review['reviewerName'] }}</strong> 
                            ({{ $review['reviewerEmail'] }}) 
                            - Rated {{ $review['rating'] }}/5
                        </p>
                        <p>{{ $review['comment'] }}</p>
                        <small class="text-muted">Reviewed on {{ \Carbon\Carbon::parse($review['date'])->format('d M Y') }}</small>
                    </div>
                @endforeach
            @else
                <p>No reviews yet.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">← Back to Products</a>
</div>
@endsection
