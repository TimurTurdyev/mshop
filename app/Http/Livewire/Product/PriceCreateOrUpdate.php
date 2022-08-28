<?php

namespace App\Http\Livewire\Product;

use App\Models\Price;
use Livewire\Component;

class PriceCreateOrUpdate extends Component
{
    public Price $price;
    public array $properties = [];
    public array $images = [];

    protected $listeners = [
        'propertyUpdate' => '$refresh',
    ];

    protected array $rules = [
        'price.product_id' => 'nullable|integer',
        'price.images' => 'nullable|array',
        'price.sku' => 'required|string',
        'price.price' => 'required|integer',
        'price.special' => 'nullable|integer',
        'price.quantity' => 'nullable|integer',
        'price.sort_order' => 'nullable|integer',
        'price.status' => 'nullable|boolean',
    ];

    public function mount(Price $price)
    {
        $this->price = $price;
        $this->images = $this->price->images ?: [];
    }

    public function addImage()
    {
        $this->images[] = '';
    }

    public function addProperty()
    {
        $this->price->properties()->create([
            'option_id' => null,
            'option_value_id' => null,
        ]);

        $this->emitUp('propertyUpdate');
    }

    public function save()
    {
        $this->validate();

        $this->price->images = array_filter($this->images, fn($image) => !!$image);
        $this->price->save();

        $this->emitUp('priceUpdate');
    }

    public function delete(Price $price)
    {
        $price->delete();
        $this->emitUp('priceUpdate');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.product.price-create-or-update');
    }
}
