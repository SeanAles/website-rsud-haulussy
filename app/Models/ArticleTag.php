<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'usage_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'usage_count' => 'integer',
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
     * Relationship: Tag belongs to many posts (Many-to-Many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'article_tag', 'tag_id', 'post_id')
                    ->withTimestamps();
    }

    /**
     * Relationship: Tag belongs to many published posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publishedPosts()
    {
        return $this->belongsToMany(Post::class, 'article_tag', 'tag_id', 'post_id')
                    ->where('posts.category', '!=', null) // Keep existing logic for now
                    ->withTimestamps();
    }

    /**
     * Scope: Popular tags (order by usage_count desc)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopular($query, $limit = 10)
    {
        return $query->orderBy('usage_count', 'desc')->limit($limit);
    }

    /**
     * Scope: Tags with posts
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithPosts($query)
    {
        return $query->where('usage_count', '>', 0);
    }

    /**
     * Scope: Search tags by name
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }

    /**
     * Method: Increment usage count
     *
     * @return void
     */
    public function incrementUsage()
    {
        $this->increment('usage_count');
    }

    /**
     * Method: Decrement usage count
     *
     * @return void
     */
    public function decrementUsage()
    {
        if ($this->usage_count > 0) {
            $this->decrement('usage_count');
        }
    }

    /**
     * Method: Refresh usage count from actual posts
     *
     * @return void
     */
    public function refreshUsageCount()
    {
        $actualCount = $this->posts()->count();
        $this->update(['usage_count' => $actualCount]);
    }

    /**
     * Accessor: Get posts count (real-time)
     *
     * @return int
     */
    public function getPostsCountAttribute()
    {
        return $this->posts()->count();
    }

    /**
     * Method: Check if tag has posts
     *
     * @return bool
     */
    public function hasPosts()
    {
        return $this->posts()->exists();
    }

    /**
     * Method: Get tag badge HTML
     *
     * @return string
     */
    public function getBadgeHtml()
    {
        return '<span class="badge badge-secondary">' . $this->name . '</span>';
    }

    /**
     * Method: Get tag with count HTML
     *
     * @return string
     */
    public function getTagWithCountHtml()
    {
        return '<span class="tag-with-count">' . $this->name . ' <small>(' . $this->usage_count . ')</small></span>';
    }
}
