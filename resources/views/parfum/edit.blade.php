@extends('layout')
@section('title', ' Edit Parfum')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"> Edit Parfum</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lainnya</a></li>
                                    <li class="breadcrumb-item">Parfum</li>
                                    <li class="breadcrumb-item active"> Edit Parfum</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('prosesEditParfum') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $parfum->id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Parfum</label>
                                        <input type="text" class="form-control" value="{{ $parfum->nama }}" name="namaParfum" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga Parfum</label>
                                        <input type="text" class="form-control" value="{{ $parfum->harga }}" name="hargaParfum" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Edit Parfum</button>
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
