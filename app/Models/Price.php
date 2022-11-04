<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Price
 *
 * @property int $id
 * @property int $product_id
 * @property int $option_value_id
 * @property string|null $images
 * @property string $sku
 * @property int $price
 * @property int $special
 * @property int $quantity
 * @property int $sort_order
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereOptionValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereSpecial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereStatus($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Property[] $properties
 * @property-read int|null $properties_count
 * @method static \Database\Factories\PriceFactory factory(...$parameters)
 */
class Price extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'images',
        'sku',
        'price',
        'special',
        'quantity',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'sku' => 'string',
        'price' => 'integer',
        'special' => 'integer',
        'quantity' => 'integer',
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    protected function getImagesAttribute($value)
    {
        return json_decode($value ?: '[]', 1);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function properties(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Property::class, 'property');
    }
}
