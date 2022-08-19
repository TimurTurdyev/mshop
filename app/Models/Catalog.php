<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|Catalog[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\Page $page
 * @property-read Catalog|null $parent
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog breadthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog depthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog getExpressionGrammar()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog hasChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog hasParent()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog isLeaf()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog isRoot()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog newModelQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog newQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog query()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog tree($maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog treeOf(callable $constraint, $maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog whereCreatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog whereId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog whereName($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog whereParentId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog whereStatus($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog whereUpdatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Catalog withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 * @mixin \Eloquent
 */
class Catalog extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getParentKeyName(): string
    {
        return 'parent_id';
    }

    public function page(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Page::class, 'pageable')->withDefault();
    }
}
