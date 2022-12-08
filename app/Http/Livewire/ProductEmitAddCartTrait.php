<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;

trait ProductEmitAddCartTrait
{
    public function addCart($quantity = 0)
    {
        $this->validate([
            'selectPriceId' => [
                'required',
                Rule::exists('prices', 'id')
                    ->where('product_id', $this->model->id)
                    ->where('status', 1)
            ],
        ]);

        $this->emit('addCartItem', $this->selectPriceId, $quantity);
    }
}
