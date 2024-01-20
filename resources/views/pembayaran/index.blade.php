@extends('layout')
@section('title', 'Pembayaran')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Pembayaran</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lainnya</a></li>
                                    <li class="breadcrumb-item active">Pembayaran</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-0">Daftar Pembayaran</h5>
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPembayaran">Tambah Pembayaran</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pembayaran</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pembayaran as $pel)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pel->nama }}</td>
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a href="/edit-pembayaran/{{ base64_encode($pel->id) }}" class="dropdown-item edit-item-btn">
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

    <div class="modal fade" id="tambahPembayaran" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambahPembayaran') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Pembayaran</label>
                            <input type="text" class="form-control" name="nama" required>
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

@section('js')
    <script>
        function hapusPembayaran(id) {
            Swal.fire({
                title:"Apakah kamu yakin?",
                text:"untuk menghapus pembayaran",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonText:"Yes, delete it!",
                cancelButtonText:"No, cancel!",
                confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass:"btn btn-danger w-xs mt-2",
                buttonsStyling:!1,showCloseButton:!0
            }).then(function(t){
                if (t.value) {
                    $.ajax({
                        url: '{{ route("hapusPembayaran") }}',
                        method: 'GET',
                        data: {
                            id: id
                        },
                        success: function (res) {
                            if (res.status) {
                                Swal.fire({
                                    html:'<div class="mt-3">' +
                                        '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Berhasil !</h4>' +
                                        '<p class="text-muted mx-4 mb-0">Hapus pembayaran berhasil.</p>' +
                                        '</div>' +
                                        '</div>',
                                    showCancelButton:!0,
                                    showConfirmButton:!1,
                                    cancelButtonClass:"btn btn-primary w-xs mb-1",
                                    cancelButtonText:"Kembali",
                                    buttonsStyling:!1,
                                    showCloseButton:!0
                                }).then(function (e) {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    html:'<div class="mt-3">' +
                                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Gagal !</h4>' +
                                        `<p class="text-muted mx-4 mb-0">${res.message}</p>` +
                                        '</div>' +
                                        '</div>',
                                    showCancelButton:!0,
                                    showConfirmButton:!1,
                                    cancelButtonClass:"btn btn-primary w-xs mb-1",
                                    cancelButtonText:"Kembali",
                                    buttonsStyling:!1,
                                    showCloseButton:!0
                                }).then(function (e) {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
