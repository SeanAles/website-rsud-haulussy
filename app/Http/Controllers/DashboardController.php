<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Event;
use App\Models\Post;
use App\Models\Promkes;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with quick insights.
     */
    public function index(Request $request)
    {
        // Basic statistics
        $article = Post::where('category', '=', 'article')->get();
        $articleCount = $article->count();

        $news = Post::where('category', '=', 'news')->get();
        $newsCount = $news->count();

        $bed = Bed::all();
        $bedCount = $bed->count();

        $events = Event::all();
        $eventCount = $events->count();

        // Quick analytics for dashboard overview
        $totalViews = Post::where('category', 'article')->sum('views');
        $avgViews = Post::where('category', 'article')->avg('views');
        $recentTrending = $this->getRecentTrending(3); // Just count for dashboard

        return view('admin.dashboard.dashboard', [
            'articleCount' => $articleCount,
            'newsCount' => $newsCount,
            'bedCount' => $bedCount,
            'eventCount' => $eventCount,
            'totalViews' => $totalViews,
            'avgViews' => round($avgViews, 1),
            'recentTrending' => $recentTrending
        ]);
    }

    /**
     * Get comprehensive analytics data
     */
    private function getAnalyticsData()
    {
        return [
            'topArticles' => $this->getTopArticles(),
            'totalViews' => $this->getTotalViews(),
            'avgViews' => $this->getAverageViews(),
            'categoryStats' => $this->getCategoryStats(),
            'recentTrending' => $this->getRecentTrending(),
            'viewDistribution' => $this->getViewDistribution()
        ];
    }

    /**
     * Get top 10 articles by views
     */
    private function getTopArticles($limit = 10)
    {
        return Post::select('id', 'title', 'slug', 'views', 'category', 'created_at')
            ->where('category', 'article')
            ->where('views', '>', 0)
            ->orderBy('views', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($article) {
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'views' => $article->views,
                    'category' => $article->category,
                    'created_at' => $article->created_at->format('d M Y'),
                    'formatted_views' => number_format($article->views)
                ];
            });
    }

    /**
     * Get total views for all articles
     */
    private function getTotalViews()
    {
        return Post::where('category', 'article')
            ->sum('views');
    }

    /**
     * Get average views per article
     */
    private function getAverageViews()
    {
        $avgViews = Post::where('category', 'article')
            ->avg('views');

        return round($avgViews, 1);
    }

    /**
     * Get view statistics by category
     */
    private function getCategoryStats()
    {
        return DB::table('posts as p')
            ->select(
                'ac.name as category_name',
                'ac.color as category_color',
                DB::raw('COUNT(p.id) as article_count'),
                DB::raw('SUM(p.views) as total_views'),
                DB::raw('ROUND(AVG(p.views), 1) as avg_views')
            )
            ->leftJoin('article_categories as ac', 'p.category_id', '=', 'ac.id')
            ->where('p.category', 'article')
            ->whereNotNull('p.category_id')
            ->groupBy('ac.id', 'ac.name', 'ac.color')
            ->orderBy('total_views', 'desc')
            ->get()
            ->map(function ($stat) {
                return [
                    'name' => $stat->category_name ?: 'Uncategorized',
                    'color' => $stat->category_color ?: '#6c757d',
                    'article_count' => $stat->article_count,
                    'total_views' => $stat->total_views,
                    'avg_views' => round($stat->avg_views, 1),
                    'formatted_total_views' => number_format($stat->total_views)
                ];
            });
    }

    /**
     * Get recently trending articles (published in last 30 days with good views)
     */
    private function getRecentTrending($limit = 5)
    {
        return Post::select('id', 'title', 'slug', 'views', 'created_at')
            ->where('category', 'article')
            ->where('created_at', '>=', now()->subDays(30))
            ->where('views', '>', 0)
            ->orderBy('views', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($article) {
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'views' => $article->views,
                    'created_at' => $article->created_at->format('d M Y'),
                    'formatted_views' => number_format($article->views),
                    'days_ago' => $article->created_at->diffForHumans()
                ];
            });
    }

    /**
     * Get view distribution data for charts
     */
    private function getViewDistribution()
    {
        $articles = Post::where('category', 'article')->where('views', '>', 0)->get();

        if ($articles->isEmpty()) {
            return [
                'ranges' => ['0-100', '101-500', '501-1000', '1000-5000', '5000+'],
                'counts' => [0, 0, 0, 0, 0]
            ];
        }

        $ranges = [
            '0-100' => 0,
            '101-500' => 0,
            '501-1000' => 0,
            '1000-5000' => 0,
            '5000+' => 0
        ];

        foreach ($articles as $article) {
            if ($article->views <= 100) {
                $ranges['0-100']++;
            } elseif ($article->views <= 500) {
                $ranges['101-500']++;
            } elseif ($article->views <= 1000) {
                $ranges['501-1000']++;
            } elseif ($article->views <= 5000) {
                $ranges['1000-5000']++;
            } else {
                $ranges['5000+']++;
            }
        }

        return [
            'ranges' => array_keys($ranges),
            'counts' => array_values($ranges)
        ];
    }

    /**
     * API endpoint for real-time analytics data
     */
    public function analyticsData(Request $request)
    {
        $data = $this->getAnalyticsData();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}