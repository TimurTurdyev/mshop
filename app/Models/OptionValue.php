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
 */
class OptionValue extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'value',
        'image'
    ];

    protected $casts = [
        'value' => 'string',
        'image' => 'string',
    ];
}
