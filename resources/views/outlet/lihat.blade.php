@extends('layout')
@section('title', 'Outlet')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Lihat Outlet</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                                    <li class="breadcrumb-item">Outlet</li>
                                    <li class="breadcrumb-item active">Lihat Outlet</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Informasi Outlet</h5>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td class="fw-bold">Nama Outlet</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ $toko->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">No HP</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ $toko->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alamat</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ $toko->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tanggal Expire</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ tanggal_jam_indo($toko->expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Status Outlet</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">
                                            @if($toko->status == "active")
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Non Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Nama Outlet</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ $toko->nama }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
