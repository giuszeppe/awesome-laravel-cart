<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests\TestModels;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;
use Giuszeppe\AwesomeLaravelCart\Models\CartItem;
use Giuszeppe\AwesomeLaravelCart\Traits\Shoppable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends CartItem
{
    use HasFactory, Shoppable;

    protected $table = 'products';



    protected static function newFactory()
    {
        return \Giuszeppe\AwesomeLaravelCart\Tests\TestModels\ProductFactory::new();
    }
}
