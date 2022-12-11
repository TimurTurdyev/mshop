<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public function delete(Project $project)
    {
        $project->page()->delete();
        $project->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.project.project-list', [
            'projects' => Project::orderByDesc('id')->paginate(50)
        ])->layoutData([
            'title' => 'Список проектов'
        ]);
    }
}
