<?php


namespace Giuszeppe\AwesomeLaravelCart\Http\Controllers;

use Giuszeppe\AwesomeLaravelCart\Models\CartItem;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cart = auth()->user()->cart;
            $items = $cart->products;
        }
        return view(config('cart.cart_view'), ["items" => $items ?? []]);
    }
}
