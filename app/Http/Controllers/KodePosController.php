<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KodePosController extends Controller
{
    public function getKota(Request $request): \Illuminate\Http\JsonResponse
    {
        $dataKota = $this->hitApiService->GET('api/get-kota', [
            'provinsi'  => $request->provinsi
        ]);

        $kota = $dataKota->data ?? [];

        return response()->json([
            'data'  => $kota
        ]);
    }

    public function getKecamatan(Request $request): \Illuminate\Http\JsonResponse
    {
        $dataKecamatan = $this->hitApiService->GET('api/get-kecamatan', [
            'kota'      => $request->kota,
            'provinsi'  => $request->provinsi
        ]);

        $kecamatan = $dataKecamatan->data ?? [];

        return response()->json([
            'data'  => $kecamatan
        ]);
    }

    public function getKelurahan(Request $request): \Illuminate\Http\JsonResponse
    {
        $dataKelurahan = $this->hitApiService->GET('api/get-kelurahan', [
            'kecamatan' => $request->kecamatan,
            'kota'      => $request->kota,
            'provinsi'  => $request->provinsi
        ]);

        $kelurahan = $dataKelurahan->data ?? [];

        return response()->json([
            'data'  => $kelurahan
        ]);
    }

    public function getKodePos(Request $request): \Illuminate\Http\JsonResponse
    {
        $dataKodePos = $this->hitApiService->GET('api/get-kode-pos', [
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota'      => $request->kota,
            'provinsi'  => $request->provinsi
        ]);

        $kodePos = $dataKodePos->data ?? [];

        return response()->json([
            'data'  => $kodePos
        ]);
    }
}
