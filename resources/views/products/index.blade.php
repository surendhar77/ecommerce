@extends('layouts.app')

@section('content')
    <h2>Products</h2>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($products as $product)
            <div class="border p-2">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>${{ $product->price }}</p>
                <a href="{{ route('product.show', $product->id) }}">View</a>
            </div>
        @endforeach
    </div>
@endsection
