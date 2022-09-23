<?php


namespace Giuszeppe\AwesomeLaravelCart\Http\Controllers;

use Giuszeppe\AwesomeLaravelCart\Models\CartItem;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view(config('cart.cart_view'), ["items" => auth()->user()->cart->products]);
    }
}
