<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PembayaranController extends Controller
{
    public function index(): View
    {
        $dataPembayaran = $this->hitApiService->GET('api/pembayaran/toko/'.Session::get('toko')->id, []);

        $pembayaran = $dataPembayaran->data ?? [];

        $title = "pembayaran";
        return view('pembayaran.index', compact('title', 'pembayaran'));
    }

    public function tambahPembayaran(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data['toko_id'] = Session::get('toko')->id;
        $data['nama'] = $request->post('nama');

        $create = $this->hitApiService->POST('api/pembayaran', $data);
        if (isset($create) && $create->status) {
            Session::flash('success', 'Pembayaran berhasil ditambahkan');
        } else {
            Session::flash('error', 'Pembayaran gagal ditambahkan');
        }
        return back();
    }
}
