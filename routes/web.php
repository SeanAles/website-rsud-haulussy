<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DownloadCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventPictureController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PromkesController;
use App\Http\Controllers\RequestOnlineInformationController;
use App\Models\Bed;
use App\Models\Event;
use App\Models\Post;
use App\Models\Promkes;
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

// Beranda Route
Route::get('/', function () {
    return view('visitor.beranda.beranda');
});

// Tentang Kami Route
Route::get('/profil', function () {return view('visitor.tentang-kami.profil');});
Route::get('/sejarah', function () {return view('visitor.tentang-kami.sejarah');});
Route::get('/mantan-direktur', function () {return view('visitor.tentang-kami.mantan-direktur');});
Route::get('/visi-misi', function () {return view('visitor.tentang-kami.visi-misi');});
Route::get('/struktur-organisasi', function () {return view('visitor.tentang-kami.struktur-organisasi');});
Route::get('/direksi-manajemen', function () {
    // return view('visitor.tentang-kami.direksi-manajemen');
    return view('visitor.tentang-kami.direksi-manajemen');
});
Route::get('/manajer-ruangan-instalasi', function(){ 
    return view('visitor.tentang-kami.manajer-ruangan-instalasi');
});
Route::get('/gambaran-umum', function () {
    // return view('visitor.tentang-kami.gambaran-umum');
    return view('visitor.maintenance.under-construction');
});


//Fasilitas dan Pelayanan Route
Route::get('/rawat-jalan', function(){ return view('visitor.fasilitas.rawat-jalan'); });
Route::get('/jadwal-poliklinik', function(){return view('visitor.fasilitas.jadwal-poliklinik');});
Route::get('/rawat-inap', function(){
    return view('visitor.maintenance.under-construction');
}); 
Route::get('/alur-pelayanan', function(){
    return view('visitor.fasilitas.alur-pelayanan');
});
Route::get('/pelayanan-penunjang', function(){
    return view('visitor.maintenance.under-construction');
});
Route::get('/medical-check-up', function(){
    return view('visitor.maintenance.under-construction');
});
Route::get('/ketersediaan-tempat-tidur', [BedController::class, 'indexBed']);
Route::get('/tarif-pelayanan', function(){
    return view('visitor.fasilitas.tarif-pelayanan');
});

Route::get('/promosi-kesehatan', [PromkesController::class, 'indexPromkes']);
Route::get('/tata-tertib', function(){
    return view('visitor.fasilitas.tata-tertib');
});
Route::get('/dokter-spesialis', function(){ return view('visitor.fasilitas.dokter-spesialis'); });
Route::get('/dokter-umum', function(){return view('visitor.fasilitas.dokter-umum');});

// Informasi Route
// Informasi Artikel Route
Route::get('/artikel', [ArticleController::class, 'indexArtikel']);
Route::get('/artikel/{slug}', [ArticleController::class, 'showArtikel']);
// Informasi Berita Route
Route::get('/berita', [NewsController::class, 'indexBerita']);
Route::get('/berita/{slug}', [NewsController::class, 'showBerita']);
// Informasi Galeri Kegiatan Route
Route::get('/galeri', [EventController::class, 'indexGaleri']);
Route::get('/galeri/{slug}', [EventController::class, 'showGaleri']);
// Informasi Download Route
Route::get('/unduh', [DownloadController::class, 'indexDownload']);
Route::get('/unduh/{id}', [DownloadController::class, 'showDownload']);

Route::get('/sertifikat-zoominar', function(){ 
    return view('visitor.informasi.sertifikat-zoominar');
});

// Kontak Kami Route
Route::get('/kontak', function(){ return view('visitor.kontak.kontak');});
Route::get('/survei-kepuasaan-masyarakat', function(){ 
    return view('visitor.kontak.survei-kepuasan-masyarakat');
});
Route::get('/unit-layanan-pengaduan', function(){ 
    return view('visitor.kontak.unit-layanan-pengaduan');
});
// Kritik dan Saran Route
Route::get('/kritik-saran', function(){ return view('visitor.kontak.kritik-saran');});
Route::post('/kritik-saran', [SuggestionController::class, 'create']);

// Permintaan Informasi Online Route
Route::get('/permintaan-informasi-online', function(){ return view('visitor.kontak.permintaan-informasi-online');});
Route::post('/permintaan-informasi-online', [RequestOnlineInformationController::class, 'create']);

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
        // Dashboard
        Route::get('/dashboard', function () {
            $article = Post::where('category', '=', 'article')->get();
            $articleCount = $article->count();
            $news = Post::where('category', '=', 'news')->get();
            $newsCount = $news->count();
            $bed = Bed::all();
            $bedCount = $bed->count();
            $events = Event::all();
            $eventCount = $events->count();
            return view('admin.dashboard.dashboard', [
                'articleCount' => $articleCount,
                'newsCount' => $newsCount,
                'bedCount' => $bedCount,
                'eventCount' => $eventCount
            ]);
        })->middleware('prevent.back.history');

        // Event Route
        Route::get('/event', [EventController::class,'index'])->name('event.index');
        Route::post('/event', [EventController::class,'create']);
        Route::patch('/event/{id}', [EventController::class, 'update']);
        Route::delete('/event/{id}', [EventController::class, 'destroy']);
        Route::get('/event/{id}', [EventController::class, 'show'])->name('event.detail');
        // Event Picture Route
        Route::post('/event-picture/{id}', [EventPictureController::class, 'store']);
        Route::delete('/event-picture/{id}', [EventPictureController::class, 'destroy']);

        // Download Route
        // File Route
        Route::get('/download', [DownloadController::class,'index'])->name('download.index');
        Route::post('/download', [DownloadController::class,'store']);
        Route::patch('/download/{id}', [DownloadController::class, 'update']);
        Route::delete('/download/{id}', [DownloadController::class, 'destroy']);
        // Download Category Route
        Route::get('/download-category', [DownloadCategoryController::class,'index'])->name('download-category.index');
        Route::post('/download-category', [DownloadCategoryController::class,'store']);
        Route::patch('/download-category/{id}', [DownloadCategoryController::class, 'update']);
        Route::delete('/download-category/{id}', [DownloadCategoryController::class, 'destroy']);

        // Promkes Route
        Route::get('/promkes', [PromkesController::class,'index'])->name('promkes.index');
        Route::post('/promkes', [PromkesController::class,'store']);
        Route::patch('/promkes/{id}', [PromkesController::class, 'update']);
        Route::delete('/promkes/{id}', [PromkesController::class, 'destroy']);
    });

    Route::middleware('admin.bed')->group(function () {
        //Bed Route
        Route::get('/bed', [BedController::class, 'index'])->name('beds.index');
        Route::post('/bed', [BedController::class, 'store']);
        Route::patch('/bed/{id}', [BedController::class, 'update']);
        Route::delete('/bed/{id}', [BedController::class, 'destroy']);

        //Note Route
        Route::patch('/note', [NoteController::class, 'update']);
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

    Route::middleware('admin.pengaduan')->group(function () {
        // Suggestion Route
        Route::get('/suggestion', [SuggestionController::class, 'index'])->name('suggestion.index');
   });

    Route::get('/logout', [AuthController::class, 'logout'])->middleware('prevent.back.history');
});
