<?php

namespace App\Models;

use App\Models\Enums\CatalogEntityShowEnum;
use Database\Factories\CatalogFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Page $page
 * @method static CatalogFactory factory(...$parameters)
 * @method static Builder|Catalog newModelQuery()
 * @method static Builder|Catalog newQuery()
 * @method static Builder|Catalog query()
 * @method static Builder|Catalog whereCreatedAt($value)
 * @method static Builder|Catalog whereId($value)
 * @method static Builder|Catalog whereName($value)
 * @method static Builder|Catalog whereSlug($value)
 * @method static Builder|Catalog whereStatus($value)
 * @method static Builder|Catalog whereUpdatedAt($value)
 * @mixin Eloquent
 * @property CatalogEntityShowEnum $entity_show
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Collection[] $collections
 * @property-read int|null $collections_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static Builder|Catalog entityItems()
 * @method static Builder|Catalog whereEntityShow($value)
 */
class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'entity_show',
    ];

    protected $casts = [
        'status' => 'boolean',
        'entity_show' => CatalogEntityShowEnum::class
    ];

    public function page(): MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'collection_catalogs');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_catalogs');
    }

    public function scopeEntityItems(\Illuminate\Database\Eloquent\Builder $query)
    {
        /** @var self $model */
        $model = $query->getModel();
        if ($model->entity_show->name === 'collection') {
            return $model
                ->collections()
                ->where('status', 1)
                ->with([
                    'prices' => function (\Illuminate\Database\Eloquent\Relations\HasMany $query) {
                        $query->where('status', 1);
                        $query->orderBy('sort_order');
                    }
                ]);
        }

        return $model
            ->products()
            ->where('status', 1)
            ->with([
                'prices' => function (\Illuminate\Database\Eloquent\Relations\HasMany $query) {
                    $query->where('status', 1);
                    $query->orderBy('sort_order');
                },
                'prices.properties.optionGroup',
                'prices.properties.optionValue'
            ]);
    }
}
