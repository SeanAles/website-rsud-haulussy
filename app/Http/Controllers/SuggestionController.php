<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use App\Models\User;
use App\Notifications\NewSuggestionNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
                        <a href="' . route('admin.suggestions.show', $suggestion->id) . '" class="mr-1 mt-1 btn btn-success btn-sm">
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

        return view('admin.suggestion.suggestion');
    }

    public function create(Request $request)
    {
        $suggestion = Suggestion::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "message" => $request->message,
            "hope" => $request->hope,
        ]);

        if ($suggestion) {
            // Send notification to roles with access to suggestions (role_id 1, 2, 6)
            $admins = User::whereIn('role_id', [1, 2, 6])->get();
            Notification::send($admins, new NewSuggestionNotification($suggestion));

            return response()->json(['success' => 'Berhasil mengirimkan kritik atau saran']);
        }

        return response()->json(['error' => 'Gagal mengirimkan kritik atau saran'], 400);
    }

    public function show($id)
    {
        $suggestion = Suggestion::findOrFail($id);
        return view('admin.suggestion.detail', compact('suggestion'));
    }
}
