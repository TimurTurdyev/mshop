<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'preview',
        'image',
        'images',
        'related',
    ];

    protected $casts = [
        'status' => 'boolean',
        'images' => 'array',
        'related' => 'array',
    ];

    public function page(): MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }
}
