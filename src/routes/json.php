<?php

use Giuszeppe\AwesomeLaravelCart\Http\Controllers\JsonCartController;
use Illuminate\Support\Facades\Route;


Route::controller(JsonCartController::class)->group(function () {
    Route::get('items',  'index');
    Route::get('addToCart/{slug}',  'addToCart');
    Route::get('removeFromCart/{slug}',  'removeFromCart');
    Route::get('increaseQuantity/{slug}', 'increaseQuantity');
    Route::get('decreaseQuantity/{slug}', 'decreaseQuantity');
});
