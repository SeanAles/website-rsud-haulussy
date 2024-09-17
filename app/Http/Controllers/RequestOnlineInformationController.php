<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RequestOnlineInformation;
use Illuminate\Http\Request;

class RequestOnlineInformationController extends Controller
{
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
