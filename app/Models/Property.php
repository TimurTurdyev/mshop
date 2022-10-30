<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Property
 *
 * @property int $id
 * @property int $price_id
 * @property int|null $option_id
 * @property int|null $option_value_id
 * @property-read \App\Models\Option|null $option
 * @property-read \App\Models\OptionValue|null $value
 * @method static \Database\Factories\PropertyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereOptionValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePriceId($value)
 * @mixin \Eloquent
 */
class Property extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'price_id',
        'option_id',
        'option_value_id',
    ];

    public function option(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Option::class);
    }

    public function value(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OptionValue::class);
    }
}
