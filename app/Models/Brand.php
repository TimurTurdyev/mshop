<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function page(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }
}
