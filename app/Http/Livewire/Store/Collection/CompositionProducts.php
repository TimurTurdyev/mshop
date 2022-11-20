<?php

namespace App\Http\Livewire\Store\Collection;

use App\Models\Price;
use App\Models\Property;
use Cart;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Livewire\Component;

class CompositionProducts extends Component
{
    public int $defaultPrice = 0;

    public int $total = 0;

    public array $compositions = [];
    public string $compositionHash = '';

    public $queryString = [
        'compositionHash' => ['except' => '', 'as' => 'cp']
    ];

    protected $listeners = [
        'addProduct'
    ];

    public function addCart()
    {
        Cart::add(array_values($this->compositions));

        $this->emit('updateCart');
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
                    abort_if($value->count() !== 2, 400, 'Bad parameters');
                    return [(int) $value[0] => (int) $value[1]];
                });

            $this->compositions = Price::query()
                ->select(['products.name', 'price', 'prices.id', 'prices.images'])
                ->join('products', function (JoinClause $join) {
                    $join->whereRaw('products.id=prices.product_id');
                    $join->where('products.status', '=', 1);
                })
                ->where('prices.status', '=', 1)
                ->whereIn('prices.id', $idx->keys()->toArray())
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
                ->mapWithKeys(function (Price $item) use ($idx) {
                    $quantity = $idx->get($item->id, 1);

                    if ($quantity > 100) {
                        $quantity = 100;
                    }

                    return [
                        $item->id => [
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
            'quantity' => $quantity
        ];

        $this->init();
    }

    private function init()
    {
        $hash = [];
        foreach ($this->compositions as $key => $composition) {
            $hash[] = $key.'.'.$composition['quantity'];
            $this->total += $composition['price'] * $composition['quantity'];
        }

        $this->compositionHash = join('|', $hash);
    }

    public function render()
    {
        return view('livewire.store.collection.composition-products');
    }
}
