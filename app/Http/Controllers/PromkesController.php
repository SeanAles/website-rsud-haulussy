<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promkes;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PromkesController extends Controller
{
    public function index (Request $request){
        if ($request->ajax()) {
            $data = Promkes::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($promkes) {
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 detail btn btn-success btn-sm" data-toggle="modal" data-target="#detailArtikelLuarModal' . $promkes->id . '">
                            Detail
                        </button>

                        <button type="button" class="mr-1 mt-1 update btn btn-warning btn-sm" data-toggle="modal" data-target="#updateArtikelLuarModal' . $promkes->id . '">
                            Edit
                        </button>

                        <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteArtikelLuarModal' . $promkes->id . '">
                            Hapus
                        </button>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailArtikelLuarModal' . $promkes->id . '" tabindex="-1" role="dialog" aria-labelledby="detailArtikelLuarModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-body">
                            </div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailSuggestionModalLabel">Lihat Artikel | 
                                            <b>' . $promkes->id . '</b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group">
                                            <label for="date_of_released' . $promkes->id . '">Judul Artikel</label>
                                            <input value="' . $promkes->date_of_released . '" type="text" class="form-control" id="date_of_released' . $promkes->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="name' . $promkes->id . '">Judul Artikel</label>
                                            <input value="' . $promkes->name . '" type="text" class="form-control" id="name' . $promkes->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="url' . $promkes->id . '">URL Artikel</label>
                                            <input value="' . $promkes->url . '" type="text" class="form-control" id="url' . $promkes->id . '" disabled>
                                            <div class="row">
                                                <div classs="col-6">
                                                    <a target="_blank" href="'.$promkes->url.'" class="download-button">Cek</a>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <!-- Modal Update -->
                        <div class="modal fade" id="updateArtikelLuarModal' . $promkes->id . '" tabindex="-1" role="dialog" aria-labelledby="updateArtikelLuarModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateArtikelLuarModalLabel">Update Artikel | 
                                    <b>' . $promkes->name . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateArtikelLuar' . $promkes->id . '">
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                        <div class="form-group">
                                            <label for="name' . $promkes->id . '">Tanggal Artikel</label>
                                            <input value="' . $promkes->date_of_released . '" type="text" class="date-update form-control" name="date_of_released" id="date_of_released-update' . $promkes->id . '">
                                        </div>

                                        <div class="form-group">
                                            <label for="name' . $promkes->id . '">Judul Artikel</label>
                                            <input value="' . $promkes->name . '" type="text" class="form-control" name="name" id="name-update' . $promkes->id . '">
                                        </div>

                                        <div class="form-group">
                                            <label for="url' . $promkes->id . '">URL Artikel</label>
                                            <input value="' . $promkes->url . '" type="text" class="form-control" name="url" id="url-update' . $promkes->id . '">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateArtikelLuar' . $promkes->id . '">Batal</button>
                                        <button type="button" onclick="updateArtikelLuar(' . $promkes->id . ')" class="btn btn-success" id="updateArtikelLuarButton' . $promkes->id . '">Update</button>  
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                         <!-- Modal Delete -->
                        <div class="modal fade" id="deleteArtikelLuarModal' . $promkes->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteArtikelLuarModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteArtikelLuarModalLabel">Hapus Artikel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus artikel dibawah ini?
                                <p>
                                   <strong>' . $promkes->name . '</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteArtikelLuar'.$promkes->id.'" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteArtikelLuar'.$promkes->id.'">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <button type="button" onclick="deleteArtikelLuar('.$promkes->id.')" class="btn btn-danger" id="deleteArtikelLuarButton'.$promkes->id.'">Hapus</button>
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

        return view('admin.promkes.promkes');
    }

    public function store(Request $request)
    {
        $promkes = Promkes::create([
            "date_of_released" => $request->date_of_released,
            "name" => $request->name,
            "url" => $request->url,
        ]);

        if ($promkes) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Data.']);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $promkes = Promkes::findOrFail($id);

        $updateAccount = $promkes->update([
            "date_of_released" => $request->date_of_released,
            "name" => $request->name,
            "url" => $request->url,
        ]);

        if ($updateAccount) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit Artikel Luar.']);
        }

        return response()->json(['message' => 'Gagal Mengedit Artikel Luar'], 401);
    }

    public function destroy($id){
        $promkes = Promkes::findOrFail($id);
        $deletePromkes = $promkes->delete();

        if($deletePromkes){
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Artikel.']);
        }

        return response()->json(['message' => 'Gagal Menghapus Artikel'], 401);
    }

    public function indexPromkes(){
        $promkes = Promkes::all();
        
        return view('visitor.fasilitas.promosi-kesehatan', ['promkes' => $promkes,]);
    }

}
