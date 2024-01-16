<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class TransaksiController extends Controller
{
    public function buatTransaksi(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $toko = $this->hitApiService->GET('api/toko/'.Session::get('toko')->id, []);
        if ($toko->data->status == "active") {
            $dataParfum = $this->hitApiService->GET('api/parfum/toko/'.Session::get('toko')->id, []);
            $dataDiskon = $this->hitApiService->GET('api/diskon/toko/'.Session::get('toko')->id, []);
            $dataPembayaran = $this->hitApiService->GET('api/pembayaran/toko/'.Session::get('toko')->id, []);
            $dataLayanan = $this->hitApiService->GET('api/layanan/toko/'.Session::get('toko')->id, []);
            $dataPengiriman = $this->hitApiService->GET('api/pengiriman/toko/'.Session::get('toko')->id, []);

            $parfum = $dataParfum->data ?? [];
            $diskon = $dataDiskon->data ?? [];
            $pembayaran = $dataPembayaran->data ?? [];
            $layanan = $dataLayanan->data ?? [];
            $pengiriman = $dataPengiriman->data ?? [];

            $title = 'buat transaksi';
            return view('transaksi.buat', compact('title', 'parfum', 'diskon', 'pembayaran', 'layanan', 'pengiriman'));
        } else {
            Session::flash('error', 'Outlet '.Session::get('toko')->nama.' sudah masuk tanggal Expire pada '.tanggal_jam_indo(Session::get('toko')->expired).', Silahkan perpanjang lisensi outlet untuk dapat membuat transaksi');
            return redirect()->action([OutletController::class, 'index']);
        }
    }

    public function createTransaksi(Request $request): \Illuminate\Http\JsonResponse
    {
        $create = $this->hitApiService->POST('api/transaksi', [
            'toko_id'           => Session::get('toko')->id,
            'pelanggan_id'      => $request->post('pelanggan_id'),
            'diskon_id'         => $request->post('diskon_id'),
            'parfum_id'         => $request->post('parfum_id'),
            'pengiriman_id'     => $request->post('pengiriman_id'),
            'pembayaran_id'     => $request->post('pembayaran_id'),
            'status_pembayaran' => $request->post('status_pembayaran'),
            'harga'             => $request->post('harga'),
            'harga_diskon'      => $request->post('harga_diskon'),
            'total_harga'       => $request->post('total_harga'),
            'layanan'           => $request->post('layanan'),
        ]);

        Log::info(json_encode($create));
        Log::info(json_encode($request->all()));

        if (isset($create) && $create->status) {
            return response()->json([
               'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function listTransaksi(): View
    {
        $dataTransaksi = $this->hitApiService->GET('api/transaksi/toko/'.Session::get('toko')->id, []);
        $transaksi = $dataTransaksi->data ?? [];

        $title = 'list transaksi';
        return view('transaksi.list', compact('transaksi', 'title'));
    }

    public function historiTransaksi(): View
    {
        $dataTransaksi = $this->hitApiService->GET('api/transaksi/history/toko/'.Session::get('toko')->id, []);
        $transaksi = $dataTransaksi->data ?? [];

        $title = 'histori transaksi';
        return view('transaksi.histori', compact('transaksi', 'title'));
    }

    public function lihatTransaksi($order_number): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $dataTransaksi = $this->hitApiService->GET('api/transaksi/'.$order_number, []);
        if (isset($dataTransaksi) && $dataTransaksi->status && $dataTransaksi->data->transaksi != null) {
            $transaksi = $dataTransaksi->data->transaksi;
            $detail = $dataTransaksi->data->detail;
            $histori = $dataTransaksi->data->transaksi->histori_status_transaksi;
            $title = "list transaksi";
            return view('transaksi.lihat', compact('title', 'transaksi', 'detail', 'histori'));
        } else {
            Session::flash('error', 'Transaksi tidak ditemukan');
            return back();
        }
    }

    public function prosesTransaksi($order_number, $status): \Illuminate\Http\JsonResponse
    {
        $prosesTransaksi = $this->hitApiService->PATCH('api/transaksi/'.$order_number.'/'.$status, []);
        if (isset($prosesTransaksi) && $prosesTransaksi->status) {
            return response()->json([
                'status'    => true,
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }

    public function cetakStruk()
    {
        $profile = CapabilityProfile::load('simple');
        $connector = new CupsPrintConnector("HaoYin_CX588");
        $printer = new Printer($connector, $profile);
        $printer -> text("TES PRINT");
        $printer -> cut();
        $printer -> close();
    }

    public function cetakNotaTransaksi($transaksi_id)
    {
        $pdf = PDF::loadview('pdf.struk',[]);
        return $pdf->stream('laporan-pegawai-pdf');
    }
}
