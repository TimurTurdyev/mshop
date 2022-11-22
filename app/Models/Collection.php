<?php

namespace App\Models;

use App\Models\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
