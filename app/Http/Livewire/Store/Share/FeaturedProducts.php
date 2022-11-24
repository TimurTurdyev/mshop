<?php

namespace App\Http\Livewire\Store\Share;

use App\Models\CollectionProperty;
use DB;
use Livewire\Component;

class FeaturedProducts extends Component
{
    public int $tabActive = 0;
    public array $settings;

    public function changeTab($index)
    {
        if (isset($this->settings[$index])) {
            $this->tabActive = $index;
        }
    }

    public function render()
    {
        $setting = $this->settings[$this->tabActive] ?? [];
        $prices = $setting['products'] ?? [];

        if ($prices) {
            $prices = CollectionProperty::query()->select([
                'collections.id',
                'collections.name',
                'collections.slug',
                'collection_properties.id as price_id',
                'collection_properties.name as price_name',
                DB::raw('MIN(collection_properties.price) as price'),
                'collection_properties.images'
            ])
                ->join(
                    'collections',
                    'collections.id',
                    '=',
                    'collection_properties.collection_id'
                )
                ->whereIn('collections.id', $prices)
                ->where('collections.status', 1)
                ->where('collection_properties.status', 1)
                ->groupBy('collections.id')
                ->get();
        }

        return view('livewire.store.share.featured-products', [
            'prices' => $prices
        ]);
    }
}
