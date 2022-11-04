<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $pageable_type
 * @property int $pageable_id
 * @property string $slug
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $text_html
 * @property-read Model|\Eloquent $pageable
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTextHtml($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PageFactory factory(...$parameters)
 */
class Page extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'pageable_id',
        'pageable_type',
        'meta_title',
        'meta_description',
        'text_html',
    ];

    public function pageable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
