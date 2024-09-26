@extends('./HOC/layout')

@section('title', 'Welcome')

@section('header', 'Welcome to the Product Management App')

@section('content')
    <p>Welcome to the Product Management Application! Use the navigation menu to view products.</p>
    <p><a href="{{ route('products.index') }}" style="font-weight: bold;">View Products</a></p>
@endsection
