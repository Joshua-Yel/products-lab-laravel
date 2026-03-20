<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with long battery life and smooth tracking.',
                'price' => 599.00,
                'stock' => 50,
                'category' => 'Electronics',
                'is_available' => true,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'Tactile mechanical keyboard with RGB backlight and durable switches.',
                'price' => 1899.00,
                'stock' => 30,
                'category' => 'Electronics',
                'is_available' => true,
            ],
            [
                'name' => 'USB-C Hub',
                'description' => 'Multi-port USB-C hub with HDMI, USB 3.0, and fast charging support.',
                'price' => 999.00,
                'stock' => 75,
                'category' => 'Accessories',
                'is_available' => true,
            ],
            [
                'name' => 'Laptop Stand',
                'description' => 'Adjustable aluminum laptop stand for improved posture and airflow.',
                'price' => 799.00,
                'stock' => 40,
                'category' => 'Accessories',
                'is_available' => true,
            ],
            [
                'name' => 'Webcam HD 1080p',
                'description' => 'Full HD webcam with built-in microphone for video calls and streaming.',
                'price' => 1299.00,
                'stock' => 0,
                'category' => 'Electronics',
                'is_available' => false,
            ],
            [
                'name' => 'Monitor Light Bar',
                'description' => 'LED monitor light bar with adjustable brightness and color temperature.',
                'price' => 1099.00,
                'stock' => 25,
                'category' => 'Accessories',
                'is_available' => true,
            ],
            [
                'name' => 'Noise Cancelling Headphones',
                'description' => 'Over-ear headphones with active noise cancellation and 30-hour battery.',
                'price' => 3499.00,
                'stock' => 15,
                'category' => 'Electronics',
                'is_available' => true,
            ],
            [
                'name' => 'Desk Organizer',
                'description' => 'Wooden desk organizer with multiple compartments for a clean workspace.',
                'price' => 449.00,
                'stock' => 60,
                'category' => 'Office Supplies',
                'is_available' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}