<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use DOMDocument;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // Jika request dari visitor (tidak ada parameter admin)
        if (!$request->has('admin')) {
            $query = Post::where('category', 'news');

            // Pencarian berita berdasarkan judul dan penulis
            if ($request->has('search') && $request->search != '') {
                $searchTerm = $request->search;
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('author', 'LIKE', "%{$searchTerm}%");
                });
            }

            $news = $query->latest()->paginate(6);

            // Mempertahankan parameter pencarian pada pagination
            if ($request->has('search')) {
                $news->appends(['search' => $request->search]);
            }

            // Jika request AJAX, mengembalikan hanya HTML yang diperlukan
            if ($request->ajax() || $request->has('ajax')) {
                $html = '';
                $count = $news->total();

                if ($news->count() > 0) {
                    foreach ($news as $new) {
                        $html .= view('visitor.informasi._news_card', [
                            'news' => $new
                        ])->render();
                    }
                } else {
                    $html = '<div class="col-12 text-center py-5">
                        <div class="no-results">
                            <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                            <h3 class="mb-3">Tidak ada berita ditemukan</h3>
                            <p class="text-muted mb-4">Maaf, tidak ada berita yang sesuai dengan pencarian "' . $request->search . '"</p>
                            <button type="button" id="backToAllNews" class="btn btn-primary">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua berita
                            </button>
                        </div>
                    </div>';
                }

                $pagination = $news->appends(['search' => $request->search])->links()->toHtml();

                return response()->json([
                    'html' => $html,
                    'count' => $count,
                    'pagination' => $pagination
                ]);
            }

            return view('visitor.informasi.daftar-berita', [
                'news' => $news,
                'searchTerm' => $request->search ?? ''
            ]);
        }

        // Jika request dari admn
         $category = "news";
        if ($request->ajax()) {
            $data = Post::select('*')->where('category', '=', $category);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($news) {
                    $actionBtn = '
                    <div class="row">
                    <a href="/news/' . $news->id . '" class="mr-1 mt-1 detail btn btn-primary btn-sm">Detail</a>
                    <a href="/news-edit/' . $news->id . '" class="mr-1 mt-1 edit btn btn-success btn-sm">Edit</a>

                    <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteNewsModal' . $news->id . '">
                       Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteNewsModal' . $news->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteNewsModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteNewsModalLabel">Hapus Berita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus berita dibawah ini?
                                <p>
                                   <strong>' . $news->title . '</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteNews' . $news->id . '" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteNews' . $news->id . '">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                    <button type="button" onclick="deleteNews(' . $news->id . ')" class="btn btn-danger" id="deleteNewsButton' . $news->id . '">Hapus</button>
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

        return view('admin.news.news');
    }

    public function show($slugOrId)
    {
        // Jika parameter adalah slug (untuk pengunjung)
        if (!is_numeric($slugOrId)) {
            $new = Post::where('slug', $slugOrId)->firstOrFail();

            // Mekanisme anti-spam untuk view counter
            $sessionKey = 'news_' . $new->id . '_viewed';

            if (!session()->has($sessionKey)) {
                // Increment view counter hanya jika berita belum dilihat dalam session ini
                $new->increment('views');

                // Set session untuk mencatat bahwa berita ini sudah dilihat
                session()->put($sessionKey, true);
                session()->save();
            }

            $news = Post::where('category', 'news')
                ->where('id', '!=', $new->id)
                ->latest()
                ->take(3)
                ->get();

            return view('visitor.informasi.baca-berita', compact('new', 'news'));
        }

        // Jika parameter adalah ID (untuk admin)
        $news = Post::with('user')->findOrFail($slugOrId);
        return view('admin.news.news-detail', ['news' => $news]);
    }

    public function create()
    {
        return view('admin.news.news-add');
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
                $image_name = "/images/news/" . time() . $key . '.png';
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

        $news = Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'thumbnail' => $thumbnail,
            'description' => $description,
            'slug' => $slug,
            'user_id' => $request->user_id,
            'category' => $request->category,
        ]);

        $file = $request->file('thumbnail');
        $file->storeAs('images/news/thumbnails/', $thumbnail);

        if ($news) {
            return response()->json(['redirect_url' => '/news']);
        }

        return response()->json(['message' => 'Gagal Menambahkan Berita'], 401);
    }

    public function edit($id)
    {
        $news = Post::findOrFail($id);
        return view('admin.news.news-edit', ['news' => $news]);
    }

    public function update(Request $request, $id)
    {
        $news = Post::findOrFail($id);
        $description = $request->description;

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();

        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/images/news/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute("src");
                $img->setAttribute("src", $image_name);
            }
        }

        $description = $dom->saveHTML();

        // Handle thumbnail upload
        $updateData = [
            'title' => $request->title,
            'author' => $request->author,
            'description' => $description,
        ];

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($news->thumbnail) {
                $oldThumbnailPath = public_path('images/news/thumbnails/' . $news->thumbnail);
                if (File::exists($oldThumbnailPath)) {
                    File::delete($oldThumbnailPath);
                }
            }

            // Save new thumbnail
            $thumbnail = time() . "." . $request->file("thumbnail")->extension();
            $request->file('thumbnail')->storeAs('images/news/thumbnails/', $thumbnail);
            $updateData['thumbnail'] = $thumbnail;
        }

        $editNews = $news->update($updateData);

        if ($editNews) {
            return response()->json(['redirect_url' => '/news']);
        }

        return response()->json(['message' => 'Gagal Mengedit Berita'], 401);
    }

    public function destroy($id)
    {
        $news = Post::findOrFail($id);

        $dom = new DOMDocument();
        $dom->loadHTML($news->description, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $pathThumbnail = public_path() . "/images/news/thumbnails/" . $news->thumbnail;
        if (File::exists($pathThumbnail)) {
            File::delete($pathThumbnail);
        }

        $deleteNews = $news->delete();
        if ($deleteNews) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Data.']);
        }

        return response()->json(['message' => 'Gagal Menghapus Data'], 401);
    }


}
