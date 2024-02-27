<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PembayaranAdminController extends Controller
{
    public function index(): View
    {
        $dataPembayaran = $this->hitApiService->GET('api/toko/super-admin/get-histori-pembayaran', []);
        $pembayaran = $dataPembayaran->data ?? [];

        $title = "pembayaran";
        return view('superAdmin.pembayaran.index', compact('title', 'pembayaran'));
    }

    public function detail($nomor_pembayaran)
    {
        $dataPembayaran = $this->hitApiService->GET('api/toko/get-detail-pembayaran/'.$nomor_pembayaran, []);

        if ($dataPembayaran->data != null) {
            $pembayaran = $dataPembayaran->data;

            $title = "pembayaran";
            return view('superAdmin.pembayaran.detail', compact('title', 'pembayaran'));
        } else {
            Session::flash('error', 'Pembayaran tidak ditemukan');
            return back();
        }
    }

    public function verifikasiPembayaran($id): \Illuminate\Http\RedirectResponse
    {
        $hit = $this->hitApiService->PATCH('api/toko/konfirmasi-pembayaran/'.$id, []);

        if (isset($hit) && $hit->status) {
            Session::flash('success', 'Verifikasi Pembayaran Berhasil');
        } else {
            Session::flash('error', 'Verifikasi Pembayaran Gagal');
        }

        return back();
    }
}
