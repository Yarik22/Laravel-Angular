<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    public function index(Request $request)
{
    $status = $request->query('status');
    $name = $request->query('name');
    $sortOrder = $request->query('sort', 'asc');

    $query = Product::query();

    if ($status) {
        $query->where('status', $status);
    }

    if ($name) {
        $query->where('name', 'like', '%' . $name . '%');
    }

    $query->orderBy('price', $sortOrder);

    $products = $query->get();

    return view('products.index', compact('products', 'status', 'name', 'sortOrder'));
}

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'status' => 'required|in:in stock,out of stock,running out',
        ]);

        Product::create($request->only(['name', 'price', 'description', 'category', 'status']));

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'status' => 'required|in:in stock,out of stock,running out',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'price', 'description', 'category', 'status']));

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
