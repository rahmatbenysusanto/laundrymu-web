<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OutletAdminController extends Controller
{
    public function index(): View
    {
        $dataOutlet = $this->hitApiService->GET('api/toko', []);

        $outlet = $dataOutlet->data ?? [];

        $title = "outlet";
        return view('superAdmin.outlet.index', compact('title', 'outlet'));
    }
}
