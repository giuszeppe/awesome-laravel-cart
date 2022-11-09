<?php


namespace Giuszeppe\AwesomeLaravelCart\Http\Controllers;

use Giuszeppe\AwesomeLaravelCart\Models\CartItem;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $items = [];
        $totalPrice = 0;
        if (Auth::check()) {
            $items = auth()->user()->cart->products;
            $totalPrice = auth()->user()->cart->totalPrice();
        }
        return view(config('cart.cart_view'), ["items" => $items, "totalPrice" => $totalPrice]);
    }
}
