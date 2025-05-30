<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iklan; // Import model Iklan

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman beranda visitor.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Query untuk mengambil iklan aktif yang tanggal tayangnya valid atau iklan permanen
        $iklanAktif = Iklan::where('aktif', true)
            ->where(function($query) {
                // Iklan permanen ATAU iklan dengan tanggal valid
                $query->where('is_permanent', true)
                      ->orWhere(function($subQuery) {
                          $subQuery->whereDate('tanggal_mulai', '<=', today())
                                   ->whereDate('tanggal_akhir', '>=', today());
                      });
            })
            ->latest('updated_at') // Ambil yang paling baru diupdate
            ->first();

        // Data lain yang mungkin ingin Anda kirim ke beranda di masa depan bisa ditambahkan di sini
        // contoh: $artikelTerbaru = Artikel::latest()->take(3)->get();

        return view('visitor.beranda.beranda', compact('iklanAktif'));
        // Jika ada data lain:
        // return view('visitor.beranda.beranda', compact('iklanAktif', 'artikelTerbaru'));
    }
}
