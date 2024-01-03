<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('prevent.back.history');
    Route::post('/login', [AuthController::class, 'auth'])->name('login')->middleware('prevent.back.history');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware('super.admin')->group(function () {
        //Account Route
        Route::get('account', [AccountController::class, 'index'])->name('account.index');
        Route::post('account', [AccountController::class, 'create']);
        Route::patch('/account/{id}', [AccountController::class, 'update']);
        Route::patch('/account-password/{id}', [AccountController::class, 'updatePassword']);
    });

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            $article = Post::where('category', '=', 'article')->get();
            $articleCount = $article->count();
            $news = Post::where('category', '=', 'news')->get();
            $newsCount = $news->count();
            $bed = Bed::all();
            $bedCount = $bed->count();
            return view('admin.dashboard', [
                'articleCount' => $articleCount,
                'newsCount' => $newsCount,
                'bedCount' => $bedCount
            ]);
        })->middleware('prevent.back.history');

        Route::get('/event', [EventController::class,'index'])->name('event.index');
        Route::post('/event', [EventController::class,'create']);
        Route::delete('/event/{id}', [EventController::class, 'destroy']);
    });

    Route::middleware('admin.bed')->group(function () {
        //Bed Route
        Route::get('/bed', [BedController::class, 'index'])->name('beds.index');
        Route::post('/bed', [BedController::class, 'store']);
        Route::patch('/bed/{id}', [BedController::class, 'update']);
        Route::delete('/bed/{id}', [BedController::class, 'destroy']);
    });

    Route::middleware('admin.article')->group(function () {
         //Article Route
         Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
         Route::get('/article-add', [ArticleController::class, 'create']);
         Route::post('/article', [ArticleController::class, 'store']);
         Route::get('/article/{id}', [ArticleController::class, 'show']);
         Route::get('/article-edit/{id}', [ArticleController::class, 'edit']);
         Route::patch('/article/{id}', [ArticleController::class, 'update']);
         Route::delete('/article/{id}', [ArticleController::class, 'destroy']);
    });

    Route::middleware('admin.news')->group(function () {
         //News Route
         Route::get('/news', [NewsController::class, 'index'])->name('news.index');
         Route::get('/news-add', [NewsController::class, 'create']);
         Route::post('/news', [NewsController::class, 'store']);
         Route::get('/news/{id}', [NewsController::class, 'show']);
         Route::get('/news-edit/{id}', [NewsController::class, 'edit']);
         Route::patch('/news/{id}', [NewsController::class, 'update']);
         Route::delete('/news/{id}', [NewsController::class, 'destroy']);
    });

    Route::get('/logout', [AuthController::class, 'logout'])->middleware('prevent.back.history');
});
