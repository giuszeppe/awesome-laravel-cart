<?php

namespace Giuszeppe\Cart\Providers;

use Giuszeppe\Cart\CartItem;
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
        $this->publishes([
            __DIR__ . '/../config/cart.php' => config_path('cart.php'),
        ]);
        $this->app->bind(CartItem::class, function () {
            $className = config('cart.items');
            return new $className;
        });
    }
}
