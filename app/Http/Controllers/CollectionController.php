<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionProperty;
use App\Models\Group;
use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function show(Collection $collection, Request $request): Factory|View|Application
    {
        abort_if(!$collection->status, 404);

        $selectPriceId = (int) $request->get('price', 0);

        $groupIdx = $collection
            ->products()
            ->where('status', 1)
            ->groupBy('group_id')
            ->get(['group_id'])
            ->map(fn($item) => $item['group_id'])
            ->all();

        $groups = Group::query()
            ->whereIn('id', $groupIdx)
            ->get();

        $selectedOptions = Property::query()
            ->where('property_type', '=', CollectionProperty::getActualClassNameForMorph(CollectionProperty::class))
            ->where('property_id', '=', $selectPriceId)
            ->pluck('option_value_id', 'option_id')
            ->toArray();

        return view('store.collection', [
            'selectPriceId' => $selectPriceId,
            'collection' => $collection,
            'groups' => $groups,
            'selectedOptions' => $selectedOptions,
        ]);
    }
}
