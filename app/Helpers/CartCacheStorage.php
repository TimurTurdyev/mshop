<?php

namespace App\Helpers;

use Cache;
use Carbon\Carbon;
use Cookie;
use Darryldecode\Cart\CartCollection;

class CartCacheStorage
{
    private $data = [];
    private $cart_id;

    public function __construct()
    {
        $this->cart_id = Cookie::get('cart');
        if ($this->cart_id) {
            $this->data = Cache::get('cart_'.$this->cart_id, []);
        } else {
            $this->cart_id = uniqid();
        }
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }

    public function get($key)
    {
        return new CartCollection($this->data[$key] ?? []);
    }

    public function put($key, $value)
    {
        $this->data[$key] = $value;
        \Cache::put('cart_'.$this->cart_id, $this->data, Carbon::now()->addDays(30));

        if (!Cookie::hasQueued('cart')) {
            Cookie::queue(
                Cookie::make('cart', $this->cart_id, 60 * 24 * 30)
            );
        }
    }
}
