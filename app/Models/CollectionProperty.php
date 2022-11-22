<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CollectionProperty
 *
 * @property int $id
 * @property int $collection_id
 * @property array|null $images
 * @property string $name
 * @property int $price
 * @property int $sort_order
 * @property bool $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Property[] $properties
 * @property-read int|null $properties_count
 * @method static \Database\Factories\CollectionPropertyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty whereCollectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CollectionProperty whereStatus($value)
 * @mixin \Eloquent
 */
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
