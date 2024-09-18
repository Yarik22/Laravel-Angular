<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    private $products = [
        1 => [
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'This is the first product description.',
            'category' => 'Category 1',
            'status' => 'in stock',
        ],
        2 => [
            'name' => 'Product 2',
            'price' => 200,
            'description' => 'This is the second product description.',
            'category' => 'Category 2',
            'status' => 'running out',
        ],
        3 => [
            'name' => 'Product 3',
            'price' => 300,
            'description' => 'This is the third product description.',
            'category' => 'Category 3',
            'status' => 'running out',
        ],
        4 => [
            'name' => 'Product 4',
            'price' => 400,
            'description' => 'This is the fourth product description.',
            'category' => 'Category 4',
            'status' => 'out of stock',
        ],
    ];

    public function index()
    {
        return view('products.index', ['products' => $this->products]);
    }

    public function show($id)
    {
        if (array_key_exists($id, $this->products)) {
            $product = $this->products[$id];
            return view('products.show', ['product' => $product]);
        } else {
            return abort(404, 'Product not found');
        }
    }
}
