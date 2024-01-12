@extends('layout')
@section('title', 'List Transaksi')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Transaksi</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                                    <li class="breadcrumb-item active">List Transaksi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Daftar Transaksi</h5>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Number</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Harga</th>
                                        <th>Pengiriman</th>
                                        <th>Diskon</th>
                                        <th>Total Harga</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi as $tra)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="#">{{ $tra->order_number }}</a>
                                                </td>
                                                <td>{{ $tra->pelanggan->nama }} | {{ $tra->pelanggan->no_hp }}</td>
                                                <td>{{ $tra->pembayaran->nama }}</td>
                                                <td class="text-center">
                                                    @if($tra->status_pembayaran == "lunas")
                                                        <span class="badge badge-soft-success">Lunas</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Belum Lunas</span>
                                                    @endif
                                                <td class="text-center">
                                                    @if($tra->status == "baru")
                                                        <span class="badge badge-soft-primary">Baru</span>
                                                    @elseif($tra->status == "diproses")
                                                        <span class="badge badge-soft-warning">DiProses</span>
                                                    @else
                                                        <span class="badge badge-soft-success">Selesai</span>
                                                    @endif
                                                <td>{{ tanggal_jam_indo($tra->created_at) }}</td>
                                                <td>@currency($tra->harga)</td>
                                                <td>@currency($tra->pengiriman->harga)</td>
                                                <td>@currency($tra->harga_diskon)</td>
                                                <td>@currency($tra->total_harga)</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                                <a href="/cetak-struk/{{ $tra->order_number }}" class="dropdown-item">
                                                                    <i class="ri-printer-fill align-bottom me-2 text-muted"></i> Cetak Struk
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/lihat-transaksi/{{ $tra->order_number }}" class="dropdown-item">
                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i> Lihat
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/proses-transaksi/{{ $tra->order_number }}" class="dropdown-item">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Proses
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
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
