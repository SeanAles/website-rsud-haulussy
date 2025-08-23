<?php

namespace App\Http\Controllers;

use App\Models\ArticleTag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display articles for a specific tag
     *
     * @param ArticleTag $tag
     * @return \Illuminate\View\View
     */
    public function show(ArticleTag $tag)
    {
        // Get articles that have this tag
        $articles = $tag->posts()
                       ->with(['articleCategory', 'user'])
                       ->where('category', '!=', null) // Only published articles
                       ->latest()
                       ->paginate(12);

        // Tag statistics for header display
        $tagData = [
            'name' => $tag->name,
            'total_articles' => $articles->total(),
            'total_views' => $tag->posts()->where('category', '!=', null)->sum('views'),
            'latest_article' => $tag->posts()->where('category', '!=', null)->latest()->first()
        ];

        return view('visitor.tags.show', compact('tag', 'articles', 'tagData'));
    }
}