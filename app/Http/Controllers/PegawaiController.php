<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PegawaiController extends Controller
{
    public function index(): View
    {
        $dataPegawai = $this->hitApiService->GET('api/pegawai/toko/'.Session::get('toko')->id, []);
        $pegawai = $dataPegawai->data ?? [];

        $title = "pegawai";
        return view('pegawai.index', compact('title', 'pegawai'));
    }

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $create = $this->hitApiService->POST('api/pegawai', [
            'nama'      => $request->post('nama'),
            'email'     => $request->post('email'),
            'no_hp'     => $request->post('no_hp'),
            'password'  => $request->post('password'),
            'toko_id'   => Session::get('toko')->id
        ]);

        if (isset($create) && $create->status) {
            Session::flash('success', 'Pegawai berhasil dibuat');
        } else {
            Session::flash('error', 'Pegawai gagal dibuat');
        }

        return back();
    }
}
