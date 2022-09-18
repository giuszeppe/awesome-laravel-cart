<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests\Unit;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Giuszeppe\AwesomeLaravelCart\Tests\TestCase;


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
}
