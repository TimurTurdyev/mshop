<?php

namespace App\Models\Traits;

use App\Models\Comment;

trait Commentable
{
    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this
            ->morphMany(Comment::class, 'commentable')
            ->orderByDesc('id');
    }
}
