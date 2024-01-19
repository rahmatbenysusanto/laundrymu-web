@extends('layout')
@section('title', 'Outlet')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Perpanjang Lisensi Outlet</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                                    <li class="breadcrumb-item">Outlet</li>
                                    <li class="breadcrumb-item active">Perpanjang Lisensi Outlet</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Data Pembayaran Lisensi</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('perpanjangLisensiProses') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="toko_id" value="{{ $toko->id }}">
                                            <div class="mb-3">
                                                <label for="nama-outlet" class="form-label">Nama Outlet</label>
                                                <input type="text" class="form-control" name="namaOutlet" value="{{ $toko->nama }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lisensi" class="form-label">Pilihan Durasi Lisensi</label>
                                                <select class="form-select" name="lisensi" id="lisensi" required>
                                                    <option value="" disabled selected>Pilih Lisensi</option>
                                                    @foreach($lisensi as $lis)
                                                        <option value="{{ $lis->id }}">{{ $lis->nama }} | @currency($lis->harga)</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kodePromo" class="form-label">Kode Promo</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="kodePromo" id="kodePromo">
                                                    <span class="input-group-text cursor-pointer" id="basic-addon2">Cek Kode Promo</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
                                                <select class="form-select" name="metode_pembayaran" id="metodePembayaran" required>
                                                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                                    @foreach($metodePembayaran as $pem)
                                                        <option value="{{ $pem->id }}">{{ $pem->metode_pembayaran }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Proses Pembelian</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
