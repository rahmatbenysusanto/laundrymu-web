<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SuperAdmin\DashboardAdminController;
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

    public function loginProses(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data['no_hp'] = $request->post('no_hp');
        $data['password'] = $request->post('password');

        $login = $this->hitApiService->POSTLOGIN("api/user/login", $data);

        if (isset($login) && $login->status) {
            Session::put("data_user", $login->data);
            Session::put("token", $login->data->token);

            if ($login->data->role == "admin") {
                return redirect()->action([DashboardAdminController::class, 'index']);
            } else {
                // Get Toko
                if ($login->data->role == "owner") {
                    $toko = $this->hitApiService->GET('api/toko/user/'.$login->data->id, []);
                    Session::put('toko', $toko->data[0]);
                    if ($login->data->status != "active") {
                        return redirect()->to(route('verifikasiOtp'));
                    }
                } else {
                    $toko = $this->hitApiService->GET('api/toko/pegawai/'.$login->data->id, []);
                    Session::put('toko', $toko->data->toko);
                }

                return redirect()->action([DashboardController::class, 'index']);
            }
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

    public function register(): View
    {
        return view('auth.register');
    }

    public function prosesRegister(Request $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->hitApiService->POSTLOGIN('api/user/register', [
            'nama'      => $request->post('nama'),
            'no_hp'     => $request->post('no_hp'),
            'email'     => $request->post('email'),
            'password'  => $request->post('password'),
            'role'      => 'owner',
            'outlet'    => $request->post('outlet')
        ]);

        if (isset($result) && $result->status) {
            Session::flash('success', 'Buat akun berhasil, silahkan login');
        } else {
            Session::flash('error', $result->errors);
        }

        return back();
    }

    public function verifikasiOtp(): View
    {
        return view('auth.otp');
    }

    public function prosesOTP(Request $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->hitApiService->POST('api/verifikasi-otp', [
            'user_id'   => Session::get('data_user')->id,
            'otp'       => $request->post('kode1').$request->post('kode2').$request->post('kode3').$request->post('kode4')
        ]);

        if (isset($result) && $result->status) {
            return redirect()->to(route('dashboard'));
        } else {
            Session::flash('error', 'Kode OTP salah, silahkan coba lagi');
            return back();
        }
    }

    public function generateNewOTP(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->hitApiService->GET('api/generate-new-otp/'.Session::get('data_user')->id, []);

        return response()->json([
            'status'  => $result->status
        ], 200);
    }
}
