<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GaleryController extends Controller
{
    public function index(){
        return view("admin.galery.galery");
    }

    public function create(Request $request){
        $rules = [
            'name' => 'required',
            'pictures' => 'required',
            'pictures.*' => 'mimes:jpeg,png,jpg,gif|max:1024'
        ];
        $rulesMessages = [
            'name.required' => 'Nama tidak boleh kosong.',
            'pictures.required' => 'Gambar kegiatan tidak boleh kosong',
            'pictures.*.mimes' => 'Format gambar yang disupport adalah jpeg, png, jpg, gif.',
            'pictures.*.max' => 'Ukuran gambar maksimal 1 MB',
        ];
        
        $validator = Validator::make($request->all(), $rules, $rulesMessages);
        
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }
        
        return response()->json(['status' => 'success', 'message' => 'Berhasil']);
    }
}
