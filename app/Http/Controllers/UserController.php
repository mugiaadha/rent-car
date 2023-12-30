<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(Request $request) {
        $data = UserData::query()
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('ud_nomor_sim', 'like', "%{$request->search}%")
                        ->orWhere('ud_username', 'like', "%{$request->search}%")
                        ->orWhere('ud_nama', 'like', "%{$request->search}%");
                }
            )
            ->simplePaginate(20);

        return view('dashboard.user_management', [
            'data' => $data
        ]);
    }

    public function addUser() {
        return view('dashboard.add_user');
    }

    public function createUser(Request $request) {
        try {
            DB::table('user_data')->insert([
                "ud_nama" => $request->nama,
                "ud_alamat" => $request->alamat,
                "ud_nomor_telepon" => $request->nomor_telepon,
                "ud_nomor_sim" => $request->nomor_sim,
                "ud_username" => $request->username,
                "ud_password" => Hash::make($request->password),
                "ud_status" => "Y",
                "ud_level" => "user"
            ]);
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
        
        return redirect(route('user-management'));
    }

    public function editUser($id) {
        $data = DB::table('user_data')->where('ud_id', $id)->first();

        return view('dashboard.edit_user', [
            'data' => $data
        ]);
    }

    public function updateUser(Request $request) {
        try {
            $data = DB::table('user_data')->where('ud_id', $request->id);
            $data->update([
                "ud_nama" => $request->nama,
                "ud_alamat" => $request->alamat,
                "ud_nomor_telepon" => $request->nomor_telepon,
                "ud_nomor_sim" => $request->nomor_sim
            ]);
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
        
        return redirect(route('user-management'));
    }

    public function deleteUser(Request $request) {
        try {
            $data = DB::table('user_data')->where('ud_id', $request->id);
            $data->delete();
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
        
        return redirect(route('user-management'));
    }
}
