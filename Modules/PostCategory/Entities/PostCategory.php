<?php

namespace Modules\PostCategory\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Post\Entities\Post;
use Modules\Post\Filters\PostFilter;
use Modules\PostCategory\Filter\PostCategoryFilter;
use Modules\PostCategory\Filter\ProductCategoryFilter;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected static function newFactory() {
        return \Modules\PostCategory\Database\factories\PostCategoryFactory::new();
    }

    /**
     * Generate slug from defined source field
     */
    public function sluggable(): array {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => ['name', 'id'],
                'includeTrashed' => true,
            ]
        ];
    }


    protected $fillable = [
        'name', 'parent_id', 'description', 'slug', 'image', 'status', 'tags'
    ];

    protected $casts = ['image' => 'array'];


    /**
     * Filter
     */
    public function scopeFilter(Builder $builder, $request): Builder {
        return (new PostCategoryFilter($request))->filter($builder);
    }

    /**
     * relations
     */
    // category parent
    public function parent() {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    // category children
    public function children() {
        return $this->hasMany($this, 'parent_id')->with('children');
    }

    // posts
    public function posts() {
        return $this->hasMany(Post::class, 'category_id');
    }

}
