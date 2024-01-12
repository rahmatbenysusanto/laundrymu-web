@extends('layout')
@section('title', 'Lihat Transaksi')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Lihat Transaksi</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                                    <li class="breadcrumb-item">List Transaksi</li>
                                    <li class="breadcrumb-item active">Lihat Transaksi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Informasi Transaksi</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <table>
                                            <tr>
                                                <td class="fw-bold">Order Number</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">{{ $transaksi->order_number }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Nama Pelanggan</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">{{ $transaksi->pelanggan->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">No HP</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">{{ $transaksi->pelanggan->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Pembayaran</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">{{ $transaksi->pembayaran->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Status Pembayaran</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">
                                                    @if($transaksi->status_pembayaran == 'lunas')
                                                        <span class="badge badge-soft-success">Lunas</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Belum Lunas</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Status Transaksi</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">
                                                    @if($transaksi->status == "baru")
                                                        <span class="badge badge-soft-primary">Baru</span>
                                                    @elseif($transaksi->status == "diproses")
                                                        <span class="badge badge-soft-warning">DiProses</span>
                                                    @else
                                                        <span class="badge badge-soft-success">Selesai</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <table>
                                            <tr>
                                                <td class="fw-bold">Tanggal</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">{{ tanggal_jam_indo($transaksi->created_at) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Harga</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">@currency($transaksi->harga)</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Ongkir Pengiriman</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">@currency($transaksi->pengiriman->harga)</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Diskon</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">@currency($transaksi->harga_diskon)</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Total Harga</td>
                                                <td class="fw-bold ps-3">:</td>
                                                <td class="ps-3">@currency($transaksi->total_harga)</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">List Layanan</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Layanan</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detail as $de)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $de->layanan->nama }}</td>
                                            <td>{{ $de->jumlah }}</td>
                                            <td>@currency($de->harga)</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
