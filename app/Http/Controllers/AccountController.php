<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class AccountController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with(['role'])->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($account) {
                    $role = Role::all();
                    $roleDropdown = '';
                    for ($i = 0; $i < count($role); $i++) {
                        if ($account->role_id === $role[$i]->id) {
                            $roleDropdown .= '<option value="' . $role[$i]->id . '" selected>' . $role[$i]->name . '</option>';
                        } else {
                            $roleDropdown .= '<option value="' . $role[$i]->id . '">' . $role[$i]->name . '</option>';
                        }
                    };
                    
                    $actionBtn = '
                    <div class="row">
                        <button type="button" class="mr-1 mt-1 update btn btn-success btn-sm" data-toggle="modal" data-target="#updateAccountModal' . $account->id . '">
                            Edit
                        </button>
                        <button type="button" class="mr-1 mt-1 update btn btn-warning btn-sm" data-toggle="modal" data-target="#updateAccountPasswordModal' . $account->id . '">
                            Password
                        </button>

                        <!-- Modal Update -->
                        <div class="modal fade" id="updateAccountModal' . $account->id . '" tabindex="-1" role="dialog" aria-labelledby="updateAccountModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateAccountModalLabel">Update Akun | 
                                    <b>' . $account->name . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateAccount' . $account->id . '">
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                        <div class="form-group">
                                            <label for="email' . $account->id . '">Email</label>
                                            <input value="' . $account->email . '" type="text" class="form-control" name="email" id="email' . $account->id . '" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="name' . $account->id . '">Nama</label>
                                            <input value="' . $account->name . '" type="text" class="form-control" name="name" id="name' . $account->id . '">
                                        </div>
                                        
                                        <div class="form group">
                                            <label for="role_id' . $account->id . '">Role</label>
                                            <select class="custom-select" id="role_id' . $account->id . '" name="role_id">
                                                ' . $roleDropdown . '
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateAccount' . $account->id . '">Batal</button>
                                        <button type="button" onclick="updateAccount(' . $account->id . ')" class="btn btn-success" id="updateAccountButton' . $account->id . '">Update</button>  
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        <!-- Modal Update Password -->
                        <div class="modal fade" id="updateAccountPasswordModal' . $account->id . '" tabindex="-1" role="dialog" aria-labelledby="updateAccountPasswordModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="updateAccountPasswordModalLabel">Update Password | 
                                    <b>' . $account->name . '</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="formUpdateAccountPassword' . $account->id . '">
                                    <div class="modal-body"> 
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                            
                                        <div class="form-group">
                                            <label for="password' . $account->id . '">Password Baru</label>
                                            <input type="password" class="form-control" name="password" id="password' . $account->id . '" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="confirmPassword' . $account->id . '">Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword' . $account->id . '" placeholder="Konfirmasi Password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelUpdateAccountPassword' . $account->id . '">Batal</button>
                                        <button type="button" onclick="updateAccountPassword(' . $account->id . ')" class="btn btn-success" id="updateAccountPasswordButton' . $account->id . '">Update</button>  
                                    </div>
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
        $roles = Role::all();

        return view("admin.account.account", ['roles' => $roles]);
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
        ];
        $rulesMessages = [
            'name.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Alamat email tidak boleh kosong.',
            'email.email' => 'Tolong masukkan alamat email yang benar.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password anda harus minimal :min karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',   
        ];

        $validator = Validator::make($request->all(), $rules, $rulesMessages);
        
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $account = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        
        if ($account) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menambahkan Akun.']);
        }

        return response()->json(['message' => 'Gagal Menambahkan Akun'], 401);
    }

    public function update(Request $request, $id)
    {
        $account = User::findOrFail($id);

        $updateAccount = $account->update([
            "name" => $request->name,
            "role_id" => $request->role_id,
        ]);

        if ($updateAccount) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Mengedit Akun.']);
        }

        return response()->json(['message' => 'Gagal Mengedit Akun'], 401);
    }

    public function updatePassword(Request $request, $id)
    {
        $account = User::findOrFail($id);

        $updatePassword = $account->update([
            "password" => Hash::make($request->password),
        ]);

        if ($updatePassword) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Memperbarui Password.']);
        }

        return response()->json(['message' => 'Gagal Memperbarui Password'], 401);
    }
}
