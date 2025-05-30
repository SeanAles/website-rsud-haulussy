<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Untuk operasi file (hapus gambar)
use Illuminate\Support\Facades\Validator; // Untuk validasi manual jika diperlukan
use Illuminate\Support\Str; // Untuk Str::slug

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter per_page dari request, default 10
        $perPage = $request->get('per_page', 10);

        // Validasi per_page harus berupa angka dan dalam range yang diizinkan
        if (!in_array($perPage, [5, 10, 25, 50, 100])) {
            $perPage = 10;
        }

        // Query builder untuk iklan
        $query = Iklan::latest();

        // Jika ada parameter search, lakukan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('judul', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('link', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('aktif', $searchTerm === 'aktif' ? 1 : ($searchTerm === 'tidak aktif' ? 0 : null));
            });
        }

        // Ambil data dengan pagination
        $iklans = $query->paginate($perPage);

        // Append parameter ke pagination links
        $iklans->appends($request->only(['per_page', 'search']));

        // Jika request AJAX, return JSON response
        if ($request->ajax() || $request->has('ajax')) {
            $html = view('admin.iklan.partials.table-rows', compact('iklans'))->render();

            $paginationInfo = '';
            if ($iklans->total() > 0) {
                $paginationInfo = 'Menampilkan ' . $iklans->firstItem() . ' sampai ' . $iklans->lastItem() . ' dari ' . $iklans->total() . ' data';
            } else {
                $paginationInfo = 'Tidak ada data';
            }

            $paginationLinks = '';
            if ($iklans->hasPages()) {
                $paginationLinks = view('admin.iklan.partials.pagination', compact('iklans'))->render();
            }

            return response()->json([
                'html' => $html,
                'pagination_info' => $paginationInfo,
                'pagination_links' => $paginationLinks,
                'total' => $iklans->total(),
                'per_page' => $iklans->perPage()
            ]);
        }

        return view('admin.iklan.index', compact('iklans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.iklan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tentukan rules berdasarkan apakah iklan permanen atau tidak
        $rules = [
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
            'deskripsi' => 'nullable|string|max:1000',
            'aktif' => 'boolean', // Dari checkbox atau hidden input
            'link' => 'nullable|url|max:500',
            'is_permanent' => 'boolean',
        ];

        // Jika bukan iklan permanen, tambahkan validasi tanggal
        if (!$request->has('is_permanent') || !$request->is_permanent) {
            $rules['tanggal_mulai'] = 'required|date|after_or_equal:today';
            $rules['tanggal_akhir'] = 'required|date|after_or_equal:tanggal_mulai';
        }

        $validator = Validator::make($request->all(), $rules, [
            'judul.required' => 'Judul iklan wajib diisi.',
            'judul.max' => 'Judul iklan maksimal 255 karakter.',
            'gambar.required' => 'Gambar iklan wajib diupload.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'deskripsi.max' => 'Deskripsi maksimal 1000 karakter.',
            'tanggal_mulai.required' => 'Tanggal mulai tayang wajib diisi.',
            'tanggal_mulai.after_or_equal' => 'Tanggal mulai tidak boleh kurang dari hari ini.',
            'tanggal_akhir.required' => 'Tanggal akhir tayang wajib diisi.',
            'tanggal_akhir.after_or_equal' => 'Tanggal akhir tidak boleh kurang dari tanggal mulai.',
            'link.url' => 'Format link tidak valid.',
            'link.max' => 'Link maksimal 500 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('iklan.create')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.');
        }

        $data = $validator->validated(); // Ambil data yang sudah divalidasi

        // Handle checkbox aktif - jika tidak ada dalam request, set ke false
        $data['aktif'] = $request->has('aktif') ? true : false;

        // Handle checkbox is_permanent - jika tidak ada dalam request, set ke false
        $data['is_permanent'] = $request->has('is_permanent') ? true : false;

        // Jika iklan permanen, set tanggal ke null
        if ($data['is_permanent']) {
            $data['tanggal_mulai'] = null;
            $data['tanggal_akhir'] = null;
        }

        // Handle status aktif: jika iklan ini aktif, nonaktifkan semua iklan lain
        if ($data['aktif']) {
            Iklan::where('aktif', true)->update(['aktif' => false]);
        }

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Buat nama file unik: timestamp + slug dari nama asli + ekstensi asli
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('visitor/assets/img/iklan'), $filename);
            $data['gambar'] = $filename;
        }

        Iklan::create($data);

        return redirect()->route('iklan.index')->with('success', 'Iklan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * public function show(Iklan $iklan)
     * {
     *     // Biasanya tidak digunakan untuk admin CRUD, tapi bisa diimplementasikan jika perlu
     *     // return view('admin.iklan.show', compact('iklan'));
     * }
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iklan $iklan) // Route Model Binding
    {
        return view('admin.iklan.edit', compact('iklan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iklan $iklan) // Route Model Binding
    {
        // Tentukan rules berdasarkan apakah iklan permanen atau tidak
        $rules = [
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Gambar opsional saat update
            'deskripsi' => 'nullable|string|max:1000',
            'aktif' => 'boolean', // Dari checkbox atau hidden input
            'link' => 'nullable|url|max:500',
            'is_permanent' => 'boolean',
        ];

        // Jika bukan iklan permanen, tambahkan validasi tanggal
        if (!$request->has('is_permanent') || !$request->is_permanent) {
            $rules['tanggal_mulai'] = 'required|date';
            $rules['tanggal_akhir'] = 'required|date|after_or_equal:tanggal_mulai';
        }

        $validator = Validator::make($request->all(), $rules, [
            'judul.required' => 'Judul iklan wajib diisi.',
            'judul.max' => 'Judul iklan maksimal 255 karakter.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'deskripsi.max' => 'Deskripsi maksimal 1000 karakter.',
            'tanggal_mulai.required' => 'Tanggal mulai tayang wajib diisi.',
            'tanggal_akhir.required' => 'Tanggal akhir tayang wajib diisi.',
            'tanggal_akhir.after_or_equal' => 'Tanggal akhir tidak boleh kurang dari tanggal mulai.',
            'link.url' => 'Format link tidak valid.',
            'link.max' => 'Link maksimal 500 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('iklan.edit', $iklan->id)
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.');
        }

        $data = $validator->validated();

        // Handle checkbox aktif - jika tidak ada dalam request, set ke false
        $data['aktif'] = $request->has('aktif') ? true : false;

        // Handle checkbox is_permanent - jika tidak ada dalam request, set ke false
        $data['is_permanent'] = $request->has('is_permanent') ? true : false;

        // Jika iklan permanen, set tanggal ke null
        if ($data['is_permanent']) {
            $data['tanggal_mulai'] = null;
            $data['tanggal_akhir'] = null;
        }

        // Handle status aktif: jika iklan ini aktif, nonaktifkan semua iklan lain KECUALI iklan ini
        if ($data['aktif']) {
            Iklan::where('aktif', true)->where('id', '!=', $iklan->id)->update(['aktif' => false]);
        }

        // Handle upload gambar jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($iklan->gambar && File::exists(public_path('visitor/assets/img/iklan/' . $iklan->gambar))) {
                File::delete(public_path('visitor/assets/img/iklan/' . $iklan->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('visitor/assets/img/iklan'), $filename);
            $data['gambar'] = $filename;
        }

        $iklan->update($data);

        return redirect()->route('iklan.index')->with('success', 'Iklan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iklan $iklan) // Route Model Binding
    {
        try {
            // Hapus gambar terkait jika ada
            if ($iklan->gambar && File::exists(public_path('visitor/assets/img/iklan/' . $iklan->gambar))) {
                File::delete(public_path('visitor/assets/img/iklan/' . $iklan->gambar));
            }

            $iklan->delete(); // Ini akan melakukan soft delete karena model menggunakan trait SoftDeletes

            // Return JSON response untuk AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Iklan berhasil dihapus.'
                ]);
            }

            return redirect()->route('iklan.index')->with('success', 'Iklan berhasil dihapus.');
        } catch (\Exception $e) {
            // Return JSON error response untuk AJAX request
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus iklan.'
                ], 500);
            }

            return redirect()->route('iklan.index')
                            ->with('error', 'Terjadi kesalahan saat menghapus iklan.');
        }
    }

    /**
     * Toggle the active status of the specified iklan.
     * Ensures only one iklan can be active at a time.
     */
    public function toggleStatus(Request $request, Iklan $iklan)
    {
        try {
            $validator = Validator::make($request->all(), [
                'aktif' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak valid.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $deactivatedIds = [];

            // Jika iklan akan diaktifkan, nonaktifkan semua iklan lain terlebih dahulu
            if ($request->aktif) {
                $otherActiveIklans = Iklan::where('id', '!=', $iklan->id)
                                         ->where('aktif', true)
                                         ->get();

                foreach ($otherActiveIklans as $otherIklan) {
                    $otherIklan->aktif = false;
                    $otherIklan->save();
                    $deactivatedIds[] = $otherIklan->id;
                }
            }

            // Update status iklan yang dipilih
            $iklan->aktif = $request->aktif;
            $iklan->save();

            $statusText = $iklan->aktif ? 'aktif' : 'tidak aktif';
            $message = "Status iklan berhasil diubah menjadi {$statusText}.";

            // Tambahkan informasi jika ada iklan lain yang dinonaktifkan
            if (!empty($deactivatedIds)) {
                $message .= " Iklan lain telah dinonaktifkan secara otomatis.";
            }

            return response()->json([
                'success' => true,
                'message' => $message,
                'aktif' => $iklan->aktif,
                'deactivated_ids' => $deactivatedIds
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status iklan.'
            ], 500);
        }
    }
}
