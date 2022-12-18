<?php

namespace App\Http\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class GroupModal extends Component
{
    public Group $group;
    public string $modal_title = '';

    public $listeners = [
        'editGroup',
    ];

    public function editGroup(Group $group)
    {
        $this->group = $group;
    }

    protected array $rules = [
        'group.name' => 'required|string|max:255',
        'group.status' => 'nullable|boolean',
    ];

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->modal_title = $this->group->exists ? 'Редактирование группы товара' : 'Создание группы товара';
    }

    public function save()
    {
        $this->validate();

        if (!$this->group->status) {
            $this->group->status = 0;
        }

        $this->group->save();

        $this->group = new Group();
        $this->dispatchBrowserEvent('groupModalClose');
        $this->emitUp('groupAdded');
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.group.group-modal');
    }
}
