@extends('layouts.app')

@section('content')
    <h2>{{ $product->name }}</h2>
    <img src="{{ $product->image }}" alt="{{ $product->name }}">
    <p>{{ $product->description }}</p>
    <p>${{ $product->price }}</p>
    <button>Add to Cart</button>
@endsection
