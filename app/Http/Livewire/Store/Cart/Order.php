<?php

namespace App\Http\Livewire\Store\Cart;

use App\Models\Price;
use App\Models\Property;
use Cart;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Livewire\Component;

class Order extends Component
{
    public $name = '';
    public $phone = '';
    public $email = '';
    private $open = false;

    protected $rules = [
        'name' => 'required|string|min:1',
        'phone' => 'required_without:email|string',
        'email' => 'required_without:phone|string|email',
    ];

    public $listeners = [
        'addCartItem',
        'addCartItems',
        'updateCart' => '$refresh',
    ];

    public function send()
    {
        $this->validate();
        Cart::clear();

        return redirect()
            ->back()
            ->with('success', 'Сообщение успешно отправлено!');
    }

    public $readyToLoad = false;

    public function loadCart()
    {
        $this->readyToLoad = true;
    }

    public function removeItem($id)
    {
        abort_if(!Cart::has($id), 404, 'Oops. Cart item not found.');

        Cart::remove($id);
    }

    public function addCartItem($priceId, $quantity)
    {
        abort_if(!$priceId || $quantity < 1, 400, 'Oops. Bad parameters');

        $this->addCartItems([
            $priceId => $quantity
        ]);
    }

    public function addCartItems($idx = [])
    {
        abort_if(!$idx, 400, 'Oops. Bad parameters');

        $prices = Price::query()
            ->select(['products.name', 'price', 'prices.id', 'prices.images'])
            ->priceWithProduct([
                'priceIdx' => array_keys($idx)
            ])
            ->with([
                'properties' => function (MorphMany $builder) {
                    $builder
                        ->join('options', 'option_id', '=', 'options.id')
                        ->join('option_values', 'option_value_id', '=', 'option_values.id')
                        ->select([
                            'options.group_site as option_name', 'option_values.value as option_value',
                            'properties.*'
                        ]);
                }
            ])
            ->get()
            ->map(function (Price $item) use ($idx) {
                $quantity = $idx[$item->id] ?? 1;

                if ($quantity > 100) {
                    $quantity = 100;
                }

                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $quantity,
                    'attributes' => [
                        'image' => $item->imageFirst(),
                        'properties' => $item->properties->map(function (Property $property) {
                            return [
                                'option_id' => $property->option_id,
                                'option_value_id' => $property->option_value_id,
                                'option_name' => $property->option_name,
                                'option_value' => $property->option_value,
                            ];
                        })->toArray(),
                    ]
                ];
            })->toArray();

        if ($prices) {
            Cart::add($prices);
        }
        $this->open = true;
    }


    public function render()
    {
        $items = [];
        $cartTotalQuantity = 0;
        $cartSubTotal = 0;

        if ($this->readyToLoad) {
            $items = Cart::getContent();
            $cartTotalQuantity = Cart::getTotalQuantity();
            $cartSubTotal = Cart::getSubTotal();
        }

        return view('livewire.store.cart.order', [
            'items' => $items,
            'cartTotalQuantity' => $cartTotalQuantity,
            'cartSubTotal' => $cartSubTotal,
            'open' => $this->open,
        ]);
    }
}
