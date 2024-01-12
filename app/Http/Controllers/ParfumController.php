<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ParfumController extends Controller
{
    public function index(): View
    {
        $dataParfum = $this->hitApiService->GET('api/parfum/toko/'.Session::get('toko')->id, []);

        $parfum = $dataParfum->data ?? [];

        $title = "parfum";
        return view('parfum.index', compact('title', 'parfum'));
    }

    public function tambahParfum(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data['toko_id'] = Session::get('toko')->id;
        $data['nama'] = $request->post('nama');
        $data['harga'] = $request->post('harga');

        $create = $this->hitApiService->POST('api/parfum', $data);
        if (isset($create) && $create->status) {
            Session::flash('success', 'Parfum berhasil ditambahkan');
        } else {
            Session::flash('error', 'Parfum gagal ditambahkan');
        }
        return back();
    }
}
