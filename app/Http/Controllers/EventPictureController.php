<?php

namespace App\Http\Controllers;

use App\Models\EventPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventPictureController extends Controller
{
    public function store (Request $request, $id){
        $rules = [
            'pictures' => 'required',
            'pictures.*' => 'mimes:jpeg,png,jpg|max:512'
        ];
        $rulesMessages = [
            'pictures.required' => 'Gambar kegiatan tidak boleh kosong',
            'pictures.*.mimes' => 'Format gambar yang disupport adalah jpeg, png, jpg.',
            'pictures.*.max' => 'Ukuran gambar maksimal 512 kb', 
        ];

        $validator = Validator::make($request->all(), $rules, $rulesMessages);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        if($request->pictures){
            foreach ($request->pictures as $key => $picture) {
                $image_name = time() . '_' . $key . '.' . $picture->extension();
                $eventPicture = EventPicture::create([
                    "path" => $image_name,
                    "event_id" => $id,
                ]);

                if ($eventPicture) {
                    $picture->storeAs('images/event/', $image_name);
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Berhasil menambahkan gambar kegiatan.']);
        }
        
        return response()->json(['status' => 'error', 'message' => 'Gagal menambahkan gambar kegiatan']);

    }

    public function destroy($id){
        $eventPicture = EventPicture::findOrFail($id);
        if($eventPicture){
            $path = public_path() .'/images/event/'.$eventPicture->path;
            if (File::exists($path)) {
                File::delete($path);
            }
            $eventPictureDelete = $eventPicture->delete();
            if($eventPictureDelete){
                return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Data.']);
            }
            return response()->json(['status' => 'error', 'message' => 'Gagal Menghapus Data.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
    }
}
