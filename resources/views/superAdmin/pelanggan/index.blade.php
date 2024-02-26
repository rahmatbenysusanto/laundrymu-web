@extends('superAdmin.layout')
@section('title', 'Outlet')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Outlet</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                                    <li class="breadcrumb-item active">Outlet</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Daftar Outlet</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        <th>Email</th>
                                        <th>OTP</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Buat Akun</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $usr)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $usr->nama }}</td>
                                                <td>{{ $usr->no_hp }}</td>
                                                <td>{{ $usr->email }}</td>
                                                <td>{{ $usr->otp }}</td>
                                                <td>{{ $usr->status }}</td>
                                                <td>{{ $usr->role }}</td>
                                                <td>{{ tanggal_jam_indo($usr->created_at) }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm">Detail</a>
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

@section('js')
    <script>
        function changeOutlet(id, nama) {
            Swal.fire({
                title:"Apakah anda yakin?",
                text:`Untuk pindah ke Outlet ${nama}.`,
                icon:"warning",
                showCancelButton:!0,
                confirmButtonText:"Pindah Outlet",
                cancelButtonText:"Kembali",
                confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass:"btn btn-danger w-xs mt-2",
                buttonsStyling:!1,showCloseButton:!0
            }).then(function(t) {
                if (t.value) {
                    $.ajax({
                        url: '{{ route('gunakanOutlet') }}',
                        method: 'GET',
                        data: {
                            id: id
                        },
                        success: function (res) {
                            Swal.fire({
                                html:'<div class="mt-3">' +
                                    '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                                    '<div class="mt-4 pt-2 fs-15">' +
                                    '<h4>Berhasil !</h4>' +
                                    '<p class="text-muted mx-4 mb-0">Berhasil pindah outlet.</p>' +
                                    '</div>' +
                                    '</div>',
                                confirmButtonText:"OK",
                                confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",
                                buttonsStyling:!1,
                                showCloseButton:!0
                            }).then(function (r) {
                                location.replace('{{ route('outlet') }}');
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
