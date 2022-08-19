<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Option
 *
 * @property int $id
 * @property string $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionValue[] $optionValues
 * @property-read int|null $option_values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @mixin \Eloquent
 */
class Option extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'group',
    ];

    protected $casts = [
        'group' => 'string'
    ];

    public function optionValues(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OptionValue::class);
    }
}
