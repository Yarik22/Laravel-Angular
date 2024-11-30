@extends('../HOC/layout')

@section('title', 'Edit Product')

@section('header', 'Edit Product')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" style="max-width: 600px; margin: auto;">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px;">Product Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; margin-bottom: 5px;">Price($)</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
            <textarea name="description" id="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; resize: vertical; max-height: 200px; overflow-y: auto; word-wrap: break-word;">{{ old('description', $product->description) }}</textarea>        </div>
        <div style="margin-bottom: 15px;">
            <label for="category" style="display: block; margin-bottom: 5px;">Category</label>
            <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="status" style="display: block; margin-bottom: 5px;">Status</label>
            <select name="status" id="status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                <option value="in stock" {{ $product->status == 'in stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out of stock" {{ $product->status == 'out of stock' ? 'selected' : '' }}>Out of Stock</option>
                <option value="running out" {{ $product->status == 'running out' ? 'selected' : '' }}>Running Out</option>
            </select>
        </div>
        <button type="submit" style="background-color: #333; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Update Product</button>
    </form>
@endsection
