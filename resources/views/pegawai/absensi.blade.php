@extends('layout')
@section('title', 'Absensi Pegawai')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Absensi Pegawai</h4>
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
                                <h4 class="card-title mb-0">Masukan Absen Pegawai</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('createAbsenPegawai') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Pegawai</label>
                                                <select class="form-select" name="pegawai_id">
                                                    @foreach($pegawai as $peg)
                                                        <option value="{{ $peg->user->id }}">{{ $peg->user->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Absen</label>
                                                <select class="form-select" name="tipe">
                                                    <option value="masuk">Masuk</option>
                                                    <option value="tidak masuk">Tidak Masuk</option>
                                                    <option value="izin">Izin</option>
                                                    <option value="libur">Libur</option>
                                                    <option value="tanggal merah">Tanggal Merah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Simpan Absen</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Absensi Pegawai</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pegawai</th>
                                            <th>No HP</th>
                                            <th class="text-center">Masuk Bulan {{ getBulan() }}</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($absenPegawai as $pegawai)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pegawai[0]->user->nama }}</td>
                                                <td>{{ $pegawai[0]->user->no_hp }}</td>
                                                <td class="text-center">{{ $pegawai[1] }}</td>
                                                <td>
                                                    <a href="/detail-absen-pegawai/{{ base64_encode($pegawai[0]->user->id) }}" class="btn btn-primary btn-sm">Detail</a>
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
