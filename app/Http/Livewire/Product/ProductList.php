<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public string $title = 'Список товаров';

    public string $search = '';

    public function delete(Product $product)
    {
        $product->page()->delete();
        $product->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.product.product-list', [
            'title' => $this->title,
            'products' => Product::with(['group', 'brand'])->orderByDesc('id')->paginate()
        ])->layoutData([
            'title' => $this->title
        ]);
    }
}
