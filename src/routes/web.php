<?php

use Giuszeppe\AwesomeLaravelCart\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CartController::class, 'index'])->name('cart.index');
