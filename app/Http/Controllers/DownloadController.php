<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DownloadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Download::with(['downloadCategory'])->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($download) {
                    $downloadCategory = DownloadCategory::all();
                    $downloadCategoryDropdown = '';
                    for ($i = 0; $i < count($downloadCategory); $i++) {
                        if ($download->download_category_id === $downloadCategory[$i]->id) {
                            $downloadCategoryDropdown .= '<option value="' . $downloadCategory[$i]->id . '" selected>' . $downloadCategory[$i]->name . '</option>';
                        } else {
                            $downloadCategoryDropdown .= '<option value="' . $downloadCategory[$i]->id . '">' . $downloadCategory[$i]->name . '</option>';
                        }
                    };
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 detail btn btn-success btn-sm" data-toggle="modal" data-target="#detailDownloadModal' . $download->id . '">
                            Detail
                        </button>

                        <button type="button" class="mr-1 mt-1 update btn btn-warning btn-sm" data-toggle="modal" data-target="#updateDownloadModal' . $download->id . '">
                            Edit
                        </button>

                        <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteDownloadModal' . $download->id . '">
                            Hapus
                        </button>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailDownloadModal' . $download->id . '" tabindex="-1" role="dialog" aria-labelledby="detailDownloadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-body">
                            </div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailDownloadModalLabel">Lihat File | 
                                            <b>' . $download->id . '</b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name' . $download->id . '">Nama File</label>
                                            <input value="' . $download->name . '" type="text" class="form-control" id="name' . $download->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="category' . $download->id . '">Kategori File</label>
                                            <input value="' . $download->downloadCategory->name . '" type="text" class="form-control" id="category' . $download->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="url' . $download->id . '">URL File</label>
                                            <input value="' . $download->url . '" type="text" class="form-control" id="url' . $download->id . '" disabled>
                                            <div class="row">
                                                <div classs="col-6">
                                                    <a target="_blank" href="'.$download->url.'" class="download-button">Download</a>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div> 

                        <!-- Modal Update -->
                        <div class="modal fade" id="updateDownloadModal' . $download->id . '" tabindex="-1" role="dialog" aria-labelledby="updateDownloadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateDownloadModalLabel">Update Akun | 
                                    <b>' . $download->name . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateDownload' . $download->id . '">
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                        <div class="form-group">
                                            <label for="name' . $download->id . '">Nama File</label>
                                            <input value="' . $download->name . '" type="text" class="form-control" name="name" id="name-update' . $download->id . '">
                                        </div>

                                        <div class="form-group">
                                            <label for="url' . $download->id . '">URL File</label>
                                            <input value="' . $download->url . '" type="text" class="form-control" name="url" id="url-update' . $download->id . '">
                                        </div>
                                        <div class="form group">
                                            <label for="download_category_id' . $download->id . '">Kategori File</label>
                                            <select class="custom-select" id="download_category_id' . $download->id . '" name="download_category_id">
                                                ' . $downloadCategoryDropdown . '
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateDownload' . $download->id . '">Batal</button>
                                        <button type="button" onclick="updateDownload(' . $download->id . ')" class="btn btn-success" id="updateDownloadButton' . $download->id . '">Update</button>  
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteDownloadModal' . $download->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteDownloadModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteDownloadModalLabel">Hapus File</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus file dibawah ini?
                                <p>
                                   <strong>' . $download->name . '</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteDownload'.$download->id.'" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteDownload'.$download->id.'">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <button type="button" onclick="deleteDownload('.$download->id.')" class="btn btn-danger" id="deleteDownloadButton'.$download->id.'">Hapus</button>
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

        $downloadCategories = DownloadCategory::all();
    
        return view('admin.download.download', ['categories' => $downloadCategories]);
    }

    public function store(Request $request)
    {
        $download = Download::create([
            "name" => $request->name,
            "url" => $request->url,
            "download_category_id" => $request->download_category_id,
        ]);

        if ($download) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Data.']);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $download = Download::findOrFail($id);

        $updateDownload = $download->update([
            "name" => $request->name,
            "url" => $request->url,
            "download_category_id" => $request->download_category_id,
        ]);

        if ($updateDownload) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit File.']);
        }

        return response()->json(['message' => 'Gagal Mengedit File'], 401);
    }

    public function destroy($id){
        $download = Download::findOrFail($id);
        $deleteDownload = $download->delete();

        if($deleteDownload){
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus File.']);
        }

        return response()->json(['message' => 'Gagal Menghapus File'], 401);
    }

    public function indexDownload(){
        $downloadCategories = DownloadCategory::all();

        return view('visitor.informasi.unduh', ['downloadCategories' => $downloadCategories,]);
    }

    public function showPNPKCategories(){
        // Ambil hanya kategori PNPK (ID 1-7)
        $pnpkCategories = DownloadCategory::whereBetween('id', [1, 7])->get();

        return view('visitor.informasi.pnpk-categories', ['downloadCategories' => $pnpkCategories]);
    }

    public function showDownload($id, Request $request){
        $query = Download::with(['downloadCategory'])
            ->where('download_category_id', '=', $id);
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }
        
        $downloads = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Get category info
        $category = DownloadCategory::findOrFail($id);
        
        // Mempertahankan parameter pencarian pada pagination
        if ($request->has('search')) {
            $downloads->appends(['search' => $request->search]);
        }
        
        // AJAX response for search
        if ($request->ajax() || $request->has('ajax')) {
            $html = '';
            $count = $downloads->total();
            
            if ($downloads->count() > 0) {
                foreach ($downloads as $index => $download) {
                    $html .= view('visitor.informasi._download_row', [
                        'download' => $download,
                        'index' => $index + 1 + ($downloads->currentPage() - 1) * $downloads->perPage()
                    ])->render();
                }
            } else {
                $html = '<tr><td colspan="3" class="text-center py-5">
                    <div class="no-results">
                        <i class="fas fa-search fa-2x mb-3 text-muted"></i>
                        <h5 class="mb-3">Tidak ada file ditemukan</h5>
                        <p class="text-muted mb-4">Maaf, tidak ada file yang sesuai dengan pencarian "' . $request->search . '"</p>
                        <button type="button" id="backToAllFiles" class="btn btn-primary btn-sm">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua file
                        </button>
                    </div>
                </td></tr>';
            }
            
            $pagination = $downloads->appends(['search' => $request->search])->links()->toHtml();
            
            return response()->json([
                'html' => $html,
                'count' => $count,
                'pagination' => $pagination
            ]);
        }

        return view('visitor.informasi.lihat-unduh', [
            'downloads' => $downloads,
            'category' => $category,
            'searchTerm' => $request->search ?? ''
        ]);
    }

}
