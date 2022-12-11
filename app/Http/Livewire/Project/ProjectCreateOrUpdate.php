<?php

namespace App\Http\Livewire\Project;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Project;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProjectCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Project $project;
    public bool $exists = false;
    public array $images = [];
    public array $related = [];

    protected function rules(): array
    {
        return [
            'project.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'slug')->ignore($this->project->id),
            ],
            'project.name' => 'required|string|max:255',
            'project.company' => 'required|string|max:255',
            'project.preview' => 'required|string|max:255',
            'project.image' => 'required|string|max:255',
            'project.status' => 'nullable|boolean',
            'project.images' => 'nullable|array',
            'project.related' => 'nullable|array',
        ];
    }

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->exists = $this->project->exists;
        $this->mountPage($this->project);
        $this->images = $this->project->images ?: [];
        $this->related = $this->project->related ?: [];
    }

    public function addImage()
    {
        $this->images[] = '';
    }

    public function addRelated()
    {
        $this->related[] = [
            'type' => '',
            'value' => '',
        ];
    }

    public function removeRelated($index)
    {
        unset($this->related[$index]);
        $this->related = array_values($this->related);
    }

    public function save()
    {
        $this->project->images = array_filter($this->images, fn($image) => !!$image);
        $this->project->related = array_filter($this->related, fn($related) => !!$related['value']);

        $this->saveModelAndPage($this->project, [
            'status' => 0,
        ]);

        if (!$this->exists) {
            return redirect()->route('admin.project.edit', $this->project);
        }
    }

    public function render()
    {
        return view('livewire.project.project-create-or-update');
    }
}
