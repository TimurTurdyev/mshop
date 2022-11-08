<?php

namespace App\Http\Livewire\Collection;

use App\Models\CollectionProperty;
use App\Models\Option;
use Livewire\Component;

class CollectionPropertyCreateOrUpdate extends Component
{
    public CollectionProperty $collectionProperty;
    public array $options = [];
    public array $images = [];

    protected $listeners = [
        'propertyUpdate' => '$refresh',
    ];

    protected array $rules = [
        'collectionProperty.images' => 'nullable|array',
        'collectionProperty.name' => 'nullable|string',
        'collectionProperty.price' => 'nullable|integer',
        'collectionProperty.sort_order' => 'nullable|integer',
        'collectionProperty.status' => 'nullable|boolean',
    ];

    public function mount(CollectionProperty $collectionProperty)
    {
        $this->collectionProperty = $collectionProperty;
        $this->images = $this->collectionProperty->images ?: [];
    }

    public function addImage()
    {
        $this->images[] = '';
    }

    public function addProperty()
    {
        $this->collectionProperty->properties()->create([
            'option_id' => null,
            'option_value_id' => null,
        ]);

        $this->emitSelf('propertyUpdate');
    }

    public function optionValueUpdate($value)
    {
        $this->collectionProperty->option_value_id = $value;
    }

    public function save()
    {
        $this->validate();

        $this->collectionProperty->images = array_filter($this->images, fn($image) => !!$image);
        $this->collectionProperty->save();

        $this->emitUp('collectionPropertyUpdate');
    }

    public function delete(CollectionProperty $collectionProperty)
    {
        $collectionProperty->delete();
        $this->emitUp('collectionPropertyUpdate');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.collection.collection-property-create-or-update');
    }
}
