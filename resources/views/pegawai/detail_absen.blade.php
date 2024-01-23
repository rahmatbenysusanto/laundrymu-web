@extends('layout')
@section('title', 'Detail Absensi Pegawai')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Detail Absensi Pegawai</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                                    <li class="breadcrumb-item">Pegawai</li>
                                    <li class="breadcrumb-item active">Absensi Pegawai</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pegawai</h4>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td class="fw-bold">Nama</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ $absen[0]->user->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">No HP</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ $absen[0]->user->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Masuk Bulan {{ getBulan() }}</td>
                                        <td class="fw-bold ps-2">:</td>
                                        <td class="ps-2">{{ $absen[1] }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Data Absen Bulan {{ getBeforeBulan() }} sampai {{ getBulan() }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Tipe</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($absen[2] as $ab)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ tanggal_indo($ab->tanggal) }}</td>
                                            <td>{{ $ab->status }}</td>
                                            <td>{{ $ab->keterangan }}</td>
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
