@extends('layout')
@section('title', 'Diskon')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Diskon</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lainnya</a></li>
                                    <li class="breadcrumb-item active">Diskon</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-0">Daftar Diskon</h5>
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDiskon">Tambah Diskon</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Diskon</th>
                                        <th>Tipe Diskon</th>
                                        <th>Nominal</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($diskon as $dis)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dis->nama }}</td>
                                            <td>{{ $dis->type }}</td>
                                            @if($dis->type == 'nominal')
                                                <td>@currency($dis->nominal)</td>
                                            @else
                                                <td>{{ $dis->nominal }} %</td>
                                            @endif
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a href="#" class="dropdown-item">
                                                                <i class="ri-eye-fill align-bottom me-2 text-muted"></i> Lihat
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn">
                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus
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

    <div class="modal fade" id="tambahDiskon" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Diskon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambahDiskon') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Diskon</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipe Diskon</label>
                            <select class="form-select" name="type">
                                <option value="nominal">Nominal</option>
                                <option value="presentase">Persen</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nominal</label>
                            <input type="text" class="form-control" name="nominal">
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
