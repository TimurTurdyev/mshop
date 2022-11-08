<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class OptionList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public string $title = 'Группа опций товара';

    public function delete(Option $option)
    {
        $option->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.option.option-list', [
            'options' => Option::query()->with('optionValues')->orderByDesc('id')->paginate(50)
        ])->layoutData([
            'title' => $this->title
        ]);
    }
}
