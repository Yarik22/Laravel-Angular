@extends('../HOC/layout')

@section('title', $product['name'])

@section('header')
    {{ $product['name'] }}
@endsection

@section('content')
    <p><strong>Price:</strong> ${{ $product['price'] }}</p>
    <p><strong>Description:</strong> {{ $product['description'] }}</p>
    <p><strong>Category:</strong> {{ $product['category'] }}</p>
    <p><strong>Status:</strong>
        @if(isset($product['status']))
            @if($product['status'] == 'in stock')
                <span style="color: green; font-weight: bold;">In Stock</span>
            @elseif($product['status'] == 'running out')
                <span style="color: orange; font-weight: bold;">Running Out</span>
            @elseif($product['status'] == 'out of stock')
                <span style="color: red; font-weight: bold;">Out of Stock</span>
            @else
                <span style="color: gray; font-weight: bold;">Unknown</span>
            @endif
        @else
            <span style="color: gray; font-weight: bold;">Status Not Available</span>
        @endif
    </p>
    <a href="{{ url('/products') }}">Back to Products</a>
@endsection
