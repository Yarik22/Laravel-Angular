<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Wireless Mouse',
                'price' => 25.99,
                'description' => 'A high-quality wireless mouse for seamless navigation.',
                'category' => 'Electronics',
                'status' => 'in stock',
            ],
            [
                'name' => 'Bluetooth Headphones',
                'price' => 79.99,
                'description' => 'Noise-cancelling Bluetooth headphones with great sound quality.',
                'category' => 'Electronics',
                'status' => 'in stock',
            ],
            [
                'name' => 'Gaming Keyboard',
                'price' => 49.99,
                'description' => 'Mechanical gaming keyboard with customizable RGB lighting.',
                'category' => 'Electronics',
                'status' => 'in stock',
            ],
            [
                'name' => '4K Monitor',
                'price' => 299.99,
                'description' => '27-inch 4K monitor with vivid colors and high refresh rate.',
                'category' => 'Electronics',
                'status' => 'running out',
            ],
            [
                'name' => 'Wireless Charger',
                'price' => 19.99,
                'description' => 'Fast wireless charger compatible with most smartphones.',
                'category' => 'Accessories',
                'status' => 'in stock',
            ],
            [
                'name' => 'Smartwatch',
                'price' => 199.99,
                'description' => 'Stylish smartwatch with health tracking features.',
                'category' => 'Wearables',
                'status' => 'out of stock',
            ],
            [
                'name' => 'Portable SSD',
                'price' => 89.99,
                'description' => '1TB portable SSD for quick file storage and transfer.',
                'category' => 'Storage',
                'status' => 'in stock',
            ],
            [
                'name' => 'USB-C Hub',
                'price' => 29.99,
                'description' => 'Multi-port USB-C hub for connecting various devices.',
                'category' => 'Accessories',
                'status' => 'in stock',
            ],
            [
                'name' => 'Webcam',
                'price' => 59.99,
                'description' => '1080p HD webcam for video conferencing and streaming.',
                'category' => 'Electronics',
                'status' => 'running out',
            ],
            [
                'name' => 'Laptop Stand',
                'price' => 39.99,
                'description' => 'Ergonomic laptop stand to improve posture and reduce strain.',
                'category' => 'Accessories',
                'status' => 'in stock',
            ],
        ]; 
        DB::table('products')->insert($products);
    }
}