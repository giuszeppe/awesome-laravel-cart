<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests\Unit;

use Giuszeppe\AwesomeLaravelCart\Facades\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Giuszeppe\AwesomeLaravelCart\Tests\TestCase;
use Giuszeppe\AwesomeLaravelCart\Tests\TestModels\Product;

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
}
