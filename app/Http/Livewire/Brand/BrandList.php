<?php

namespace App\Http\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandList extends Component
{
    use WithPagination;

    public string $search = '';

    public function delete(Brand $brand)
    {
        $brand->page()->delete();
        $brand->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.brand.brand-list', [
            'brands' => Brand::with('page')->paginate()
        ])->layoutData([
            'title' => 'Список производителей'
        ]);
    }
}
