<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Bed::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($bed){
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-success btn-sm" data-toggle="modal" data-target="#updateBedModal'.$bed->id.'">
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="updateBedModal'.$bed->id.'" tabindex="-1" role="dialog" aria-labelledby="updateBedModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateBedModalLabel">Update Bed | 
                                    <b>'.$bed->room.'</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateBed'.$bed->id.'">
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="'.csrf_token().'" /> 
                                        <input type="hidden" name="_method" value="PUT" />
                                        <div class="form-group">
                                            <label for="man">Laki-Laki</label>
                                            <input value='.$bed->man.' type="number" min="0" class="form-control" name="man" id="man'.$bed->id.'">
                                        </div>
                                        <div class="form-group">
                                            <label for="woman">Perempuan</label>
                                            <input value='.$bed->woman.' type="number" min="0" class="form-control" name="woman" id="woman'.$bed->id.'">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateBed'.$bed->id.'">Batal</button>
                                        <button type="button" onclick="updateBed('.$bed->id.')" class="btn btn-success">Update</button>  
                                    </div>
                                </form>
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

        return view("admin.bed.bed");
    }

    public function store(Request $request){
        Bed::create([
            "room" => $request->room,
            "man" => $request->man,
            "woman" => $request->woman,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Data.']);
    }

    public function update(Request $request, $id){
        $bed = Bed::findOrFail($id);

        $bed->update([
            'man' => $request->man,
            'woman' => $request->woman,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit Data.']);
    }

}
