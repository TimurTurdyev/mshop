<?php

namespace App\Http\Livewire\Collection;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Brand;
use App\Models\Group;
use App\Models\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CollectionCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Collection $collection;
    public array $selected_catalogs = [];
    public array $brands = [];
    public bool $exists = false;
    public array $images = [];

    public $listeners = ['updateSelectedCatalogs'];

    protected function rules()
    {
        return [
            'collection.brand_id' => 'nullable|integer',
            'collection.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('collections', 'slug')->ignore($this->collection->id),
            ],
            'collection.name' => 'required|string|min:6',
            'collection.images' => 'nullable|array',
            'collection.status' => 'nullable|boolean',
        ];
    }

    public function addImage()
    {
        $this->images[] = '';
    }

    public function updateSelectedCatalogs($selected)
    {
        $this->selected_catalogs = $selected;
    }

    public function mount(Collection $collection)
    {
        $this->collection = $collection->load(['collectionProperties.properties']);
        $this->exists = $this->collection->exists;
        $this->selected_catalogs = $this->collection->catalogs->map(fn($catalog) => $catalog->id)->toArray();

        $this->brands = Brand::get(['id', 'name'])->toArray();


        $this->images = $this->collection->images ?: [];

        $this->mountPage($this->collection);
    }

    public function save()
    {
        $this->collection->images = array_filter($this->images, fn($image) => !!$image);

        $this->saveModelAndPage($this->collection, [
            'status' => 0,
        ]);

        $this->collection->catalogs()->sync($this->selected_catalogs);

        if (!$this->exists) {
            return redirect()->route('admin.collection.edit', $this->collection);
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.collection.collection-create-or-update');
    }
}
