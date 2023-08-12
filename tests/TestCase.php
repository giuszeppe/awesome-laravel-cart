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

    protected function getPackageProviders($app): array
    {
        return [
            CartProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
        include_once __DIR__ . '/../database/migrations/create_carts_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_user_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_products_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_cart_items_table.php.stub';

        // run the up() method (perform the migration)
        (new \CreateCartsTable)->up();
        (new \CreateUsersTable)->up();
        (new \CreateProductsTable)->up();
        (new \CreateCartItemsTable)->up();
    }
}
