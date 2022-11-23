<?php

namespace App\Http\Livewire\Store\Collection;

use App\Models\Price;
use Illuminate\Support\Collection;
use Livewire\Component;

class CompositionProducts extends Component
{
    public int $defaultPrice = 0;

    public int $total = 0;

    public array $compositions = [];
    public string $compositionHash = '';

    public $queryString = [
        'compositionHash' => ['except' => '', 'as' => 'kit']
    ];

    protected $listeners = [
        'addProduct'
    ];

    public function addCart()
    {
        $prices = collect($this->compositions)
            ->mapWithKeys(fn($price, $key) => [$key => $price['quantity']])
            ->toArray();

        $this->emit('addCartItems', $prices);
    }

    public function quantityDecrease($priceId = 0)
    {
        abort_if(!isset($this->compositions[$priceId]), 404, 'Oops. Something went wrong.');

        $this->compositions[$priceId]['quantity']--;

        if ($this->compositions[$priceId]['quantity'] <= 0) {
            unset($this->compositions[$priceId]);
        }

        $this->init();
    }

    public function quantityIncrease($priceId = 0)
    {
        abort_if(!isset($this->compositions[$priceId]), 404, 'Oops. Something went wrong.');

        if ($this->compositions[$priceId]['quantity'] <= 100) {
            $this->compositions[$priceId]['quantity']++;
        }

        $this->init();
    }

    public function mount()
    {
        if ($this->compositionHash) {
            /** @var Collection $idx */
            $idx = str($this->compositionHash)
                ->explode('|')
                ->mapWithKeys(function ($value) {
                    $value = str($value)->explode('.');
                    if ($value->count() !== 2 || (int) $value[1] < 1) {
                        return [0 => 0];
                    }

                    return [(int) $value[0] => (int) $value[1]];
                });

            $this->compositions = Price::query()
                ->select(['products.name', 'price', 'prices.id', 'prices.images'])
                ->priceWithProduct([
                    'priceIdx' => $idx->keys()->toArray()
                ])
                ->get()
                ->mapWithKeys(function (Price $item) use ($idx) {
                    $quantity = $idx->get($item->id, 1);

                    if ($quantity > 100) {
                        $quantity = 100;
                    }

                    return [
                        $item->id => [
                            'name' => $item->name,
                            'price' => $item->price,
                            'quantity' => $quantity,
                        ],
                    ];
                })->toArray();

            $this->init();
        }
    }

    public function addProduct($price, $quantity)
    {
        $this->compositions[$price['id']] = [
            'name' => $price['name'],
            'price' => $price['price'],
            'quantity' => max((int) $quantity, 1)
        ];

        $this->init();
    }

    private function init()
    {
        $this->total = 0;
        $hash = [];
        foreach ($this->compositions as $key => $composition) {
            $hash[] = $key.'.'.$composition['quantity'];
            $this->total += $composition['price'] * $composition['quantity'];
        }

        $this->compositionHash = join('|', $hash);
        if ($this->compositionHash === '' && request()->has('kit')) {
            request()->query->remove('kit');
        }
    }

    public function render()
    {
        return view('livewire.store.collection.composition-products');
    }
}
