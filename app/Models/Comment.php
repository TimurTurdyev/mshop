<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'email',
        'name',
        'text',
    ];

    protected $casts = [
        'status' => 'boolean',
        'email' => 'string',
        'name' => 'string',
        'text' => 'string',
    ];

    public function commentable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
