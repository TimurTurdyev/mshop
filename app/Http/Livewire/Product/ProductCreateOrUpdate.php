<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Group;
use App\Models\Product;
use Livewire\Component;

class ProductCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Product $product;
    public array $catalogs;
    public bool $exists = false;
    public array $brands;
    public array $groups;

    protected array $rules = [
        'product.brand_id' => 'nullable|integer',
        'product.group_id' => 'nullable|integer',
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

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->exists = $this->product->exists;
        $this->catalogs = Catalog::get(['id', 'name'])->toArray();
        $this->brands = Brand::get(['id', 'name'])->toArray();
        $this->groups = Group::get(['id', 'name'])->toArray();
        $this->mountPage($this->product);
    }

    public function save()
    {
        $this->saveModelAndPage($this->product, [
            'sku' => '',
            'height' => 0,
            'depth' => 0,
            'width' => 0,
            'weight' => 0,
            'viewed' => 0,
            'status' => 0,
        ]);

        if ($this->exists == false) {
            return redirect()->route('admin.product.edit', $this->product);
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.product.product-create-or-update');
    }
}
