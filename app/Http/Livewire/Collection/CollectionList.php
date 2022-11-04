<?php

namespace App\Http\Livewire\Collection;

use App\Models\Collection;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CollectionList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $title = 'Список коллекций';

    public string $search = '';

    protected $listeners = [
        'collectionPropertyUpdate' => '$refresh',
    ];

    public function delete(Collection $collection)
    {
        $collection->page()->delete();
        $collection->delete();
        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.collection.collection-list', [
            'title' => $this->title,
            'collections' => Collection::query()->with(['brand'])->orderByDesc('id')->paginate()
        ])->layoutData([
            'title' => $this->title
        ]);
    }
}
