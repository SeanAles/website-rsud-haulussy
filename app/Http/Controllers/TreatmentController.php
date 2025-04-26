<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TreatmentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Treatment::with(['room'])->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($treatment) {
                    $room = Room::all();
                    $roomDropdown = '';
                    for ($i = 0; $i < count($room); $i++) {
                        if ($treatment->room_id === $room[$i]->id) {
                            $roomDropdown .= '<option value="' . $room[$i]->id . '" selected>' . $room[$i]->name . '</option>';
                        } else {
                            $roomDropdown .= '<option value="' . $room[$i]->id . '">' . $room[$i]->name . '</option>';
                        }
                    };
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-warning btn-sm" data-toggle="modal" data-target="#updateTreatmentModal' . $treatment->id . '">
                            Edit
                        </button>

                        <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteTreatmentModal' . $treatment->id . '">
                            Hapus
                        </button>

                        <!-- Modal Update -->
                        <div class="modal fade" id="updateTreatmentModal' . $treatment->id . '" tabindex="-1" role="dialog" aria-labelledby="updateTreatmentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateTreatmentModalLabel">Update Tindakan |
                                    <b>' . $treatment->name . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateTreatment' . $treatment->id . '">
                                    <div class="modal-body">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <div class="form-group">
                                            <label for="name' . $treatment->id . '">Nama Tindakan</label>
                                            <input value="' . $treatment->name . '" type="text" class="form-control" name="name" id="name-update' . $treatment->id . '">
                                        </div>

                                        <div class="form-group">
                                            <label for="price' . $treatment->id . '">Harga</label>
                                            <input value="' . $treatment->price . '" type="text" class="form-control" name="price" id="price-update' . $treatment->id . '">
                                        </div>
                                        <div class="form group">
                                            <label for="room_id' . $treatment->id . '">Ruangan</label>
                                            <select class="custom-select" id="room_id' . $treatment->id . '" name="room_id">
                                                ' . $roomDropdown . '
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateTreatment' . $treatment->id . '">Batal</button>
                                        <button type="button" onclick="updateTreatment(' . $treatment->id . ')" class="btn btn-success" id="updateTreatmentButton' . $treatment->id . '">Update</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteTreatmentModal' . $treatment->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteTreatmentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteTreatmentModalLabel">Hapus Tindakan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus tindakan dibawah ini?
                                <p>
                                   <strong>' . $treatment->name . '</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteTreatment' . $treatment->id . '" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteTreatment' . $treatment->id . '">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                    <button type="button" onclick="deleteTreatment(' . $treatment->id . ')" class="btn btn-danger" id="deleteTreatmentButton' . $treatment->id . '">Hapus</button>
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

        $rooms = Room::all();

        return view('admin.treatment.treatment', ['rooms' => $rooms]);
    }

    public function store(Request $request)
    {
        $treatment = Treatment::create([
            "name" => $request->name,
            "price" => $request->price,
            "room_id" => $request->room_id,
        ]);

        if ($treatment) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Data.']);
        } else {
            return response()->json(['message' => 'Gagal Menambahkan Data'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $treatment = Treatment::findOrFail($id);

        $updateTreatment = $treatment->update([
            "name" => $request->name,
            "price" => $request->price,
            "room_id" => $request->room_id,
        ]);

        if ($updateTreatment) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit Tindakan.']);
        }

        return response()->json(['message' => 'Gagal Mengedit Tindakan'], 401);
    }

    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $deleteTreatment = $treatment->delete();

        if ($deleteTreatment) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Tindakan.']);
        }

        return response()->json(['message' => 'Gagal Menghapus Tindakan'], 401);
    }

    public function indexTreatment()
    {
        $rooms = Room::all();
        $treatments = Treatment::where('room_id', '=', '1')->get();

        // group ruangan
        // untuk mengatur group ruangan disini, disesuaikan dengan id rooms
        $roomGroups = [
            'Gawat Darurat' => [3],
            'intensive care' => [4, 5],
            'Rawat Jalan' => [20, 13, 14, 15, 17, 21, 11, 12, 16, 18, 22],
            'Rawat Inap' => [2, 8, 9, 7, 10, 25],
            'Penunjang' => [23, 24, 26, 27, 28],
            'Lainnya' => [1, 6, 19]
        ];
        return view('visitor.fasilitas.tarif-pelayanan', [
            'rooms' => $rooms,
            'treatments' => $treatments,
            'roomGroups' => $roomGroups
        ]);
    }

    public function showTreatment($id)
    {
        $treatments = Treatment::where('room_id', '=', $id)->get();

        return response()->json(['treatments' => $treatments]);
    }
}
