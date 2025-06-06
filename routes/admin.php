<?php

use App\Livewire\Admin\OrderDetails;
use App\Livewire\Admin\Orders;
use App\Livewire\Admin\Products;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('/products', Products::class)->name('products');
  Route::get('/orders', Orders::class)->name('orders.index');
  Route::get('/orders/{order}', OrderDetails::class)->name('orders.show');
});
