<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "thumbnail",
        "author",
        "slug",
        "user_id",
        "category",
        "category_id", // NEW: Foreign key to article_categories
        "views"
    ];

    protected $attributes = [
        'views' => 0
    ];

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }

    /**
     * Alias for articleCategory (backward compatibility)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->articleCategory();
    }

    /**
     * Post belongs to many tags (Many-to-Many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(ArticleTag::class, 'article_tag', 'post_id', 'tag_id')
                    ->withTimestamps();
    }

    /**
     * Scope: Filter by category
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $categoryId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope: Filter by category slug
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $categorySlug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCategorySlug($query, $categorySlug)
    {
        return $query->whereHas('articleCategory', function($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    /**
     * Scope: Filter by tag
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $tagId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByTag($query, $tagId)
    {
        return $query->whereHas('tags', function($q) use ($tagId) {
            $q->where('article_tags.id', $tagId);
        });
    }

    /**
     * Scope: Filter by tag slug
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $tagSlug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByTagSlug($query, $tagSlug)
    {
        return $query->whereHas('tags', function($q) use ($tagSlug) {
            $q->where('slug', $tagSlug);
        });
    }

    /**
     * Scope: Articles only (existing logic)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArticles($query)
    {
        return $query->where('category', 'article');
    }

    /**
     * Scope: News only (existing logic)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNews($query)
    {
        return $query->where('category', 'news');
    }

    /**
     * Scope: Published posts (with category)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('category');
    }

    /**
     * Scope: With category relationship
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithCategory($query)
    {
        return $query->with('articleCategory');
    }

    /**
     * Scope: With tags relationship
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithTags($query)
    {
        return $query->with('tags');
    }

    /**
     * Method: Get category name (backward compatible)
     *
     * @return string
     */
    public function getCategoryName()
    {
        if ($this->articleCategory) {
            return $this->articleCategory->name;
        }
        
        // Fallback to old string category
        return ucfirst($this->category);
    }

    /**
     * Method: Get category badge HTML
     *
     * @return string
     */
    public function getCategoryBadge()
    {
        if ($this->articleCategory) {
            return $this->articleCategory->getBadgeHtml();
        }
        
        // Fallback for old categories
        return '<span class="badge badge-secondary">' . ucfirst($this->category) . '</span>';
    }

    /**
     * Method: Get tags as comma-separated string
     *
     * @return string
     */
    public function getTagsList()
    {
        return $this->tags->pluck('name')->implode(', ');
    }

    /**
     * Method: Check if post has tags
     *
     * @return bool
     */
    public function hasTags()
    {
        return $this->tags()->exists();
    }
}
