<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardAdminController extends Controller
{
    public function index(): View
    {
        $title = "dashboard";
        return view('superAdmin.dashboard', compact('title'));
    }
}
