<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ProductCatalog
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCatalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCatalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCatalog query()
 * @mixin \Eloquent
 */
class ProductCatalog extends Pivot
{
    use HasFactory;
}
