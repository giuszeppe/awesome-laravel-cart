<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests\Unit;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Giuszeppe\AwesomeLaravelCart\Tests\TestCase;
use Giuszeppe\AwesomeLaravelCart\Tests\TestModels\Product;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_cart_has_a_user()
    {
        $cart = Cart::factory()->create();
        $this->assertModelExists($cart->user);
    }
    /** @test */
    function an_empty_cart_has_no_items()
    {
        $cart = Cart::factory()->create();
        $this->assertEmpty($cart->products);
    }
    /** @test */
    function add_items_to_cart()
    {
        $cart = Cart::factory()
            ->has(Product::factory()->count(3))
            ->create();
        $this->assertNotEmpty($cart->products);
    }
    /** @test */
    function remove_items_from_cart()
    {
        $cart = Cart::factory()
            ->has(Product::factory()->count(3))
            ->create();
        $cart->products()->detach([1, 2, 3]);
        $this->assertEmpty($cart->products);
    }
}
