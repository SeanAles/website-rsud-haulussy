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
    public function create()
    {
        return view('admin.news.news-add');
    }

    public function store(Request $request)
    {
        $description = $request->description;
        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/images/news/" . time() . $key . '.png';
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute("src");
            $img->setAttribute("src", $image_name);
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

    public function show($id)
    {
        $news = Post::with('user')->findOrFail($id);
        return view('admin.news.news-detail', ['news' => $news]);
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
        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

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

        $editNews = $news->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $description,
        ]);

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

    // News (User Section)
    public function indexBerita()
    {
        $news = Post::where('category', '=', 'news')->orderByDesc('created_at')->paginate(4);

        return view('visitor.informasi.daftar-berita', ['news' => $news]);
    }

    public function showBerita($slug)
    {
        $new = Post::with('user')->where('slug', '=', $slug)->first();
        $news = Post::where([['slug', '!=', $slug], ['category', '=', 'news']])->orderByDesc('created_at')->get();

        if (!$new) {
            return abort(404);
        }

        return view('visitor.informasi.baca-berita', ['news' => $news, 'new' => $new]);
    }
}
