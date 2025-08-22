<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'icon',
        'is_active',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relationship: Category has many posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    /**
     * Relationship: Category has many published posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publishedPosts()
    {
        return $this->hasMany(Post::class, 'category_id')
                    ->where('category', '!=', null); // For now, keep existing posts logic
    }

    /**
     * Scope: Only active categories
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Order by sort_order
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    /**
     * Accessor: Get icon HTML
     *
     * @return string
     */
    public function getIconHtmlAttribute()
    {
        return '<i class="' . $this->icon . '" style="color: ' . $this->color . '"></i>';
    }

    /**
     * Accessor: Get posts count
     *
     * @return int
     */
    public function getPostsCountAttribute()
    {
        return $this->posts()->count();
    }

    /**
     * Accessor: Get published posts count
     *
     * @return int
     */
    public function getPublishedPostsCountAttribute()
    {
        return $this->publishedPosts()->count();
    }

    /**
     * Method: Check if category has posts
     *
     * @return bool
     */
    public function hasPosts()
    {
        return $this->posts()->exists();
    }

    /**
     * Method: Get category badge HTML
     *
     * @return string
     */
    public function getBadgeHtml()
    {
        return '<span class="badge" style="background-color: ' . $this->color . '; color: white;">' 
               . $this->icon_html . ' ' . $this->name . 
               '</span>';
    }
}
