<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionProperty extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'collection_id',
        'images',
        'name',
        'price',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'name' => 'string',
        'price' => 'integer',
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function properties(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Property::class, 'property');
    }

    public function imageFirst()
    {
        return $this->images[0] ?? '';
    }
}
