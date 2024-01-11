<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;
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
                                <button type="button" id="cancelDeleteArticle'.$article->id.'" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteArticle'.$article->id.'">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <button type="button" onclick="deleteArticle('.$article->id.')" class="btn btn-danger" id="deleteArticleButton'.$article->id.'">Hapus</button>
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
        return view('admin.article.article-add');
    }

    public function store(Request $request)
    {
        $description = $request->description;
        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/images/article/" . time() . $key . '.png';
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute("src");
            $img->setAttribute("src", $image_name);
        }

        $description = $dom->saveHTML();
        $slug = Str::random(30);

        
        $thumbnail = "";
        if($request->file("thumbnail")){
            $thumbnail  = time(). "." . $request->file("thumbnail")->extension();
        }
        
        $article = Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'thumbnail' => $thumbnail,
            'description' => $description,
            'slug' => $slug,
            'user_id' => $request->user_id,
            'category' => $request->category,
        ]);

        $file = $request->file('thumbnail');
        $file->storeAs('images/article/thumbnails/', $thumbnail);

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
        $article = Post::findOrFail($id);
        return view('admin.article.article-edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        $description = $request->description;
        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

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

        $editArticle = $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $description,
        ]);

        if ($editArticle) {
            return response()->json(['redirect_url' => '/article']);
        }

        return response()->json(['message' => 'Gagal Mengedit Artikel'], 401);
    }

    public function destroy($id)
    {
        $article = Post::findOrFail($id);

        $dom = new DOMDocument();
        $dom->loadHTML($article->description, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $pathThumbnail = public_path()."/images/article/thumbnails/".$article->thumbnail;
        if (File::exists($pathThumbnail)) {
            File::delete($pathThumbnail);
        }

        $deleteArticle = $article->delete();
        if($deleteArticle){
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Data.']);
        }

        return response()->json(['message' => 'Gagal Menghapus Data'], 401);
    }

    // Artikel (VisitorSection)
    public function indexArtikel(){
        $articles = Post::where('category', '=', 'article')->orderByDesc('created_at')->paginate(4);
        
        return view('visitor.informasi.daftar-artikel', ['articles' => $articles ]);
    }
    
    public function showArtikel($slug)
    {
        $article = Post::with('user')->where('slug', '=', $slug)->first();
        $articles = Post::where([['slug', '!=', $slug], ['category', '=', 'article']])->orderByDesc('created_at')->get();
        
        if(!$article){
            return abort(404);
        }

        return view('visitor.informasi.baca-artikel', ['articles' => $articles, 'article' => $article]);
    }
}