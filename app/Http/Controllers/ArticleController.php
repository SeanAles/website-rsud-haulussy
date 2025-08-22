<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $category = "article";
        if ($request->ajax()) {
            $data = Post::select('*')->where('category', '=', $category);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($article) {
                    $actionBtn = '
                    <div class="row">
                    <a href="/article/' . $article->id . '" class="mr-1 mt-1 detail btn btn-primary btn-sm">Detail</a>
                    <a href="/article-edit/' . $article->id . '" class="mr-1 mt-1 edit btn btn-success btn-sm">Edit</a>

                    <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteArticleModal' . $article->id . '">
                       Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteArticleModal' . $article->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteArticleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteArticleModalLabel">Hapus Artikel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus artikel dibawah ini?
                                <p>
                                   <strong>' . $article->title . '</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteArticle' . $article->id . '" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteArticle' . $article->id . '">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                    <button type="button" onclick="deleteArticle(' . $article->id . ')" class="btn btn-danger" id="deleteArticleButton' . $article->id . '">Hapus</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    ';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.article.article');
    }

    public function create()
    {
        $categories = \App\Models\ArticleCategory::active()->ordered()->get();
        return view('admin.article.article-add', compact('categories'));
    }

    public function store(Request $request)
    {
        $description = $request->description;

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();

        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/images/article/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute("src");
                $img->setAttribute("src", $image_name);
            }
        }

        $description = $dom->saveHTML();
        $slug = Str::random(10);


        $thumbnail = "";
        if ($request->file("thumbnail")) {
            $thumbnail  = time() . "." . $request->file("thumbnail")->extension();
        }

        $article = Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'thumbnail' => $thumbnail,
            'description' => $description,
            'slug' => $slug,
            'user_id' => $request->user_id,
            'category' => $request->category,
            'category_id' => $request->category_id, // NEW: Category relationship
        ]);

        $file = $request->file('thumbnail');
        $file->storeAs('images/article/thumbnails/', $thumbnail);

        // Handle tags
        if ($request->filled('tags')) {
            $this->attachTagsToArticle($article, $request->tags);
        }

        if ($article) {
            return response()->json(['redirect_url' => '/article']);
        }

        return response()->json(['message' => 'Gagal Menambahkan Artikel'], 401);
    }

    public function show($id)
    {
        $article = Post::with('user')->findOrFail($id);
        return view('admin.article.article-detail', ['article' => $article]);
    }

    public function edit($id)
    {
        $article = Post::with(['articleCategory', 'tags'])->findOrFail($id);
        $categories = \App\Models\ArticleCategory::active()->ordered()->get();
        return view('admin.article.article-edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $article = Post::findOrFail($id);

            // Validasi data yang diterima
            if (!$request->has('title') || trim($request->title) === '') {
                return response()->json(['message' => 'Judul artikel tidak boleh kosong'], 422);
            }

            if (!$request->has('author') || trim($request->author) === '') {
                return response()->json(['message' => 'Pembuat artikel tidak boleh kosong'], 422);
            }

            $description = $request->description;

            // Validasi description
            if (empty($description)) {
                return response()->json(['message' => 'Konten artikel tidak boleh kosong'], 422);
            }

            // Proses HTML dan gambar
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML('<?xml encoding="utf-8" ?>' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            $images = $dom->getElementsByTagName('img');

            foreach ($images as $key => $img) {
                if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                    $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                    $image_name = "/images/article/" . time() . $key . '.png';
                    file_put_contents(public_path() . $image_name, $data);

                    $img->removeAttribute("src");
                    $img->setAttribute("src", $image_name);
                }
            }

            $description = $dom->saveHTML();

            // Data untuk update artikel
            $updateData = [
                'title' => $request->title,
                'author' => $request->author,
                'description' => $description,
                'category_id' => $request->category_id, // NEW: Category relationship
            ];

            // Handle thumbnail jika ada
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');

                // Validasi file
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                if (!in_array(strtolower($file->getClientOriginalExtension()), $allowedExtensions)) {
                    return response()->json(['message' => 'Thumbnail harus memiliki ekstensi JPG, JPEG, atau PNG'], 422);
                }

                if ($file->getSize() > 1048576) { // 1MB = 1048576 bytes
                    return response()->json(['message' => 'Ukuran thumbnail maksimal 1024 KB'], 422);
                }

                // Hapus thumbnail lama jika ada
                $oldThumbnailPath = public_path() . "/images/article/thumbnails/" . $article->thumbnail;
                if ($article->thumbnail && File::exists($oldThumbnailPath)) {
                    File::delete($oldThumbnailPath);
                }

                // Generate nama file baru dan simpan
                $thumbnail = time() . "." . $file->getClientOriginalExtension();
                $file->storeAs('images/article/thumbnails/', $thumbnail);

                // Tambahkan ke data update
                $updateData['thumbnail'] = $thumbnail;
            }

            // Update artikel
            $editArticle = $article->update($updateData);

            if ($editArticle) {
                // Handle tags update
                if ($request->has('tags')) {
                    $this->attachTagsToArticle($article, $request->tags);
                }
                
                return response()->json(['message' => 'Artikel berhasil diperbarui', 'redirect_url' => '/article']);
            }

            return response()->json(['message' => 'Gagal mengedit artikel'], 500);
        } catch (\Exception $e) {
            error_log('Error update article: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $article = Post::findOrFail($id);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $article->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); // menggantkan prmeter 9
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $pathThumbnail = public_path() . "/images/article/thumbnails/" . $article->thumbnail;
        if (File::exists($pathThumbnail)) {
            File::delete($pathThumbnail);
        }

        $deleteArticle = $article->delete();
        if ($deleteArticle) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Data.']);
        }

        return response()->json(['message' => 'Gagal Menghapus Data'], 401);
    }

    // Artikel (VisitorSection)
    public function indexArtikel(Request $request)
    {
        $query = Post::with(['articleCategory', 'tags'])->where('category', '=', 'article');

        // Pencarian artikel berdasarkan judul dan penulis
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('author', 'LIKE', "%{$searchTerm}%");
            });
        }

        $articles = $query->orderByDesc('created_at')->paginate(6);

        // Mempertahankan parameter pencarian pada pagination
        if ($request->has('search')) {
            $articles->appends(['search' => $request->search]);
        }

        // Jika request AJAX, mengmblikan hanya HTML yang diperlukan
        if ($request->ajax() || $request->has('ajax')) {
            $html = '';
            $count = $articles->total();

            if ($articles->count() > 0) {
                foreach ($articles as $article) {
                    $html .= view('visitor.informasi._article_card', [
                        'article' => $article
                    ])->render();
                }
            } else {
                $html = '<div class="col-12 text-center py-5">
                    <div class="no-results">
                        <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                        <h3 class="mb-3">Tidak ada artikel ditemukan</h3>
                        <p class="text-muted mb-4">Maaf, tidak ada artikel yang sesuai dengan pencarian "' . $request->search . '"</p>
                        <button type="button" id="backToAllArticles" class="btn btn-primary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua artikel
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

        return view('visitor.informasi.daftar-artikel', [
            'articles' => $articles,
            'searchTerm' => $request->search ?? ''
        ]);
    }

    public function showArtikel($slug)
    {
        // Load artikel dengan category dan tags relationships
        $article = Post::with(['user', 'articleCategory', 'tags'])->where('slug', '=', $slug)->first();
        
        if (!$article) {
            return abort(404);
        }

        // Load artikel lainnya dengan category dan tags, prioritaskan artikel dengan category yang sama
        $articles = Post::with(['articleCategory', 'tags'])
            ->where([['slug', '!=', $slug], ['category', '=', 'article']])
            ->when($article->category_id, function($query) use ($article) {
                // Artikel dengan kategori yang sama diprioritaskan
                return $query->orderByRaw('category_id = ? DESC', [$article->category_id]);
            })
            ->orderByDesc('created_at')
            ->limit(8) // Batasi jumlah artikel lainnya
            ->get();

        // Mekanisme anti-spam untuk view counter
        $sessionKey = 'article_' . $article->id . '_viewed';

        if (!session()->has($sessionKey)) {
            // Increment view counter hanya jika artikel belum dilihat dalam session ini
            $article->increment('views');

            // Set session untuk mencatat bahwa artikel ini sudah dilihat
            // Session akan berakhir saat browser ditutup atau setelah 24 jam
            session()->put($sessionKey, true);
            session()->save();
        }

        return view('visitor.informasi.baca-artikel', ['articles' => $articles, 'article' => $article]);
    }

    /**
     * Helper method to attach tags to article
     */
    private function attachTagsToArticle($article, $tagsString)
    {
        if (empty($tagsString)) {
            // If tags empty, remove all tags
            $article->tags()->detach();
            return;
        }

        // Parse tags from comma-separated string
        $tagNames = array_map('trim', explode(',', $tagsString));
        $tagIds = [];

        foreach ($tagNames as $tagName) {
            if (empty($tagName)) continue;

            // Generate slug for tag
            $tagSlug = \Illuminate\Support\Str::slug($tagName);
            
            // Find or create tag
            $tag = \App\Models\ArticleTag::firstOrCreate(
                ['slug' => $tagSlug],
                ['name' => $tagName]
            );
            
            $tagIds[] = $tag->id;
        }

        // Sync tags (this will remove old tags and add new ones)
        $article->tags()->sync($tagIds);

        // Update usage count for all tags
        foreach ($tagIds as $tagId) {
            $tag = \App\Models\ArticleTag::find($tagId);
            if ($tag) {
                $tag->refreshUsageCount();
            }
        }
    }

    /**
     * API endpoint for tag search (autocomplete)
     */
    public function searchTags(Request $request)
    {
        $search = $request->get('q', '');
        
        if (empty($search)) {
            return response()->json([]);
        }

        $tags = \App\Models\ArticleTag::search($search)
                    ->take(10)
                    ->get(['id', 'name', 'slug', 'usage_count'])
                    ->map(function($tag) {
                        return [
                            'id' => $tag->id,
                            'text' => $tag->name,
                            'usage_count' => $tag->usage_count,
                        ];
                    });

        return response()->json($tags);
    }
}
