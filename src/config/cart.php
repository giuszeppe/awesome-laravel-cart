<?php

return [
    "item" => "App\Models\Product",
    "table" => "carts",
    "pivot_table" => "cart_items",
    "item_table" => "products",
    "cart_view" => "awesome-cart::cart.index"
];
