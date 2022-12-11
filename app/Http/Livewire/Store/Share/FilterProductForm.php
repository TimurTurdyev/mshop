<?php

namespace App\Http\Livewire\Store\Share;

use App\Models\CollectionProperty;
use App\Models\Price;
use DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;
use Livewire\Component;

class FilterProductForm extends Component
{
    public $type = 'product';
    public $filterCatalogs = [];
    public $filterBrands = [];
    public $brands = [];
    public $options = [];
    public $selectedBrands = [];
    public $selectedOptions = [];

    public function queryString()
    {
        return [
            'selectedOptions' => ['except' => '', 'as' => 'options'],
            'selectedBrands' => ['except' => '', 'as' => 'brands'],
        ];
    }

    public function updatedSelectedBrands($values)
    {
        $this->emit('filterSelectedBrands', $values);
    }

    public function updatedSelectedOptions($values)
    {
        $options = [];

        foreach ($values as $value) {
            $item = str($value)->explode('-');
            $options[$item->get(0)][] = $item->get(1);
        }

        foreach ($options as &$option) {
            $option = implode('|', $option);
        }

        $this->emit('filterSelectedOptions', $options);
    }

    public function mount()
    {
        $this->loadOptions();
        $this->prepareSelected();
        $this->loadBrands();
    }

    public function render()
    {
        return view('livewire.store.share.filter-product-form');
    }

    private function loadOptions()
    {
        if ($this->type != 'product') {
            $this->options = DB::query()
                ->from('collection_properties')
                ->join('properties', static function (JoinClause $q) {
                    $q->where('property_type', '=',
                        CollectionProperty::getActualClassNameForMorph(CollectionProperty::class));
                    $q->whereRaw('properties.property_id=collection_properties.id');
                })
                ->join('options', 'properties.option_id', '=', 'options.id')
                ->join('option_values', 'properties.option_value_id', '=', 'option_values.id')
                ->join('collections', 'collection_properties.collection_id', '=', 'collections.id')
                ->when($this->filterBrands, static function (Builder $query, $brands) {
                    $query->whereIn('brand_id', $brands);
                })
                ->when($this->filterCatalogs, static function (Builder $query, $catalogs) {
                    $query
                        ->join('collection_catalogs', 'collections.id', '=', 'collection_catalogs.collection_id')
                        ->whereIn('collection_catalogs.catalog_id', $catalogs);
                })
                ->where('collections.status', '=', 1)
                ->where('collection_properties.status', '=', 1)
                ->groupBy(['options.id', 'option_values.id'])
                ->get([
                    'options.id as option_id',
                    'option_values.id as option_value_id',
                    'group_site as option',
                    'value',
                    'image'
                ])
                ->map(static fn($item) => (array) $item)
                ->groupBy(['option'])
                ->toArray();
            return;
        }
        $this->options = DB::query()
            ->from('prices')
            ->join('properties', static function (JoinClause $q) {
                $q->where('property_type', '=',
                    Price::getActualClassNameForMorph(Price::class));
                $q->whereRaw('properties.property_id=prices.id');
            })
            ->join('options', 'properties.option_id', '=', 'options.id')
            ->join('option_values', 'properties.option_value_id', '=', 'option_values.id')
            ->join('products', 'prices.product_id', '=', 'product_id')
            ->when($this->filterBrands, static function (Builder $query, $brands) {
                $query->whereIn('brand_id', $brands);
            })
            ->when($this->filterCatalogs, static function (Builder $query, $catalogs) {
                $query
                    ->join('product_catalogs', 'products.id', '=', 'product_catalogs.product_id')
                    ->whereIn('product_catalogs.catalog_id', $catalogs);
            })
            ->where('products.status', '=', 1)
            ->where('prices.status', '=', 1)
            ->groupBy(['options.id', 'option_values.id'])
            ->get([
                'options.id as option_id',
                'option_values.id as option_value_id',
                'group_site as option',
                'value',
                'image'
            ])
            ->map(static fn($item) => (array) $item)
            ->groupBy(['option'])
            ->toArray();
    }

    private function prepareSelected()
    {
        foreach (request('options', []) as $key => $values) {
            foreach (explode('|', $values) as $value) {
                $this->selectedOptions[] = $key.'-'.$value;
            }
        }

        $brands = str(request('brands', ''))
            ->explode('|')
            ->filter();

        foreach ($brands as $value) {
            $this->selectedBrands[] = $value;
        }
    }

    private function loadBrands()
    {
        if ($this->type != 'product') {
            $this->brands = DB::query()
                ->from('brands')
                ->join('collections', 'brands.id', '=', 'collections.brand_id')
                ->when($this->filterCatalogs, static function (Builder $query, $catalogs) {
                    $query
                        ->join('collection_catalogs', 'collections.id', '=', 'collection_catalogs.collection_id')
                        ->whereIn('collection_catalogs.catalog_id', $catalogs);
                })
                ->where('collections.status', '=', 1)
                ->where('collections.status', '=', 1)
                ->groupBy(['brands.id'])
                ->get(['brands.id', 'brands.name'])
                ->map(static fn($item) => (array) $item)
                ->toArray();
            return;
        }
        $this->brands = DB::query()
            ->from('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->when($this->filterCatalogs, static function (Builder $query, $catalogs) {
                $query
                    ->join('product_catalogs', 'products.id', '=', 'product_catalogs.product_id')
                    ->whereIn('product_catalogs.catalog_id', $catalogs);
            })
            ->where('products.status', '=', 1)
            ->where('products.status', '=', 1)
            ->groupBy(['brands.id'])
            ->get(['brands.id', 'brands.name'])
            ->map(static fn($item) => (array) $item)
            ->toArray();
    }
}
