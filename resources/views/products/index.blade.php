@extends('../HOC/layout')

@section('title', 'Our Products')

@section('header')
    Explore Our Products
@endsection

@section('content')
    <p>Here is a list of our latest products. Check their availability and details below:</p>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align: left; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #333; color: white;">
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Description</th>
                <th style="padding: 10px;">Category</th>
                <th style="padding: 10px;">Status</th>
                <th style="padding: 10px;">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $id => $product)
                <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ccc;">
                    <td style="padding: 10px;">{{ $product['name'] }}</td>
                    <td style="padding: 10px;">${{ $product['price'] }}</td>
                    <td style="padding: 10px;">{{ $product['description'] }}</td>
                    <td style="padding: 10px;">{{ $product['category'] }}</td>
                    <td style="padding: 10px;">
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
                    </td>
                    <td style="padding: 10px;">
                        <a href="{{ url('/products/' . $id) }}">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
