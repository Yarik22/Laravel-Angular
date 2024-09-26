<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
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

        DB::table('products')->insert($request->only(['name', 'price', 'description', 'category', 'status']));

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
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

        DB::table('products')->where('id', $id)->update($request->only(['name', 'price', 'description', 'category', 'status']));

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
