<?php

namespace Giuszeppe\AwesomeLaravelCart\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setTable(config('cart.item_table'));
    }
}
