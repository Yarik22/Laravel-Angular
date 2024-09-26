@extends('../HOC/layout')

@section('title', 'Product Details')

@section('header', 'Product Details')

@section('content')
    <h2>{{ $product->name }}</h2>
    <p><strong>Price:</strong> {{ $product->price }}$</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Category:</strong> {{ $product->category }}</p>
    <p><strong>Status:</strong> {{ $product->status }}</p>
    <a href="{{ route('products.index') }}" style="font-weight: bold;">Back to Products</a>
@endsection
