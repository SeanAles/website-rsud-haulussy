<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DownloadCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DownloadCategory::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($downloadCategory) {
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-warning btn-sm" data-toggle="modal" data-target="#updateDownloadCategoryModal' . $downloadCategory->id . '">
                            Edit
                        </button>

                        <!-- Modal Update -->
                        <div class="modal fade" id="updateDownloadCategoryModal' . $downloadCategory->id . '" tabindex="-1" role="dialog" aria-labelledby="updateDownloadCategoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateDownloadCategoryModalLabel">Update Kategori | 
                                    <b>' . $downloadCategory->name . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateDownloadCategory' . $downloadCategory->id . '" onsubmit="return false;" >
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                        <div class="form-group">
                                            <label for="name' . $downloadCategory->id . '">Nama Kategori</label>
                                            <input value="' . $downloadCategory->name . '" type="text" class="form-control" name="name" id="name-update' . $downloadCategory->id . '">
                                        </div>  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateDownloadCategory' . $downloadCategory->id . '">Batal</button>
                                        <button type="button" onclick="updateDownloadCategory(' . $downloadCategory->id . ')" class="btn btn-success" id="updateDownloadCategoryButton' . $downloadCategory->id . '">Update</button>  
                                    </div>
                                </form>
                            </div>
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
            // <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteDownloadCategoryModal' . $downloadCategory->id . '">
            //      Hapus
            // </button>

            // <!-- Modal Delete -->
            //     <div class="modal fade" id="deleteDownloadCategoryModal' . $downloadCategory->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteDownloadCategoryModalLabel" aria-hidden="true">
            //         <div class="modal-dialog" role="document">
            //             <div class="modal-content">
            //                 <div class="modal-header">
            //                      <h5 class="modal-title" id="deleteDownloadCategoryModalLabel">Hapus File</h5>
            //                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            //                         <span aria-hidden="true">&times;</span>
            //                     </button>
            //                 </div>
            //             <div class="modal-body">
            //                 Apakah anda ingin menghapus kategori download dibawah ini?
            //                 <p>
            //                     <strong>' . $downloadCategory->name . '</strong>
            //                 </p>
            //             </div>
            //         <div class="modal-footer">
            //             <button type="button" id="cancelDeleteDownloadCategory'.$downloadCategory->id.'" class="btn btn-primary" data-dismiss="modal">Batal</button>
            //                 <form id="formDeleteDownloadCategory'.$downloadCategory->id.'">
            //                     <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
            //                     <button type="button" onclick="deleteDownloadCategory('.$downloadCategory->id.')" class="btn btn-danger" id="deleteDownloadCategoryButton'.$downloadCategory->id.'">Hapus</button>
            //                 </form>
            //          </div>
            //     </div>

        return view('admin.download.download-category');
    }

    public function store(Request $request)
    {
        $downloadCategory = DownloadCategory::create([
            "name" => $request->name,
        ]);

        if ($downloadCategory) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Data.']);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $downloadCategory = DownloadCategory::findOrFail($id);

        $updateDownloadCategory = $downloadCategory->update([
            "name" => $request->name,
        ]);

        if ($updateDownloadCategory) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit Kategori.']);
        }

        return response()->json(['message' => 'Gagal Mengedit Kategori'], 401);
    }

    public function destroy($id){
        $downloadCategory = DownloadCategory::findOrFail($id);
        $deleteDownloadCategory = $downloadCategory->delete();

        if($deleteDownloadCategory){
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Kategori.']);
        }

        return response()->json(['message' => 'Gagal Menghapus Kategori'], 401);
    }
}
