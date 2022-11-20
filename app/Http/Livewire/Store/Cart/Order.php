<?php

namespace App\Http\Livewire\Store\Cart;

use Cart;
use Livewire\Component;

class Order extends Component
{
    public $show = false;

    public $listeners = [
        'addCartItem',
        'addCartItems',
        'updateCart' => '$refresh',
    ];

    public function open()
    {
        $this->show = true;
    }

    public function removeItem($id)
    {
        abort_if(!Cart::has($id), 404, 'Oops. Cart item not found.');

        Cart::remove($id);
    }

    public function addCartItem($priceId, $quantity)
    {
    }

    public function addCartItems($prices = [])
    {

    }

    public function render()
    {
        $items = Cart::getContent();
        $cartTotalQuantity = Cart::getTotalQuantity();
        $cartSubTotal = Cart::getSubTotal();

        return view('livewire.store.cart.order', [
            'items' => $items,
            'cartTotalQuantity' => $cartTotalQuantity,
            'cartSubTotal' => $cartSubTotal,
        ]);
    }
}
