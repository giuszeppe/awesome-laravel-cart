<?php

return [
    "item" => "Giuszeppe\AwesomeLaravelCart\Tests\TestModels\Product",
    "table" => "carts",
    "pivot_table" => "cart_items",
    "item_table" => "products",
    "cart_view" => "awesome-cart::cart.index",

    'prefix' => 'cart',
    'middleware' => 'web'
];
