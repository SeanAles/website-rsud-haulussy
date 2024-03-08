<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DownloadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Download::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($download) {
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
                                        <h5 class="modal-title" id="detailSuggestionModalLabel">Lihat File | 
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

        return view('admin.download.download');
    }

    public function store(Request $request)
    {
        $download = Download::create([
            "name" => $request->name,
            "url" => $request->url,
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

        $updateAccount = $download->update([
            "name" => $request->name,
            "url" => $request->url,
        ]);

        if ($updateAccount) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit File.']);
        }

        return response()->json(['message' => 'Gagal Mengedit File'], 401);
    }

    public function destroy($id){
        $download = download::findOrFail($id);
        $deleteDownload = $download->delete();

        if($deleteDownload){
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus File.']);
        }

        return response()->json(['message' => 'Gagal Menghapus File'], 401);
    }

    public function indexDownload(){
        $downloads = Download::all();

        return view('visitor.informasi.unduh', ['downloads' => $downloads,]);
    }

}
