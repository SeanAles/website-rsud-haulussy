<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    public function index (Request $request){
        if ($request->ajax()) {
            $data = Room::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($room) {
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-warning btn-sm" data-toggle="modal" data-target="#updateRoomModal' . $room->id . '">
                            Edit
                        </button>

                        <!-- Modal Update -->
                        <div class="modal fade" id="updateRoomModal' . $room->id . '" tabindex="-1" role="dialog" aria-labelledby="updateRoomModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateRoomModalLabel">Update Kategori | 
                                    <b>' . $room->name . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateRoom' . $room->id . '" onsubmit="return false;" >
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                        <div class="form-group">
                                            <label for="name' . $room->id . '">Nama Kategori</label>
                                            <input value="' . $room->name . '" type="text" class="form-control" name="name" id="name-update' . $room->id . '">
                                        </div>  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateRoom' . $room->id . '">Batal</button>
                                        <button type="button" onclick="updateRoom(' . $room->id . ')" class="btn btn-success" id="updateRoomButton' . $room->id . '">Update</button>  
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

        return view('admin.treatment.room');
    }

    public function store(Request $request)
    {
        $room = Room::create([
            "name" => $request->name,
        ]);

        if ($room) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Data.']);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data'], 401);
        }
    }


    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $updateRoom = $room->update([
            "name" => $request->name,
        ]);

        if ($updateRoom) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit Ruangan.']);
        }

        return response()->json(['message' => 'Gagal Mengedit Ruangan'], 401);
    }
}
