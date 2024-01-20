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

    public function editPembayaran($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $result = $this->hitApiService->GET('api/pembayaran/'.base64_decode($id), []);

        if (isset($result) && $result->status && $result->data != null) {
            $title = 'pembayaran';
            $pembayaran = $result->data;
            return view('pembayaran.edit', compact('title', 'pembayaran'));
        } else {
            Session::flash('error', 'Pembayaran tidak ditemukan');
            return back();
        }
    }

    public function prosesEditPembayaran(Request $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->hitApiService->PATCH('api/pembayaran/'.$request->post('id'), [
            'toko_id'   => Session::get('toko')->id,
            'nama'      => $request->post('namaPembayaran'),
        ]);

        if (isset($result) && $result->status) {
            Session::flash('success', 'Edit pembayaran berhasil');
        } else {
            Session::flash('error', 'Edit pembayaran gagal');
        }
        return redirect()->route('pembayaran');
    }
}
