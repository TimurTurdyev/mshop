<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'group_id',
        'name',
        'sku',
        'images',
        'height',
        'depth',
        'width',
        'weight',
        'viewed',
        'status',
    ];

    protected $casts = [
        'name' => 'string',
        'sku' => 'string',
        'images' => 'array',
        'depth' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'weight' => 'integer',
        'viewed' => 'integer',
        'status' => 'boolean',
    ];

    public function page(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }
}
