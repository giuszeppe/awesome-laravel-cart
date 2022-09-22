<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests\Unit;

use Giuszeppe\AwesomeLaravelCart\Facades\Item;
use Giuszeppe\AwesomeLaravelCart\Models\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Giuszeppe\AwesomeLaravelCart\Tests\TestCase;
use Giuszeppe\AwesomeLaravelCart\Tests\TestModels\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_product_has_a_name()
    {
        $product = Item::factory()->create();
        $product->name = "Ez";
        $product->save();
        $this->assertEquals($product->name, 'Ez');
    }
    /** @test */
    function a_product_has_carts()
    {
        $product = Item::factory()
            ->has(Cart::factory())
            ->create();
        $product->name = "Ez";
        $product->save();
        $this->assertInstanceOf(BelongsToMany::class, $product->carts());
        $this->assertNotNull($product->carts[0]);
    }
    /** @test */
    function a_product_has_a_cart_pivot_table()
    {
        $product = Item::factory()
            ->has(Cart::factory())
            ->create();
        $product->name = "Ez";
        $product->save();
        $this->assertNotNull($product->carts[0]->pivot);
    }
}
