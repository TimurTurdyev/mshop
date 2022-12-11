<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;

/**
 * App\Models\Collection
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property array $images
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Catalog[] $catalogs
 * @property-read int|null $catalogs_count
 * @property-read \App\Models\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|Collection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection query()
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $brand_id
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CollectionProperty[] $prices
 * @property-read int|null $collection_properties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $productsStatusOn
 * @property-read int|null $products_status_on_count
 * @method static \Database\Factories\CollectionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Collection whereBrandId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read int|null $prices_count
 */
class Collection extends Model
{
    use HasFactory;
    use Commentable;

    protected $fillable = [
        'slug',
        'brand_id',
        'name',
        'images',
        'status',
    ];

    protected $casts = [
        'slug' => 'string',
        'name' => 'string',
        'images' => 'array',
        'status' => 'boolean',
    ];

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function catalogs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Catalog::class, 'collection_catalogs');
    }

    public function page(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function productsStatusOn(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function prices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CollectionProperty::class);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        return $this
            ->where('collections.status', 1)
            ->when($filters['catalogs'] ?? [], static function (Builder $query, $catalogs) {
                $query
                    ->join('collection_catalogs', 'collections.id', '=', 'collection_catalogs.collection_id')
                    ->whereIn('collection_catalogs.catalog_id', $catalogs);
            })
            ->when($filters['brands'] ?? [], static function (Builder $query, $brands) {
                $query->whereIn('collections.brand_id', $brands);
            })->join('collection_properties', static function (JoinClause $query) use ($filters) {
                $query->whereRaw('collections.id=collection_properties.collection_id');
                $query->where('collection_properties.status', 1);
                $query->orderBy('collection_properties.sort_order');
                $query->when($filters['options'] ?? [], static function (JoinClause $query, $options) {

                    $query->join('properties', static function (JoinClause $q) {
                        $q->where('property_type', '=',
                            Price::getActualClassNameForMorph(Price::class));
                        $q->whereRaw('properties.property_id=collection_properties.id');
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
            })->groupBy(['collections.id']);
    }
}
