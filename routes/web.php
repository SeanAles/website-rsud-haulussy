<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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


Route::middleware(['guest'])->group(function (){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('login');
});


Route::middleware(['auth'])->group(function (){
    Route::middleware('must-admin')->group(function (){
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        Route::get('/post', [PostController::class, 'index']);
        Route::get('/add-post', [PostController::class, 'create']);
    });

    // Route::middleware('must-user')->group(function (){
    //     Route::get('/user', function () {
    //         return view('user.absen');
    //     });
    // });
   
    Route::get('/logout', [AuthController::class, 'logout']);
});
