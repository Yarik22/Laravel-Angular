@extends('../HOC/layout')

@section('title', 'Products')

@section('header', 'Products List')

@section('content')
    <a href="{{ route('products.create') }}" style="font-weight: bold;">Add Product</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Price</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Description</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Category</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Status</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->price }}$</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->description }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->category }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->status }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this product? This action cannot be undone.');
        }
    </script>
@endsection
