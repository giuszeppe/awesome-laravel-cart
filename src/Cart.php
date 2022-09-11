<?php

namespace Giuszeppe\Cart;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsToMany(CartItem::class, config('cart.pivot_table'), config('cart.item_table') . "_id", config("cart.table") . "_id");
    }
}
