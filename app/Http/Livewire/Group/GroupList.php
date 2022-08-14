<?php

namespace App\Http\Livewire\Group;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class GroupList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    protected $listeners = [
        'groupAdded' => '$refresh',
    ];

    public function delete(Group $group)
    {
        $group->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.group.group-list', [
            'groups' => Group::orderByDesc('id')->paginate()
        ])->layoutData([
            'title' => 'Список групп товаров'
        ]);
    }
}
