<?php

namespace App\Http\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

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
            'brands' => Brand::orderByDesc('id')->paginate(50)
        ])->layoutData([
            'title' => 'Список производителей'
        ]);
    }
}
