<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RequestOnlineInformation;
use App\Models\User;
use App\Notifications\NewRequestOnlineInformationNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
                        <a href="' . route('admin.request-online-information.show', $request->id) . '" class="mr-1 mt-1 btn btn-success btn-sm">
                            Detail
                        </a>
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

    public function create(Request $request)
    {
        $requestOnlineInformation = RequestOnlineInformation::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "information" => $request->information,
            "reason" => $request->reason,
        ]);

        if ($requestOnlineInformation) {
            // Send notification to roles with access to online information requests (role_id 1, 2, 6)
            $admins = User::whereIn('role_id', [1, 2, 6])->get();
            Notification::send($admins, new NewRequestOnlineInformationNotification($requestOnlineInformation));

            return response()->json(['success' => 'Berhasil mengirimkan permintaan informasi online']);
        }

        return response()->json(['error' => 'Gagal mengirimkan permintaan informasi online'], 400);
    }

    public function show($id)
    {
        $requestInfo = RequestOnlineInformation::findOrFail($id);
        return view('admin.request-online-information.detail', compact('requestInfo'));
    }
}
