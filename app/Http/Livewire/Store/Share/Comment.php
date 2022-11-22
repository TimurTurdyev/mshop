<?php

namespace App\Http\Livewire\Store\Share;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $text;
    public $total = 0;

    public Model $model;

    protected $rules = [
        'name' => 'required|string|min:1',
        'email' => 'required|string|email',
        'text' => 'required|string|min:1',
    ];

    public function mount($model)
    {
        $this->model = $model;
    }

    public function add()
    {
        $this->validate();

        $this->model->comments()->create([
            'name' => $this->name,
            'email' => $this->email,
            'text' => $this->text,
        ]);

        $this->model->refresh();

        $this->reset(['name', 'email', 'text', 'total']);

        return redirect()
            ->back()
            ->with('success', 'Отзыв успешно отправлен!');
    }

    public function render()
    {
        $comments = $this
            ->model
            ->comments()
            ->select(['name', 'text', 'created_at'])
            ->paginate(perPage: 5, columns: ['*'], pageName: 'page_reviews')
            ->withQueryString();

        return view('livewire.store.share.comment', [
            'comments' => $comments
        ]);
    }
}
