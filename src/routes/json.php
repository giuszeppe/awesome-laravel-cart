<?php

use Giuszeppe\AwesomeLaravelCart\Http\Controllers\JsonCartController;
use Illuminate\Support\Facades\Route;


Route::controller(JsonCartController::class)->group(function () {
    Route::get('items',  'index');
    Route::post('addToCart/{item}',  'addToCart');
    Route::post('removeFromCart/{item}',  'removeFromCart');
});
