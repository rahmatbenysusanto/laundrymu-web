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

    public function absensiPegawai(): View
    {
        $dataPegawai = $this->hitApiService->GET('api/pegawai/toko/'.Session::get('toko')->id, []);
        $pegawai = $dataPegawai->data ?? [];

        $dataAbsenPegawai = $this->hitApiService->GET('api/data-absen-pegawai/'.Session::get('toko')->id, []);
        $absenPegawai = $dataAbsenPegawai->data ?? [];

        $title = "absensi pegawai";
        return view('pegawai.absensi', compact('title', 'pegawai', 'absenPegawai'));
    }

    public function createAbsenPegawai(Request $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->hitApiService->POST('api/absen-pegawai', [
            'toko_id'       => Session::get('toko')->id,
            'pegawai_id'    => $request->post('pegawai_id'),
            'status'        => $request->post('tipe'),
            'keterangan'    => $request->post('keterangan'),
            'tanggal'       => $request->post('tanggal')
        ]);

        if (isset($result) && $result->status) {
            Session::flash('success', 'Absen pegawai berhasil');
        } else {
            Session::flash('error', 'Absen pegawai gagal');
        }

        return back();
    }

    public function detailAbsenPegawai($pegawaiId): View
    {
        $result = $this->hitApiService->GET('api/absen-pegawai/'.base64_decode($pegawaiId), []);
        $absen = $result->data ?? [];

        $title = "absensi pegawai";
        return view('pegawai.detail_absen', compact('title', 'absen'));
    }

    public function gajiPegawai()
    {
        $title = "gaji pegawai";
        return view('pegawai.gaji', compact('title'));
    }
}
