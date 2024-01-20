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

    public function editDiskon($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $result = $this->hitApiService->GET('api/diskon/'.base64_decode($id), []);

        if (isset($result) && $result->status && $result->data != null) {
            $title = 'diskon';
            $diskon = $result->data;
            return view('diskon.edit', compact('title', 'diskon'));
        } else {
            Session::flash('error', 'Diskon tidak ditemukan');
            return back();
        }
    }

    public function prosesEditDiskon(Request $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->hitApiService->PATCH('api/diskon/'.$request->post('id'), [
            'toko_id'   => Session::get('toko')->id,
            'nama'      => $request->post('namaDiskon'),
            'type'      => $request->post('tipeDiskon'),
            'nominal'   => $request->post('hargaDiskon'),
        ]);

        if (isset($result) && $result->status) {
            Session::flash('success', 'Edit diskon berhasil');
        } else {
            Session::flash('error', 'Edit diskon gagal');
        }
        return redirect()->route('diskon');
    }
}
