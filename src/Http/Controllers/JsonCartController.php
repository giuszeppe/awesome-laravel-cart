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
    public function addToCart(Request $request, $slug)
    {
        $message = ["msg" => "added new product", 'code' => 0];
        $products = auth()->user()->cart->products;
        $product = $products->where('slug', $slug)->first();

        $item = Item::where('slug', $slug)->first();
        if ($products->contains($item)) {
            $product->pivot->qta += 1;
            $product->pivot->save();
            $message['msg'] = "incremented quantity";
            $message['code'] = 1;
        } else {
            auth()->user()->cart->products()->attach($item->id);
        }
        return response()->json($message);
    }
    public function removeFromCart(Request $request, $slug)
    {
        $item = Item::where('slug', $slug)->first();
        auth()->user()->cart->products()->detach($item->id);
        return response()->json();
    }
    public function increaseQuantity(Request $request, $slug)
    {
        $item = Item::where('slug', $slug)->first();
        $product = auth()->user()->cart->products->where('id', $item->id)->first();
        $product->pivot->qta += 1;
        $product->pivot->save();
        return response()->json();
    }
    public function decreaseQuantity(Request $request, $slug)
    {
        $item = Item::where('slug', $slug)->first();
        $product = auth()->user()->cart->products->where('id', $item->id)->first();
        $product->pivot->qta -= 1;
        $product->pivot->save();
        return response()->json();
    }
}
