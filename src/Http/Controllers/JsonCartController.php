<?php


namespace Giuszeppe\AwesomeLaravelCart\Http\Controllers;

use Giuszeppe\AwesomeLaravelCart\Facades\Item;
use Giuszeppe\AwesomeLaravelCart\Models\CartItem;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JsonCartController extends Controller
{
    public function index()
    {
        return response()->json(["items" => auth()->user()->cart->products]);
    }
    public function addToCart(Request $request, Item $item)
    {
        auth()->user()->cart()->attach($item->id);
        return response()->json();
    }
    public function removeFromCart(Request $request, Item $item)
    {
        auth()->user()->cart()->detach($item->id);
        return response()->json();
    }
}
