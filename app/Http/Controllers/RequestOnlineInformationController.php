<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RequestOnlineInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RequestOnlineInformationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RequestOnlineInformation::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($request) {
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-success btn-sm" data-toggle="modal" data-target="#detailRequestModal' . $request->id . '">
                            Detail
                        </button>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailRequestModal' . $request->id . '" tabindex="-1" role="dialog" aria-labelledby="detailRequestModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-body">
                            </div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailRequestModalLabel">Lihat Permintaan |
                                            <b>' . $request->id . '</b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name-' . $request->id . '">Nama</label>
                                            <input value="' . $request->name . '" type="text" class="form-control" id="name-' . $request->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="email-' . $request->id . '">Email</label>
                                            <input value="' . $request->email . '" type="text" class="form-control" id="email-' . $request->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone-number-' . $request->id . '">Nomor Telepon</label>
                                            <input value="' . $request->phone_number . '" type="text" class="form-control" id="phone-number-' . $request->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="information-' . $request->id . '">Informasi yang Diminta</label>
                                            <textarea rows="4" type="text" class="form-control" id="information' . $request->id . '" disabled>'.$request->information.'</textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="reason-' . $request->id . '">Alasan Permintaan</label>
                                            <textarea rows="4" type="text" class="form-control" id="reason' . $request->id . '" disabled>'.$request->reason.'</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                    return $actionBtn;
                })
                ->editColumn('created_at', function($data){
                    $date = Carbon::parse($data->created_at);
                    $indonesianDate = $date->format('d-m-Y');
                    return $indonesianDate;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.request-online-information.request-online-information');
    }

    public function create(Request $request){
        $request = RequestOnlineInformation::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "information" => $request->information,
            "reason" => $request->reason,
        ]);

        if ($request) {
            return response()->json(['success' => 'Berhasil mengirimkan permintaan informasi online']);
        }

        return response()->json(['error' => 'Gagal mengirimkan permintaan informasi online'], 400);
    }
}
