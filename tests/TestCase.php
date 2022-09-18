<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests;


use Giuszeppe\AwesomeLaravelCart\Providers\CartProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            CartProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
        include_once __DIR__ . '/../database/migrations/create_cart_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_user_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_product_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_cart_items_pivot_table.php.stub';

        // run the up() method (perform the migration)
        (new \CreateCartTable)->up();
        (new \CreateUsersTable)->up();
        (new \CreateProductsTable)->up();
        (new \CreateCartItemsTable)->up();
    }
}
