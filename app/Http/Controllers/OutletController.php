<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OutletController extends Controller
{
    public function index(): View
    {
        $dataOutlet = $this->hitApiService->GET('api/toko/user/'.Session::get('data_user')->id, []);

        $outlet = $dataOutlet->data ?? [];

        $title = "outlet";
        return view('outlet.index', compact('title', 'outlet'));
    }

    public function gunakanOutlet(Request $request): \Illuminate\Http\JsonResponse
    {
        $outletId = $request->id;
        $dataOutlet = $this->hitApiService->GET('api/toko/user/'.Session::get('data_user')->id, []);

        Log::info('tes');
        foreach ($dataOutlet->data as $outlet) {
            if ($outletId == $outlet->id) {
                Session::put('toko', $outlet);
            }
        }

        return response()->json([
           'status' => true
        ]);
    }
}
