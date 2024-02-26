<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PelangganAdminController extends Controller
{
    public function index(): View
    {
        $dataUser = $this->hitApiService->GET('api/user', []);
        $user = $dataUser->data ?? [];

        $title = "pelanggan";
        return view('superAdmin.pelanggan.index', compact('title', 'user'));
    }
}
