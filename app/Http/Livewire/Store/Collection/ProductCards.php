<?php

namespace App\Http\Livewire\Store\Collection;

use App\Models\CollectionProperty;
use App\Models\Price;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCards extends Component
{
    use WithPagination;

    public int $collectionId;
    public array $selectProperties = [];
    public int $selectPriceId = 0;
    public int $groupId = 0;
    public string $groupName = '';

    public $listeners = [
        'changeProperties',
    ];

    public function changeProperties($selectProperties = [])
    {
        $this->selectProperties = $selectProperties;
    }

    public function mount()
    {
        $this->selectProperties = Property::query()
            ->where('property_type', '=', CollectionProperty::getActualClassNameForMorph(CollectionProperty::class))
            ->where('property_id', '=', $this->selectPriceId)
            ->get(['option_id', 'option_value_id'])
            ->mapWithKeys(function ($value) {
                return [$value->option_id => $value->option_value_id];
            })->toArray();
    }

    public function render()
    {
        $products = Price::query()
            ->select(['products.*', 'prices.*'])
            ->join('products', function (JoinClause $query) {
                $query
                    ->whereRaw('products.id=prices.product_id')
                    ->where('products.collection_id', $this->collectionId)
                    ->where('products.group_id', $this->groupId)
                    ->where('products.status', 1);
            })
            ->when($this->selectProperties, function (Builder $query) {
                $query->join('properties', function (JoinClause $q) {
                    $q->where('property_type', '=',
                        Price::getActualClassNameForMorph(Price::class));
                    $q->whereRaw('properties.property_id=prices.id');
                });
                $query->where(function (Builder $q) {
                    foreach ($this->selectProperties as $option_id => $value_id) {
                        $q->orWhere(function (Builder $q) use ($option_id, $value_id) {
                            $q->where('properties.option_id', '=', $option_id)
                                ->where('properties.option_value_id', '=', $value_id);
                        });
                    }
                });
            })
            ->where('prices.status', 1)
            ->with('properties.optionGroup')
            ->with('properties.optionValue')
            ->paginate(perPage: 4, columns: ['*'], pageName: 'p'.$this->groupId)
            ->withQueryString();

        return view('livewire.store.collection.product-cards', [
            'products' => $products
        ]);
    }
}
