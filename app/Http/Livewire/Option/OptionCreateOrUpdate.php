<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use Livewire\Component;

class OptionCreateOrUpdate extends Component
{
    public Option $option;
    public bool $exists = false;

    protected $listeners = [
        'optionValueAdded' => '$refresh',
    ];

    protected array $rules = [
        'option.group_admin' => 'required|string|min:3|max:255',
        'option.group_site' => 'required|string|min:3|max:255',
    ];

    public function mount(Option $option)
    {
        $this->option = $option;
        $this->exists = $this->option->exists;
    }

    public function save()
    {
        $this->validate();

        $this->option->save();

        if ($this->exists == false) {
            return redirect()->route('admin.option.edit', $this->option);
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.option.option-create-or-update');
    }
}
