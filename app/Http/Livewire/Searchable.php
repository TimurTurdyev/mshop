<?php

namespace App\Http\Livewire;

use DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

trait Searchable
{
    public $search = '';
    public $findMode = 'allSearch';

    public $modes = [
        'allSearch' => 'Все',
        'productsSearch' => 'Товары',
        'collectionsSearch' => 'Коллекции',
        'categoriesSearch' => 'Категории',
        'brandsSearch' => 'Бренды',
    ];

    private function search(): Collection
    {
        $items = collect();

        if (str($this->search)->length() > 3) {
            if (method_exists($this, $this->findMode)) {
                $items->put($this->findMode, $this->{$this->findMode}($this->search));
            } else {
                foreach (array_keys($this->modes) as $mode) {
                    if (method_exists($this, $mode)) {
                        $items->put($mode, $this->{$mode}($this->search));
                    }
                }
            }
        }

        return $items;
    }

    public function changeMode($mode)
    {
        if (isset($this->modes[$mode])) {
            $this->findMode = $mode;
        }
    }

    private function collectionsSearch(string $search)
    {
        return DB::query()
            ->select([
                'collections.id',
                'collections.name',
                'collections.slug',
                DB::raw("IF(collections.images, JSON_EXTRACT(collections.images, '$[0]'), JSON_EXTRACT(collection_properties.images, '$[0]')) AS image"),
                'collection_properties.price',
                DB::raw("collection_properties.name AS sku")
            ])
            ->from('collections')
            ->join('collection_properties', 'collections.id', '=', 'collection_properties.collection_id')
            ->where(static function (Builder $query) use ($search) {
                $query->where('collections.id', 'like', $search.'%')
                    ->orWhereFullText(['collections.name'], $search)
                    ->orWhere('collection_properties.name', 'like', $search.'%');
            })
            ->where('collections.status', '=', 1)
            ->where('collection_properties.status', '=', 1)
            ->groupBy('collections.id')
            ->limit(10)
            ->get()
            ->map(function ($item) {
                $item->image = str($item->image)->replace('"', '')->value();
                $item->price = "от $item->price руб";
                $item->slug = route('collection.show', $item->slug);

                return $item;
            });
    }

    private function productsSearch(string $search)
    {
        return DB::query()
            ->select([
                'products.id',
                'products.name',
                'products.slug',
                DB::raw("IF(products.images, JSON_EXTRACT(products.images, '$[0]'), JSON_EXTRACT(prices.images, '$[0]')) AS image"),
                'prices.price',
                'prices.sku',
            ])
            ->from('products')
            ->join('prices', 'products.id', '=', 'prices.product_id')
            ->where(static function (Builder $query) use ($search) {
                $query->where('products.id', 'like', $search.'%')
                    ->orWhereFullText(['name'], $search)
                    ->orWhere('prices.sku', 'like', $search.'%');
            })
            ->where('products.status', '=', 1)
            ->where('prices.status', '=', 1)
            ->groupBy('products.id')
            ->limit(10)
            ->get()
            ->map(function ($item) {
                $item->image = str($item->image)->replace('"', '')->value();
                $item->price = "$item->price руб";
                $item->slug = route('product.show', $item->slug);

                return $item;
            });
    }
}
