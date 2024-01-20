@extends('layout')
@section('title', 'Edit Pelanggan')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Pelanggan</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lainnya</a></li>
                                    <li class="breadcrumb-item">Pelanggan</li>
                                    <li class="breadcrumb-item active">Edit Pelanggan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('prosesEditPelanggan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $pelanggan->id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pelanggan</label>
                                        <input type="text" class="form-control" value="{{ $pelanggan->nama }}" name="namaPelanggan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">No HP</label>
                                        <input type="text" class="form-control" value="{{ $pelanggan->no_hp }}" name="no_hp" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Edit Pelanggan</button>
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
