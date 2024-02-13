<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventPicture;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($event) {
                    $actionBtn = '
                    <div class="row">
                    <a href="/event/'.$event->id.'" class="mr-1 mt-1 detail btn btn-primary btn-sm">Detail</a> 
                    <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventPictureModal' . $event->id . '">
                       Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteEventPictureModal' . $event->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteEventPictureModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteEventPictureModalLabel">Hapus Kegiatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus kegiatan dibawah ini?
                                <p>
                                   <strong>' . $event->name . '</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteEvent' . $event->id . '" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteEvent' . $event->id . '">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <button type="button" onclick="deleteEvent(' . $event->id . ')" class="btn btn-danger" id="deleteEventButton' . $event->id . '">Hapus</button>
                                </form>
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

        return view("admin.event.event");
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'pictures' => 'required',
            'pictures.*' => 'mimes:jpeg,png,jpg|max:512'
        ];
        $rulesMessages = [
            'name.required' => 'Nama tidak boleh kosong.',
            'pictures.required' => 'Gambar kegiatan tidak boleh kosong',
            'pictures.*.mimes' => 'Format gambar yang disupport adalah jpeg, png, jpg.',
            'pictures.*.max' => 'Ukuran gambar maksimal 512 kb', 
        ];

        $validator = Validator::make($request->all(), $rules, $rulesMessages);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $slug = Str::random(30);

        $event = Event::create([
            "name" => $request->name,
            'slug' => $slug,
        ]);

        if ($event) {
            foreach ($request->pictures as $key => $picture) {
                $image_name = time() . '_' . $key . '.' . $picture->extension();
                $eventPicture = EventPicture::create([
                    "path" => $image_name,
                    "event_id" => $event->id
                ]);

                if ($eventPicture) {
                    $picture->storeAs('images/event/', $image_name);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Berhasil menambahkan galeri kegiatan.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Gagal menambahkan galeri kegiatan']);
    }

    public function show(Request $request, $id)
    {
        $event = Event::with('eventPicture')->findOrFail($id);
       
        if ($request->ajax()) {
            $data = $event->eventPicture;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($eventPicture) {
                    $path = asset('images/event/'.$eventPicture->path.'');
                    $actionBtn = '
                    <div class="pr-3 pl-1">
                        <div class="row">
                        <button type="button" class="mr-1 mt-1 delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventPictureModal' . $eventPicture->id . '">
                            Hapus
                        </button>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteEventPictureModal' . $eventPicture->id . '" tabindex="-1" role="dialog" aria-labelledby="deleteEventPictureModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteEventPictureModalLabel">Hapus Gambar Kegiatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body mb-3">
                                <p>Apakah anda ingin menghapus gambar kegiatan dibawah ini?</p>
                                <hr>
                                <img src="' .$path . '" alt=' . $eventPicture->path .' class="img-fluid mt-2" style="max-height:300px">
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelDeleteEventPicture' . $eventPicture->id . '" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <form id="formDeleteEventPicture' . $eventPicture->id . '">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <button type="button" onclick="deleteEventPicture(' . $eventPicture->id . ')" class="btn btn-danger" id="deleteEventPictureButton' . $eventPicture->id . '">Hapus</button>
                                </form>
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

        return view("admin.event.event-detail", ['event' => $event]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event) {
            $eventPicture = EventPicture::where('event_id', '=', $id)->get();

            foreach ($eventPicture as $picture) {
                $path = public_path() . "/images/event/" . $picture->path;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $eventPictureDelete = EventPicture::findOrFail($picture->id);
                $eventPictureDelete->delete();
            }

            $eventDelete = $event->delete();
            if ($eventDelete) {
                return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Data.']);
            }
            return response()->json(['status' => 'error', 'message' => 'Gagal Menghapus Data.']);
        }
        
        return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
    }

    public function indexGaleri(){
        $events = Event::with('eventPicture')->orderByDesc('created_at')->paginate(4);

        return view('visitor.informasi.daftar-galeri', ['events' => $events]);
    }

    public function showGaleri($slug){
        $event = Event::with('eventPicture')->where('slug', '=', $slug)->first();
        
        if(!$event){
            return abort(404);
        }

        return view('visitor.informasi.lihat-galeri', ['event' => $event]);
    }
}
