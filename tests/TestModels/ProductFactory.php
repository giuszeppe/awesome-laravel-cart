<?php

namespace Giuszeppe\AwesomeLaravelCart\Tests\TestModels;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $model = Product::class;
    public function definition(): array
    {

        return [
            'name' => $this->faker->name,
        ];
    }
}
