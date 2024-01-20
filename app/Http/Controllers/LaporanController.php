<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function laporanTransaksi(): View
    {
        $title = "laporan transaksi";
        return view('laporan.transaksi', compact('title'));
    }

    public function laporanPelanggan(): View
    {
        $title = "laporan pelanggan";
        return view('laporan.pelanggan', compact('title'));
    }
}
