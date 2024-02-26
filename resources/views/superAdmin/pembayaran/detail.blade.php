@extends('superAdmin.layout')
@section('title', 'Detail Pembayaran Outlet')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Detail Pembayaran Outlet</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                                    <li class="breadcrumb-item">Outlet</li>
                                    <li class="breadcrumb-item active">Detail Pembayaran</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <table>
                                            <tr>
                                                <td class="fw-bold">Nama Outlet</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">{{ $pembayaran->toko->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">No HP</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">{{ $pembayaran->toko->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Alamat</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">{{ $pembayaran->toko->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Expired Outlet</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">{{ tanggal_indo($pembayaran->toko->expired) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table>
                                            <tr>
                                                <td class="fw-bold">Nomor Pembayaran</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">{{ $pembayaran->nomor_pembayaran }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Tipe Lisensi</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">{{ $pembayaran->lisensi->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Nominal</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">@currency($pembayaran->lisensi->harga)</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Metode Pembayaran</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">{{ $pembayaran->pembayaran->metode_pembayaran }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Status Pembayaran</td>
                                                <td class="fw-bold ps-2">:</td>
                                                <td class="ps-2">
                                                    @if($pembayaran->status === "transfer")
                                                        <span class="badge badge-soft-success">Lunas</span>
                                                    @elseif($pembayaran->status === "menunggu pengecekan")
                                                        <span class="badge badge-soft-warning">Menunggu Pengecekan</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Belum Dibayar</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Metode Pembayaran</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/pembayaran/'.$pembayaran->pembayaran->logo) }}" alt="{{ $pembayaran->pembayaran->metode_pembayaran }}" height="60">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ $pembayaran->pembayaran->nomor }}" readonly>
                                            <a class="input-group-text btn btn-primary">Salin</a>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Atas Nama</label>
                                        <input type="text" class="form-control" value="{{ $pembayaran->pembayaran->nama }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nominal</label>
                                        <input type="text" class="form-control" value="@currency($pembayaran->lisensi->harga)" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Upload Bukti Pembayaran</h5>
                                        @if($pembayaran->status == "menunggu pengecekan")
                                            <a href="/super-admin/pembayaran/verifikasi-pembayaran/{{ $pembayaran->id }}" class="btn btn-primary">Verifikasi Pembayaran</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($pembayaran->bukti_transfer != null)
                                        <img src="{{ asset('bukti_pembayaran/'.$pembayaran->bukti_transfer) }}" alt="bukti_transfer" width="50%">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
