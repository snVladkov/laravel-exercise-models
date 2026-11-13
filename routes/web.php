<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    $categories = [
        ['name' => 'Laptops & PCs', 'count' => '42 Items', 'icon' => '💻'],
        ['name' => 'Smartphones', 'count' => '28 Items', 'icon' => '📱'],
        ['name' => 'Audio & Headphones', 'count' => '35 Items', 'icon' => '🎧'],
        ['name' => 'Gaming Gear', 'count' => '19 Items', 'icon' => '🎮']
    ];

    return view('home', ['categories' => $categories]);
})->name('home');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts/submit-form', [ContactController::class, 'submit_form'])->name('contacts.submit');
Route::get('/products', [ProductController::class, 'index'])->name('products');