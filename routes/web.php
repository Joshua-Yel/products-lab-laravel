<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::all();
    return view('products', compact('products'));
});

Route::get('/available', function () {
    $products = Product::where('is_available', true)->orderBy('price', 'asc')->get();
    return view('available', compact('products'));
});

Route::get('/category/{category}', function ($category) {
    $products = Product::where('category', $category)->get();
    return view('category', compact('products', 'category'));
});