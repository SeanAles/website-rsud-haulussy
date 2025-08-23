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
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(ArticleTag $tag, Request $request)
    {
        // Build query for articles with this tag
        $query = $tag->posts()
                    ->with(['articleCategory', 'user'])
                    ->where('category', '!=', null); // Only published articles

        // Search functionality - same as artikel page
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('author', 'LIKE', "%{$searchTerm}%");
            });
        }

        $articles = $query->latest()->paginate(6);

        // Preserve search parameter in pagination
        if ($request->has('search')) {
            $articles->appends(['search' => $request->search]);
        }

        // Tag statistics for header display
        $tagData = [
            'name' => $tag->name,
            'total_articles' => $articles->total(),
            'total_views' => $tag->posts()->where('category', '!=', null)->sum('views'),
            'latest_article' => $tag->posts()->where('category', '!=', null)->latest()->first()
        ];

        // Handle AJAX requests - same as artikel page
        if ($request->ajax() || $request->has('ajax')) {
            $html = '';
            $count = $articles->total();
            
            if ($articles->count() > 0) {
                foreach ($articles as $article) {
                    $html .= view('visitor.components.content-card', [
                        'type' => 'artikel',
                        'item' => $article
                    ])->render();
                }
            } else {
                $html = '<div class="col-12 text-center py-5">
                    <div class="no-results">
                        <i class="fas fa-hashtag fa-3x mb-3 text-muted"></i>
                        <h3 class="mb-3">Tidak ada artikel ditemukan</h3>
                        <p class="text-muted mb-4">Maaf, tidak ada artikel dengan topik "' . $tag->name . '" yang sesuai dengan pencarian "' . $request->search . '"</p>
                        <button type="button" id="backToAllArticles" class="btn btn-primary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua artikel dengan topik ' . $tag->name . '
                        </button>
                    </div>
                </div>';
            }
            
            $pagination = $articles->appends(['search' => $request->search])->links()->toHtml();
            
            return response()->json([
                'html' => $html,
                'count' => $count,
                'pagination' => $pagination
            ]);
        }

        return view('visitor.tags.show', compact('tag', 'articles', 'tagData'))->with('searchTerm', $request->search ?? '');
    }
}