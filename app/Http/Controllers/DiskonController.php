<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class DiskonController extends Controller
{
    public function index(): View
    {
        $dataDiskon = $this->hitApiService->GET('api/diskon/toko/'.Session::get('toko')->id, []);

        $diskon = $dataDiskon->data ?? [];

        $title = "diskon";
        return view('diskon.index', compact('title', 'diskon'));
    }

    public function tambahDiskon(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data['toko_id'] = Session::get('toko')->id;
        $data['nama'] = $request->post('nama');
        $data['type'] = $request->post('type');
        $data['nominal'] = $request->post('nominal');

        $create = $this->hitApiService->POST('api/diskon', $data);
        if (isset($create) && $create->status) {
            Session::flash('success', 'Diskon berhasil ditambahkan');
        } else {
            Session::flash('error', 'Diskon gagal ditambahkan');
        }
        return back();
    }
}
