@extends('layout')
@section('title', 'Edit Diskon')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Diskon</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lainnya</a></li>
                                    <li class="breadcrumb-item">Diskon</li>
                                    <li class="breadcrumb-item active">Edit Diskon</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('prosesEditDiskon') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $diskon->id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Diskon</label>
                                        <input type="text" class="form-control" value="{{ $diskon->nama }}" name="namaDiskon" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tipe Diskon</label>
                                        <select class="form-select" name="tipeDiskon">
                                            <option value="nominal" {{ $diskon->type == "nominal" ? "selected" : "" }}>Nominal</option>
                                            <option value="presentase" {{ $diskon->type == "presentase" ? "selected" : "" }}>Presentase</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nominal Diskon</label>
                                        <input type="text" class="form-control" value="{{ $diskon->nominal }}" name="hargaDiskon" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Edit Diskon</button>
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
