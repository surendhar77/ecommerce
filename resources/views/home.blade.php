@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to Laravel eCommerce</h1>
        <p>This is your home page content.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
    </div>
@endsection
