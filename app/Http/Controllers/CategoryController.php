<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Handle stats request
        if ($request->has('get_stats')) {
            return response()->json([
                'active_count' => ArticleCategory::where('is_active', true)->count(),
                'total_articles' => \App\Models\Post::whereNotNull('category_id')->count(),
            ]);
        }

        if ($request->ajax()) {
            $data = ArticleCategory::select('*')->orderBy('sort_order')->orderBy('name');
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('icon_preview', function ($category) {
                    return '<i class="' . $category->icon . '" style="color: ' . $category->color . '; font-size: 18px;"></i>';
                })
                ->addColumn('color_preview', function ($category) {
                    return '<span class="badge" style="background-color: ' . $category->color . '; color: white; padding: 5px 10px;">' . $category->color . '</span>';
                })
                ->addColumn('status', function ($category) {
                    $statusClass = $category->is_active ? 'success' : 'secondary';
                    $statusText = $category->is_active ? 'Aktif' : 'Nonaktif';
                    return '<span class="badge badge-' . $statusClass . '">' . $statusText . '</span>';
                })
                ->addColumn('posts_count', function ($category) {
                    return $category->posts_count . ' artikel';
                })
                ->addColumn('action', function ($category) {
                    $actionBtn = '
                    <div class="btn-group" role="group">
                        <a href="/categories/' . $category->slug . '" class="btn btn-primary btn-sm" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/categories/' . $category->slug . '/edit" class="btn btn-success btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCategoryModal' . $category->id . '" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteCategoryModal' . $category->id . '" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus kategori <strong>' . $category->name . '</strong>?</p>
                                    ' . ($category->posts_count > 0 ? '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Kategori ini memiliki ' . $category->posts_count . ' artikel. Artikel-artikel tersebut akan kehilangan kategori.</div>' : '') . '
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form style="display: inline;" method="POST" action="/categories/' . $category->slug . '">
                                        ' . csrf_field() . '
                                        ' . method_field('DELETE') . '
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    return $actionBtn;
                })
                ->rawColumns(['icon_preview', 'color_preview', 'status', 'action'])
                ->make(true);
        }

        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name',
            'description' => 'nullable|string|max:1000',
            'color' => 'required|regex:/^#[0-9A-F]{6}$/i',
            'icon' => 'required|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug from name
        $slug = Str::slug($request->name);
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while (ArticleCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $category = ArticleCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'color' => $request->color,
            'icon' => $request->icon,
            'is_active' => $request->has('is_active') ? true : false,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($category) {
            return redirect()->route('categories.index')
                           ->with('success', 'Kategori berhasil ditambahkan.');
        }

        return back()->with('error', 'Gagal menambahkan kategori.')
                    ->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleCategory $category)
    {
        // Load category with posts count
        $category->loadCount('posts');
        
        // Get articles in this category with tags
        $articles = $category->posts()
                           ->with(['tags'])
                           ->latest()
                           ->get();
        
        return view('admin.categories.show', compact('category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name,' . $category->id,
            'description' => 'nullable|string|max:1000',
            'color' => 'required|regex:/^#[0-9A-F]{6}$/i',
            'icon' => 'required|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Update slug if name changed
        if ($category->name !== $request->name) {
            $slug = Str::slug($request->name);
            
            // Ensure slug is unique (except current category)
            $originalSlug = $slug;
            $counter = 1;
            while (ArticleCategory::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $category->slug = $slug;
        }

        $updated = $category->update([
            'name' => $request->name,
            'slug' => $category->slug,
            'description' => $request->description,
            'color' => $request->color,
            'icon' => $request->icon,
            'is_active' => $request->has('is_active') ? true : false,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($updated) {
            return redirect()->route('categories.index')
                           ->with('success', 'Kategori berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal memperbarui kategori.')
                    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategory $category)
    {
        // Check if category has posts
        if ($category->posts()->exists()) {
            // Set category_id to null for posts in this category
            $category->posts()->update(['category_id' => null]);
        }

        $deleted = $category->delete();

        if ($deleted) {
            return redirect()->route('categories.index')
                           ->with('success', 'Kategori berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus kategori.');
    }

    /**
     * Display articles for a specific category (Public facing)
     *
     * @param ArticleCategory $category
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showPublic(ArticleCategory $category, Request $request)
    {
        // Build query for articles with this category
        $query = $category->posts()
                    ->with(['articleCategory', 'user', 'tags'])
                    ->where('category', '=', 'article'); // Only published articles

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

        // Category statistics for header display
        $categoryData = [
            'name' => $category->name,
            'description' => $category->description,
            'icon' => $category->icon,
            'color' => $category->color,
            'total_articles' => $articles->total(),
            'latest_article' => $category->posts()->where('category', '=', 'article')->latest()->first()
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
                        <i class="' . $category->icon . ' fa-3x mb-3" style="color: ' . $category->color . ';"></i>
                        <h3 class="mb-3">Tidak ada artikel ditemukan</h3>
                        <p class="text-muted mb-4">Maaf, tidak ada artikel dalam kategori "' . $category->name . '"' . ($request->search ? ' yang sesuai dengan pencarian "' . $request->search . '"' : '') . '</p>
                        ' . ($request->search ? '<button type="button" id="backToAllArticles" class="btn btn-primary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua artikel dalam kategori ' . $category->name . '
                        </button>' : '') . '
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

        return view('visitor.categories.show', compact('category', 'articles', 'categoryData'))->with('searchTerm', $request->search ?? '');
    }
}
