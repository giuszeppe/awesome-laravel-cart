<?php

namespace Giuszeppe\AwesomeLaravelCart\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cart extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return \Giuszeppe\AwesomeLaravelCart\Database\Factories\CartFactory::new();
    }
    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }
    public function products()
    {
        return $this->belongsToMany(CartItem::class, 'products');
    }
}
