<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
