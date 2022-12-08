<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;

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
 * @method static Builder|Price newModelQuery()
 * @method static Builder|Price newQuery()
 * @method static Builder|Price query()
 * @method static Builder|Price whereId($value)
 * @method static Builder|Price whereImages($value)
 * @method static Builder|Price whereOptionValueId($value)
 * @method static Builder|Price wherePrice($value)
 * @method static Builder|Price whereProductId($value)
 * @method static Builder|Price whereQuantity($value)
 * @method static Builder|Price whereSku($value)
 * @method static Builder|Price whereSortOrder($value)
 * @method static Builder|Price whereSpecial($value)
 * @method static Builder|Price whereStatus($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Property[] $properties
 * @property-read int|null $properties_count
 * @method static \Database\Factories\PriceFactory factory(...$parameters)
 * @method static Builder|Price priceWithProduct($filter = [])
 * @method static Builder|Price filters($filter = [])
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

    public function priceToArray($fields = [])
    {
        $values = [];

        foreach ($fields as $field) {
            $values[$field] = $this->{$field} ?? '';
        }

        return $values;
    }

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

    public function imageFirst()
    {
        return $this->images[0] ?? '';
    }

    public function scopePriceWithProduct(Builder $bulder, $filter = [])
    {
        return $bulder->join('products', function (JoinClause $join) {
            $join->whereRaw('products.id=prices.product_id');
            $join->where('products.status', '=', 1);
        })
            ->when($filter['priceIdx'] ?? [], function ($query, $idx) {
                $query->whereIn('prices.id', $idx);
            })
            ->where('prices.status', '=', 1);
    }

    public function scopeFilters(Builder $bulder, $filter = [])
    {
        return $this
            ->select(['products.*', 'prices.*'])
            ->join('products', function (JoinClause $query) use($filter) {
                $query
                    ->whereRaw('products.id=prices.product_id')
                    ->where('products.status', 1)
                    ->when($filter['catalogs'] ?? [], function ($query, $catalogs) {
                        $query
                            ->join('product_catalogs', 'products.id', '=', 'product_catalogs.product_id')
                            ->whereIn('products.collection_id', $catalogs);
                    })
                    ->when($filter['collections'] ?? [], function ($query, $collections) {
                        $query->whereIn('products.collection_id', $collections);
                    })->when($filter['groups'] ?? [], function ($query, $groups) {
                        $query->whereIn('products.group_id', $groups);
                    });
            })
            ->when($filter['properties'] ?? [], function (Builder $query, $properties) {
                $query->join('properties', function (JoinClause $q) {
                    $q->where('property_type', '=',
                        Price::getActualClassNameForMorph(Price::class));
                    $q->whereRaw('properties.property_id=prices.id');
                });

                $query->where(function (Builder $q) use ($properties) {
                    foreach ($properties as $option_id => $value_id) {
                        $q->orWhere(function (Builder $q) use ($option_id, $value_id) {
                            $q->where('properties.option_id', '=', $option_id)
                                ->where('properties.option_value_id', '=', $value_id);
                        });
                    }
                });
            })
            ->where('prices.status', 1);
    }
}
