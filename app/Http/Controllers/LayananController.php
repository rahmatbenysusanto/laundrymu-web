<?php

namespace App\Http\Controllers;

use App\Http\services\HitApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LayananController extends Controller
{
    public function index(): View
    {
        $dataLayanan = $this->hitApiService->GET('api/layanan/toko/'.Session::get('toko')->id, []);

        $layanan = $dataLayanan->data ?? [];

        $title = "layanan";
        return view('layanan.index', compact('title', 'layanan'));
    }

    public function tambahLayanan(Request $request)
    {
        $data['toko_id'] = Session::get('toko')->id;
        $data['nama'] = $request->post('nama');
        $data['type'] = $request->post('type');
        $data['harga'] = $request->post('harga');

        $create = $this->hitApiService->POST('api/layanan', $data);
        if (isset($create) && $create->status) {
            Session::flash('success', 'Layanan berhasil ditambahkan');
        } else {
            Session::flash('error', 'Layanan gagal ditambahkan');
        }
        return back();
    }

    public function hapusLayanan(Request $request): \Illuminate\Http\JsonResponse
    {
        $delete = $this->hitApiService->DELETE('api/layanan/'.$request->id);
        if (isset($delete) && $delete->status) {
            return response()->json([
                'status'    => true,
                'message'   => $delete->message
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => $delete->message
            ]);
        }
    }
}
