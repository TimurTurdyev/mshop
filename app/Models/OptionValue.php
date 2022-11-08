<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OptionValue
 *
 * @property int $id
 * @property int $option_id
 * @property string $value
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereValue($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\OptionValueFactory factory(...$parameters)
 */
class OptionValue extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'value_admin',
        'value',
        'image'
    ];

    protected $casts = [
        'value_admin' => 'string',
        'value' => 'string',
        'image' => 'string',
    ];

    public function options(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'option_value_to_options');
    }
}
