<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NewsController;
use App\Models\Bed;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Artikel
Route::get('/baca-artikel/{slug}', [ArticleController::class, 'showArtikel']);
Route::get('/baca-berita/{slug}', [NewsController::class, 'showNews']);

Route::middleware(['guest'])->group(function (){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('login');
});


Route::middleware(['auth'])->group(function (){
    Route::middleware('must-admin')->group(function (){
        Route::get('/dashboard', function () {
            $post = Post::all();
            $bed = Bed::all();
            $countPost = $post->count();
            $countBed = $bed->count();
            return view('admin.dashboard', [
                'countPost' => $countPost,
                'countBed' => $countBed
            ]); 
        });
        
        //Article Route
        Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/article-add', [ArticleController::class, 'create']);
        Route::post('/article', [ArticleController::class, 'store']);
        Route::get('/article/{id}', [ArticleController::class, 'show']);
        Route::get('/article-edit/{id}', [ArticleController::class, 'edit']);
        Route::patch('/article/{id}', [ArticleController::class, 'update']);
        Route::delete('/article/{id}', [ArticleController::class, 'destroy']);

        //News Route
        Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        Route::get('/news-add', [NewsController::class, 'create']);
        Route::post('/news', [NewsController::class, 'store']);
        Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::get('/news-edit/{id}', [NewsController::class, 'edit']);
        Route::patch('/news/{id}', [NewsController::class, 'update']);
        Route::delete('/news/{id}', [NewsController::class, 'destroy']);
        
        //Bed Route
        Route::get('/bed', [BedController::class,'index'])->name('beds.index');
        Route::post('/bed', [BedController::class,'store']);
        Route::patch('/bed/{id}', [BedController::class,'update']);
        Route::delete('/bed/{id}', [BedController::class, 'destroy']);
    });

    // Route::middleware('must-user')->group(function (){
    //     Route::get('/user', function () {
    //         return view('user.absen');
    //     });
    // });
   
    Route::get('/logout', [AuthController::class, 'logout']);
});
  