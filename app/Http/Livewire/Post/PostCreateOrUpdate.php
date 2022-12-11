<?php

namespace App\Http\Livewire\Post;

use App\Http\Livewire\PageLivewireTrait;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class PostCreateOrUpdate extends Component
{
    use PageLivewireTrait;

    public Post $post;
    public bool $exists = false;
    protected function rules(): array
    {
        return [
            'post.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($this->post->id),
            ],
            'post.name' => 'required|string|max:255',
            'post.preview' => 'required|string|max:255',
            'post.image' => 'required|string|max:255',
            'post.status' => 'nullable|boolean',
        ];
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->exists = $this->post->exists;
        $this->mountPage($this->post);
    }

    public function save()
    {
        $this->saveModelAndPage($this->post, [
            'status' => 0,
        ]);

        if (!$this->exists) {
            return redirect()->route('admin.post.edit', $this->post);
        }
    }
    public function render()
    {
        return view('livewire.post.post-create-or-update');
    }
}
