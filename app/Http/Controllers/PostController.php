<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $data = Post::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($post){
                    $actionBtn = '
                    <div class="row">
                    <a href="/post/'.$post->id.'" class="mr-1 mt-1 detail btn btn-primary btn-sm">Detail</a> 
                    <a href="/post-edit/'.$post->id.'" class="mr-1 mt-1 edit btn btn-success btn-sm">Edit</a>

                    <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePostModal'.$post->id.'">
                       Hapus
                    </button>
  
                    <!-- Modal -->
                    <div class="modal fade" id="deletePostModal'.$post->id.'" tabindex="-1" role="dialog" aria-labelledby="deletePostModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deletePostModalLabel">Hapus Postingan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus postingan dibawah ini?
                                <p>
                                   <strong>
                                        '.$post->title.'
                                   </strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                               <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                               <form action="/post/'.$post->id.'" method="post">
                                    <input type="hidden" name="_token" value="'.csrf_token().'" /> 
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger">Hapus</button>
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

        return view('admin.post.post');
    }

    public function create(){
        return view('admin.post.post-add');
    }

    public function store(Request $request){
        $description = $request->description;
        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/images/posts/".time().$key.'.png';
            file_put_contents(public_path().$image_name, $data);

            $img->removeAttribute("src");
            $img->setAttribute("src", $image_name);
        }

        $description = $dom->saveHTML();
        $slug = Str::random(30);

        Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $description,
            'slug' => $slug,
            'user_id' => $request->user_id,
        ]);

        // if ($post) {
        //     Session::flash('createStatus', 'success');
        //     Session::flash('createStatusMessage', 'Berhasil Menambahkan Postingan');
        // }else{
        //     Session::flash('createStatus', 'failed');
        //     Session::flash('createStatusMessage', 'Gagal Menambahkan Postingan');
        // }

        return redirect('/post');
    }

    public function show($id){
        $post = Post::with('user')->findOrFail($id);
        return view('admin.post.post-detail', ['post' => $post]);
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('admin.post.post-edit', ['post'=> $post]);
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $description = $request->description;
        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if(strpos($img->getAttribute('src'),'data:image/') === 0) {
                $data = base64_decode(explode(',',explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/images/posts/".time().$key.'.png';
                file_put_contents(public_path().$image_name, $data);

                $img->removeAttribute("src");
                $img->setAttribute("src", $image_name);
            }
        }

        $description = $dom->saveHTML();

        $post->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $description,
        ]);

        return redirect('/post');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);

        $dom = new DOMDocument();
        $dom->loadHTML($post->description,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $post->delete();
        return redirect('/post');
    }

    // Artikel (User Section)
    public function showArtikel($slug){
        $post = Post::with('user')->where('slug','=', $slug)->get();
        if(count($post) == 0){
           return abort(404); 
        }
        return view('artikel', ['post' => $post]);
    }
}
