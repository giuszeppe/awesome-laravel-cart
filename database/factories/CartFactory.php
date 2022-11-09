<?php

namespace Giuszeppe\AwesomeLaravelCart\Database\Factories;

use Giuszeppe\AwesomeLaravelCart\Models\Cart;
use Giuszeppe\AwesomeLaravelCart\Tests\TestModels\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'user_id' => $user->id
        ];
    }
}
