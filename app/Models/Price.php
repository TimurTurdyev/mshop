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
 */
class Price extends Model
{
    use HasFactory;
}
