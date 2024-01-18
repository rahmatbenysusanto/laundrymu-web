@extends('layout')
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
                                    <a href="{{ route('tambahOutlet') }}" class="btn btn-primary">Tambah Outlet</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Masa Aktif</th>
                                        <th>Outlet Status</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($outlet as $out)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $out->nama }}</td>
                                                <td>{{ $out->no_hp }}</td>
                                                <td>{{ $out->alamat }}</td>
                                                <td>
                                                    @if($out->status == "active")
                                                        <span class="badge badge-soft-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Non Aktif</span>
                                                    @endif
                                                </td>
                                                <td>{{ tanggal_indo($out->expired) }}</td>
                                                <td>
                                                    @if(Session::get('toko')->id === $out->id)
                                                        <span class="badge badge-soft-success">Sedang DiGunakan</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Tidak DiGunakan</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            @if(Session::get('toko')->id != $out->id)
                                                                <li>
                                                                    <a href="#" onclick="changeOutlet('{{ $out->id }}', '{{ $out->nama }}')" class="dropdown-item">
                                                                        <i class="ri-exchange-fill align-bottom me-2 text-muted"></i> Pindah Outlet
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a href="/lihat-outlet/{{ base64_encode($out->id) }}" class="dropdown-item">
                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i> Lihat
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/perpanjang-lisensi-outlet/{{ base64_encode($out->id) }}" class="dropdown-item">
                                                                    <i class="ri-calendar-event-fill align-bottom me-2 text-muted"></i> Perpanjang Lisensi
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item edit-item-btn">
                                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Histori Pembayaran
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item edit-item-btn">
                                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
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
