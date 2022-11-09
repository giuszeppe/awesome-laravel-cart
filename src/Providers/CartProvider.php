<?php

namespace Giuszeppe\AwesomeLaravelCart\Providers;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;
use Giuszeppe\Cart\CartItem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CartProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (auth()->user()) {
                $view->with('items', auth()->user()->cart->products);
                $view->with('totalPrice', auth()->user()->cart->totalPrice());
            } else {
                $view->with('items', []);
                $view->with('totalPrice', 0);
            }
        }); # pass to all routes the cart items
        // Product Facade
        $this->app->bind('item', function ($app) {
            return new (config('cart.item'))();
        });
        // Load Routes
        $this->registerRoutes();

        // Load Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'awesome-cart');

        // Load Config
        $this->publishes([
            __DIR__ . '/../config/cart.php' => config_path('cart.php'),

        ]);
        // Load Migrations
        /*$this->loadMigrationsFrom(__DIR__ . '../../database/migrations');*/
        $this->app->bind(CartItem::class, function () {
            $className = config('cart.items');
            return new $className;
        });

        if ($this->app->runningInConsole()) {
            // Publish the migration
            if (!class_exists('CreateCartTable')) {
                $this->publishes([
                    __DIR__ . '/../../database/migrations/create_carts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_carts_table.php'),
                    __DIR__ . '/../../database/migrations/create_cart_items_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_cart_items_table.php'),
                    __DIR__ . '/../../database/migrations/create_products_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_products_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
            // Publish Views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/awesome-laravel-cart'),
            ], 'views');
        }
    }
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cart.php', 'cart');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
        Route::group($this->jsonRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/json.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('cart.prefix'),
            'middleware' => config('cart.middleware'),
        ];
    }
    protected function jsonRouteConfiguration()
    {
        return [
            'prefix' => 'json/' . config('cart.prefix'),
            'middleware' => config('cart.middleware'),
        ];
    }
}
