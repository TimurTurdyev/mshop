<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $brand_id
 * @property int|null $group_id
 * @property string $name
 * @property string $sku
 * @property array|null $images
 * @property int $height
 * @property int $depth
 * @property int $width
 * @property int $weight
 * @property int $viewed
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWidth($value)
 * @mixin \Eloquent
 */
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
