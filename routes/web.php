<?php

use App\Livewire\Cart;
use App\Livewire\Catalog;
use App\Livewire\Checkout;
use App\Livewire\OrderSuccess;
use App\Livewire\ProductPage;
use App\Livewire\SearchProducts;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', Catalog::class)->name('catalog');
Route::get('/product/{product}', ProductPage::class)->name('product.show');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/order-success/{order}', OrderSuccess::class)->name('order.success');
Route::get('/search', SearchProducts::class)->name('search');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
