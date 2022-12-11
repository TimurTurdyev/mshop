<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\JoinClause;

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
 * @property-read \App\Models\Option $option
 * @property-read \App\Models\Price $prices
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
 * @property string $slug
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Catalog[] $catalogs
 * @property-read int|null $catalogs_count
 * @property-read \App\Models\Group|null $group
 * @property-read int|null $prices_count
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @property int|null $collection_id
 * @property-read \App\Models\Collection|null $collection
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Price[] $pricesStatusOn
 * @property-read int|null $prices_status_on_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCollectionId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @method static Builder|Product filters(array $filters = [])
 */
class Product extends Model
{
    use HasFactory;
    use Commentable;

    protected $fillable = [
        'brand_id',
        'group_id',
        'collection_id',
        'slug',
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
        'slug' => 'string',
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

    public function catalogs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Catalog::class, 'product_catalogs');
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function collection(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function page(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    public function pricesStatusOn(): HasMany
    {
        return $this->hasMany(Price::class)->where('status', 1);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        return $this
            ->where('products.status', 1)
            ->when($filters['catalogs'] ?? [], static function (Builder $query, $catalogs) {
                $query
                    ->join('product_catalogs', 'products.id', '=', 'product_catalogs.product_id')
                    ->whereIn('product_catalogs.catalog_id', $catalogs);
            })
            ->when($filters['brands'] ?? [], static function (Builder $query, $brands) {
                $query->whereIn('products.brand_id', $brands);
            })->when($filters['groups'] ?? [], static function (Builder $query, $groups) {
                $query->whereIn('products.group_id', $groups);
            })->when($filters['collections'] ?? [], static function (Builder $query, $collections) {
                $query->whereIn('products.collection_id', $collections);
            })->join('prices', static function (JoinClause $query) use ($filters) {
                $query->whereRaw('products.id=prices.product_id');
                $query->where('prices.status', 1);
                $query->orderBy('prices.sort_order');
                $query->when($filters['options'] ?? [], static function (JoinClause $query, $options) {

                    $query->join('properties', static function (JoinClause $q) {
                        $q->where('property_type', '=',
                            Price::getActualClassNameForMorph(Price::class));
                        $q->whereRaw('properties.property_id=prices.id');
                    });

                    $query->where(static function (JoinClause $q) use ($options) {
                        foreach ($options as $option_id => $value_idx) {
                            $q->orWhere(static function (JoinClause $q) use ($option_id, $value_idx) {
                                $value_idx = explode('|', $value_idx);
                                $q->where('properties.option_id', '=', $option_id)
                                    ->whereIn('properties.option_value_id', $value_idx);
                            });
                        }
                    });
                });
            })->groupBy(['products.id']);
    }
}
