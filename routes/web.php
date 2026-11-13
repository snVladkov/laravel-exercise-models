<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

Route::get('/', function () {
    $categories = \App\Models\Category::withCount('products')->get()->map(function ($category) {
        return [
            'name' => $category->name,
            'count' => $category->products_count . ' Items',
        ];
    });

    return view('home', ['categories' => $categories]);
})->name('home');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts/submit-form', [ContactController::class, 'submit_form'])->name('contacts.submit');
Route::get('/products', [ProductController::class, 'index'])->name('products');

// нямаме homepage/dashboard за админ панела, затова пренасочваме към списъка с продукти
Route::get('/admin', function () {
    return redirect()->route('admin.products.index');
})->name('admin.dashboard');
// група с CRUD маршрути
Route::prefix('admin')->name('admin.')->group(function () {
    // за продукти
    Route::resource('products', AdminProductController::class)->except(['show']);
    // за категории
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
});