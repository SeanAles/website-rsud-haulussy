<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Suggestion::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($suggestion) {
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-success btn-sm" data-toggle="modal" data-target="#detailSuggestionModal' . $suggestion->id . '">
                            Detail
                        </button>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailSuggestionModal' . $suggestion->id . '" tabindex="-1" role="dialog" aria-labelledby="detailSuggestionModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-body">
                            </div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailSuggestionModalLabel">Lihat Kritik atau Saran | 
                                            <b>' . $suggestion->id . '</b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name-' . $suggestion->id . '">Nama</label>
                                            <input value="' . $suggestion->name . '" type="text" class="form-control" id="name-' . $suggestion->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="email-' . $suggestion->id . '">Email</label>
                                            <input value="' . $suggestion->email . '" type="text" class="form-control" id="email-' . $suggestion->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone-number-' . $suggestion->id . '">Nomor Telepon</label>
                                            <input value="' . $suggestion->phone_number . '" type="text" class="form-control" id="phone-number-' . $suggestion->id . '" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-' . $suggestion->id . '">Pesan</label>
                                            <textarea rows="4" type="text" class="form-control" id="message-' . $suggestion->id . '" disabled>'.$suggestion->message.'
                                            </textarea>
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

        return view('admin.suggestion.suggestion');
    }

    public function create(Request $request)
    {
        $suggestion = Suggestion::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "message" => $request->message,
        ]);

        if ($suggestion) {
            return response()->json(['success' => 'Berhasil mengirimkan kritik atau saran']);
        }

        return response()->json(['error' => 'Gagal mengirimkan kritik atau saran'], 400);
    }
}
