<?php

namespace App\Http\Controllers;

use App\Http\services\HitApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        protected HitApiService $hitApiService
    ) {}

    public function login(): View
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $data['no_hp'] = $request->post('no_hp');
        $data['password'] = $request->post('password');

        $login = $this->hitApiService->POSTLOGIN("api/user/login", $data);

        if (isset($login) && $login->status) {
            Session::put("data_user", $login->data);
            Session::put("token", $login->data->token);

            // Get Toko
            if ($login->data->role == "owner") {
                $toko = $this->hitApiService->GET('api/toko/user/'.$login->data->id, []);
                Session::put('toko', $toko->data[0]);
            } else {
                $toko = $this->hitApiService->GET('api/toko/pegawai/'.$login->data->id, []);
                Session::put('toko', $toko->data->toko);
            }

            return redirect()->action([DashboardController::class, 'index']);
        } else {
            Session::flash("error", "Login Gagal, silahkan cek no hp atau password anda");
            return back();
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Session::forget('data_user');
        Session::forget('token');
        Session::forget('toko');

        return redirect()->action([AuthController::class, 'login']);
    }
}
