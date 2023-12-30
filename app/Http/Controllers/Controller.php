<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    public function loginPage() {
        if (session('user_data')) {
            return redirect(route('rent-car-transaction'));
        }

        return view('login');
    }

    public function doLogin(Request $request) {
        $data = DB::table('user_data')->where([
            'ud_username' => $request->username
        ])->first();

        if($data) {
            if (Hash::check($request->password, $data->ud_password)) {
                session(['user_data' => $data]);
                return redirect(route('vehicle-management'));
            } else {
                echo "<script type='text/javascript'>
                    window.alert('password salah!');
                    window.location.href='/login';
                </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                    window.alert('email / username tidak ditemukan!');
                    window.location.href='/login';
                </script>";
        }
    }

    public function doLogout() {
        session()->forget('user_data');

        return redirect(route('login-page'));
    }
}
