<?php

namespace App\Http\Livewire\Brand;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Brand;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BrandCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Brand $brand;
    public bool $exists = false;

    protected function rules()
    {
        return [
            'brand.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands', 'slug')->ignore($this->brand->id),
            ],
            'brand.name' => 'required|string|min:6',
            'brand.status' => 'nullable|boolean',
        ];
    }

    public function mount(Brand $brand)
    {
        $this->brand = $brand;
        $this->exists = $this->brand->exists;
        $this->mountPage($this->brand);
    }

    public function save()
    {
        $this->saveModelAndPage($this->brand, [
            'status' => 0,
        ]);

        if ($this->exists == false) {
            return redirect()->route('admin.brand.edit', $this->brand);
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.brand.brand-create-or-update');
    }
}
