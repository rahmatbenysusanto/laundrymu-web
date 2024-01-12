<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PelangganController extends Controller
{
    public function index(): View
    {
        $dataPelanggan = $this->hitApiService->GET('api/pelanggan/toko/'.Session::get('toko')->id, []);

        $pelanggan = $dataPelanggan->data ?? [];

        $title = "pelanggan";
        return view('pelanggan.index', compact('title', 'pelanggan'));
    }

    public function tambahPelanggan(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data['toko_id'] = Session::get('toko')->id;
        $data['nama'] = $request->post('nama');
        $data['no_hp'] = $request->post('no_hp');

        $create = $this->hitApiService->POST('api/pelanggan', $data);
        if (isset($create) && $create->status) {
            Session::flash('success', 'Pelanggan berhasil ditambahkan');
        } else {
            Session::flash('error', 'Pelanggan gagal ditambahkan');
        }
        return back();
    }

    public function tambahPelangganAjax(Request $request): \Illuminate\Http\JsonResponse
    {
        $data['toko_id'] = Session::get('toko')->id;
        $data['nama'] = $request->post('nama');
        $data['no_hp'] = $request->post('no_hp');

        $create = $this->hitApiService->POST('api/pelanggan', $data);
        if (isset($create) && $create->status) {
            return response()->json([
                'status'    => true,
                'data'      => $create->data
            ]);
        } else {
            return response()->json([
                'status'    => false
            ]);
        }
    }

    public function getPelanggan(): \Illuminate\Http\JsonResponse
    {
        $dataPelanggan = $this->hitApiService->GET('api/pelanggan/toko/'.Session::get('toko')->id, []);

        $pelanggan = $dataPelanggan->data ?? [];

        return response()->json([
            'data'  => $pelanggan
        ]);
    }
}
