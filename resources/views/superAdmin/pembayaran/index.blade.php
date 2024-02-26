@extends('superAdmin.layout')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">List Pembayaran Lisensi</h4>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">List Pembayaran Outlet</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Outlet</th>
                                        <th>Nomor Pembayaran</th>
                                        <th>Tipe Lisensi</th>
                                        <th>Harga</th>
                                        <th>Pembayaran</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pembayaran as $pem)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pem->toko->nama }}</td>
                                            <td>
                                                <a href="/super-admin/pembayaran/{{ $pem->nomor_pembayaran }}">{{ $pem->nomor_pembayaran }}</a>
                                            </td>
                                            <td>{{ $pem->lisensi->nama }}</td>
                                            <td>@currency($pem->lisensi->harga)</td>
                                            <td>{{ $pem->pembayaran->metode_pembayaran }}</td>
                                            <td>
                                                @if($pem->status === "transfer")
                                                    <span class="badge badge-soft-success">Lunas</span>
                                                @elseif($pem->status == "menunggu pengecekan")
                                                    <span class="badge badge-soft-warning">Menunggu Pengecekan</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Belum Dibayar</span>
                                                @endif
                                            </td>
                                            <td>{{ tanggal_jam_indo($pem->created_at) }}</td>
                                            <td>
                                                <a href="/super-admin/pembayaran/{{ $pem->nomor_pembayaran }}" class="btn btn-primary btn-sm">Detail</a>
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
