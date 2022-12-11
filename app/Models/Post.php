<?php

namespace App\Models;

use App\Models\Enums\CatalogEntityShowEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'preview',
        'image',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function page(): MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }
}
