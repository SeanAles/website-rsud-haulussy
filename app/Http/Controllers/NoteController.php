<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function update(Request $request)
    {
        $updateNoteBed = Note::where('name', '=', 'Bed')->update([
            'content' => $request->content,
        ]);

        if ($updateNoteBed > 0) {
            $note = Note::where('name', '=', 'Bed')->first();
            return response()->json(
                [
                    'status' => 'success', 
                    'message' => 'Berhasil Mengedit Keterangan.',
                    'data' => $note
                ]);
        }

        return response()->json(['message' => 'Gagal Mengedit Ketersediaan Ruangan'], 401);
    }
}
