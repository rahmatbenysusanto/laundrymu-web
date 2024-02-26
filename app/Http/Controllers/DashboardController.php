<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $topPelanggan = $this->hitApiService->GET('api/get-top-transaksi-pelanggan/'.Session::get('toko')->id, []);
        $dataStatusTransaksi = $this->hitApiService->GET('api/get-status-transaksi/'.Session::get('toko')->id, []);
        $dataNominalTransaksi = $this->hitApiService->GET('api/get-nominal-transaksi/'.Session::get('toko')->id, []);
        $dataTransaksiHarian = $this->hitApiService->GET('api/get-transaksi-harian/'.Session::get('toko')->id, []);

        $pelanggan = $topPelanggan->data ?? [];
        $statusTransaksi = $dataStatusTransaksi->data ?? [];
        $nominalTransaksi = $dataNominalTransaksi->data ?? [];
        $transaksiHarian = $dataTransaksiHarian->data ?? [];

        $title = "dashboard";
        return view('dashboard', compact('title', 'pelanggan', 'statusTransaksi', 'dataNominalTransaksi', 'nominalTransaksi', 'transaksiHarian'));
    }

    public function getChartDashboard(): \Illuminate\Http\JsonResponse
    {
        $dataChart = $this->hitApiService->GET('api/get-chart-dashboard/'.Session::get('toko')->id, []);

        return response()->json([
            'data'  => $dataChart->data
        ]);
    }
}
