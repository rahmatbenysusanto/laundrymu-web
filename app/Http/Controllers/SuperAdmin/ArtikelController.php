<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    public function list(): View
    {
        $dataArtikel = $this->hitApiService->GET('api/get-artikel', []);
        $artikel = $dataArtikel->data ?? [];

        $title = "artikel";
        return view('superAdmin.blog.list', compact('title', 'artikel'));
    }

    public function buatArtikel(): View
    {
        $title = "buat artikel";
        return view('superAdmin.blog.buat', compact('title'));
    }

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('artikel'), $imageName);

        $result = $this->hitApiService->POST('api/artikel', [
            'title'     => $request->post('title'),
            'artikel'   => $request->post('artikel'),
            'author'    => $request->post('author'),
            'image'     => $imageName,
            'status'    => $request->post('status') == "on" ? "active" : "inactive",
        ]);

        if (isset($result) && $result->status) {
            Session::flash('success', 'Artikel berhasil dibuat');
        } else {
            Session::flash('error', 'Artikel gagal dibuat');
        }

        return back();
    }
}
