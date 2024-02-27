@extends('superAdmin.layout')
@section('title', 'Outlet')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Artikel</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Artikel</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">List Artikel</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Author</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Jumlah View</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($artikel as $ar)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ar->title }}</td>
                                                <td>{{ $ar->author }}</td>
                                                <td>
                                                    <img src="{{ asset('artikel/'.$ar->image) }}" alt="..." height="50">
                                                </td>
                                                <td>{{ $ar->status }}</td>
                                                <td>{{ $ar->view }}</td>
                                                <td></td>
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

@section('js')

@endsection
