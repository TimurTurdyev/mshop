<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    public function delete(Post $post)
    {
        $post->page()->delete();
        $post->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post.post-list', [
            'posts' => Post::orderByDesc('id')->paginate(50)
        ])->layoutData([
            'title' => 'Список статей'
        ]);
    }
}
