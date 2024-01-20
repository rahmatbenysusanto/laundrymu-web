@extends('layout')
@section('title', ' Edit Layanan')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"> Edit Layanan</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lainnya</a></li>
                                    <li class="breadcrumb-item">Layanan</li>
                                    <li class="breadcrumb-item active"> Edit Layanan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('prosesEditLayanan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $layanan->id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Layanan</label>
                                        <input type="text" class="form-control" value="{{ $layanan->nama }}" name="namaLayanan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tipe Layanan</label>
                                        <select class="form-select" name="tipeLayanan">
                                            <option value="berat" {{ $layanan->type == "berat" ? "selected" : "" }}>berat</option>
                                            <option value="satuan" {{ $layanan->type == "satuan" ? "selected" : "" }}>satuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga Layanan</label>
                                        <input type="text" class="form-control" value="{{ $layanan->harga }}" name="hargaLayanan" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Edit Layanan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
