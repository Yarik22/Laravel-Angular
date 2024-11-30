@extends('../HOC/layout')

@section('title', 'Create Product')

@section('header', 'Create New Product')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" style="max-width: 600px; margin: auto;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px;">Product Name</label>
            <input type="text" name="name" id="name" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; margin-bottom: 5px;">Price($)</label>
            <input type="number" name="price" id="price" step="0.01" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
            <textarea name="description" id="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; resize: vertical; max-height: 200px; overflow-y: auto; word-wrap: break-word;">{{ old('description') }}</textarea>        <div style="margin-bottom: 15px;">
            <label for="category" style="display: block; margin-bottom: 5px;">Category</label>
            <input type="text" name="category" id="category" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="status" style="display: block; margin-bottom: 5px;">Status</label>
            <select name="status" id="status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                <option value="in stock">In Stock</option>
                <option value="out of stock">Out of Stock</option>
                <option value="running out">Running Out</option>
            </select>
        </div>
        <button type="submit" style="background-color: #333; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Create Product</button>
    </form>
@endsection
