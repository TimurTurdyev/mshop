<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Collection;
use App\Models\Group;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProductCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Product $product;
    public array $selected_catalogs = [];
    public bool $exists = false;
    public array $brands;
    public array $groups;
    public array $collections;
    public array $images = [];

    public $listeners = ['updateSelectedCatalogs'];

    protected function rules()
    {
        return [
            'product.brand_id' => 'nullable|integer',
            'product.group_id' => 'nullable|integer',
            'product.collection_id' => 'nullable|integer',
            'product.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'slug')->ignore($this->product->id),
            ],
            'product.name' => 'required|string|min:6',
            'product.sku' => 'nullable|string',
            'product.images' => 'nullable|array',
            'product.height' => 'nullable|integer',
            'product.depth' => 'nullable|integer',
            'product.width' => 'nullable|integer',
            'product.weight' => 'nullable|integer',
            'product.viewed' => 'nullable|integer',
            'product.status' => 'nullable|boolean',
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

    public function mount(Product $product)
    {
        $this->product = $product->load(['prices.properties']);
        $this->exists = $this->product->exists;
        $this->selected_catalogs = $this->product->catalogs->map(fn($catalog) => $catalog->id)->toArray();
        $this->brands = Brand::get(['id', 'name'])->toArray();
        $this->groups = Group::get(['id', 'name'])->toArray();
        $this->collections = Collection::get(['id', 'name'])->toArray();

        $this->images = $this->product->images ?: [];

        $this->mountPage($this->product);
    }

    public function save()
    {
        $this->product->images = array_filter($this->images, fn($image) => !!$image);

        $this->saveModelAndPage($this->product, [
            'sku' => '',
            'height' => 0,
            'depth' => 0,
            'width' => 0,
            'weight' => 0,
            'viewed' => 0,
            'status' => 0,
        ]);

        $this->product->catalogs()->sync($this->selected_catalogs);

        if (!$this->exists) {
            return redirect()->route('admin.product.edit', $this->product);
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.product.product-create-or-update');
    }
}
