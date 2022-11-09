<?php

namespace Giuszeppe\AwesomeLaravelCart\Traits;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;

trait Shoppable
{
    public function carts()
    {
        return $this->belongsToMany(Cart::class, config('cart.pivot_table'),  config('cart.item_table') . '_id', config('cart.table') . '_id')->withPivot('qta');
    }
}
