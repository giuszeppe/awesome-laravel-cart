<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests\TestModels;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;
use Giuszeppe\AwesomeLaravelCart\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends CartItem
{
    use HasFactory;



    protected static function newFactory()
    {
        return \Giuszeppe\AwesomeLaravelCart\Tests\TestModels\ProductFactory::new();
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'products');
    }
}
