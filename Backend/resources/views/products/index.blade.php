@extends('../HOC/layout')

@section('title', 'Products')

@section('header', 'Products List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
    @if (Auth::user()->role === "admin")
    <a href="{{ route('products.create') }}" class="add-product-button">Add Product</a>
    @endif
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('products.index') }}" method="GET" class="filter-form">
        <div class="form-field">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ request('name') }}" placeholder="Enter product name" />
        </div>

        <div class="form-field">
            <label for="status">Stock Status:</label>
            <select name="status" id="status" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="in stock" {{ request('status') == 'in stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out of stock" {{ request('status') == 'out of stock' ? 'selected' : '' }}>Out of Stock</option>
                <option value="running out" {{ request('status') == 'running out' ? 'selected' : '' }}>Running Out</option>
            </select>
        </div>

        <div class="form-field">
            <label for="status">Submit:</label>
            <button type="submit" class="submit-button">Filter</button>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>
                    <a class="price-header" href="{{ route('products.index', array_merge(request()->query(), ['sort' => request('sort') == 'asc' ? 'desc' : 'asc'])) }}">
                        Price
                        <span class="sort-icon {{ request('sort') == 'asc' ? 'asc' : 'desc' }}"></span>
                    </a>
                </th>
                <th>Description</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="product-row">
                    <td data-label="Name">{{ $product->name }}</td>
                    <td data-label="Price">{{ $product->price }}$</td>
                    <td data-label="Description">{{ $product->description }}</td>
                    <td data-label="Category">{{ $product->category }}</td>
                    <td data-label="Status">{{ $product->status }}</td>
                    <td data-label="Actions">
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        @if (Auth::user()->role === "admin" || Auth::user()->role === "moderator")
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @endif
                        @if (Auth::user()->role === "admin")
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this product? This action cannot be undone.');
        }
    </script>
@endsection
