<?php

namespace Giuszeppe\AwesomeLaravelCart\Traits;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;

trait HasCart
{
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
