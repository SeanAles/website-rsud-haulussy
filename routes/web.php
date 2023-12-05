<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\PostController;
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
Route::get('/artikel/{slug}', [PostController::class, 'showArtikel']);

Route::middleware(['guest'])->group(function (){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('login');
});


Route::middleware(['auth'])->group(function (){
    Route::middleware('must-admin')->group(function (){
        Route::get('/dashboard', function () {
            $post = Post::all();
            $countPost = $post->count();
            return view('admin.dashboard', ['countPost' => $countPost]);
        });
        
        //Postingan Route
        Route::get('/post', [PostController::class, 'index'])->name('posts.index');
        Route::get('/post-add', [PostController::class, 'create']);
        Route::get('/post/{id}', [PostController::class, 'show']);
        Route::post('/post', [PostController::class, 'store']);
        Route::get('/post-edit/{id}', [PostController::class, 'edit']);
        Route::put('/post/{id}', [PostController::class, 'update']);
        Route::delete('/post/{id}', [PostController::class, 'destroy']);
        
        //Bed Route
        Route::get('/bed', [BedController::class,'index'])->name('beds.index');
        Route::post('/bed', [BedController::class,'store']);
        Route::patch('/bed/{id}', [BedController::class,'update']);
    });

    // Route::middleware('must-user')->group(function (){
    //     Route::get('/user', function () {
    //         return view('user.absen');
    //     });
    // });
   
    Route::get('/logout', [AuthController::class, 'logout']);
});
