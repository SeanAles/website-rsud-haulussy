<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Note;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Bed::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($bed) {
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-success btn-sm" data-toggle="modal" data-target="#updateBedModal' . $bed->id . '">
                            Edit
                        </button>
                        <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteBedModal' . $bed->id . '">
                            Hapus
                        </button>

                        <!-- Modal Update -->
                        <div class="modal fade" id="updateBedModal' . $bed->id . '" tabindex="-1" role="dialog" aria-labelledby="updateBedModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateBedModalLabel">Update Bed | 
                                    <b>' . $bed->room . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateBed' . $bed->id . '" onsubmit="return false;">
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                        <div class="form-group">
                                            <label for="availability">Tersedia</label>
                                            <input value=' . $bed->availability . ' type="number" min="0" class="form-control" name="availability" id="availability' . $bed->id . '">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateBed' . $bed->id . '">Batal</button>
                                        <button type="button" onclick="updateBed(' . $bed->id . ')" class="btn btn-success" id="updateBedButton'.$bed->id.'">Update</button>  
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>  
                        
                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteBedModal' . $bed->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteBedModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteBedModalLabel">Hapus Ruangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus ruangan dibawah ini?
                                <p>
                                   <strong>' . $bed->room . '</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteBed'.$bed->id.'" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteBed'.$bed->id.'">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <button type="button" onclick="deleteBed('.$bed->id.')" class="btn btn-danger" id="deleteBedButton'.$bed->id.'">Hapus</button>
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

        $note = Note::where('name', '=', 'Bed')->first();

        return view("admin.bed.bed", ["note" => $note]);
    }

    public function store(Request $request)
    {
        $bed = Bed::create([
            "room" => $request->room,
            "availability" => $request->availability,
        ]);
        if ($bed) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Data.']);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $bed = Bed::findOrFail($id);

        $updateBed = $bed->update([
            'availability' => $request->availability,
        ]);

        if ($updateBed) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit Ketersediaan Ruangan.']);
        }

        return response()->json(['message' => 'Gagal Mengedit Ketersediaan Ruangan'], 401);
    }

    public function destroy($id){
        $bed = Bed::findOrFail($id);
        $deleteBed = $bed->delete();

        if($deleteBed){
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Ruangan.']);
        }

        return response()->json(['message' => 'Gagal Menghapus Ruangan'], 401);
    }

    public function indexBed(){
        $beds = Bed::orderBy('created_at', 'DESC')->get();
        $noteKetersediaanBed = Note::where('name', '=', 'Bed')->first();

        return view('visitor.fasilitas.ketersediaan-tempat-tidur', ['beds' => $beds, 'note' => $noteKetersediaanBed]);
    }
}
