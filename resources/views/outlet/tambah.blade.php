@extends('layout')
@section('title', 'Outlet')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Tambah Outlet</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                                    <li class="breadcrumb-item">Outlet</li>
                                    <li class="breadcrumb-item active">Tambah Outlet</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">Logo Laundry</label><br>--}}
{{--                                            <input type="file" class="form-control" accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">--}}
{{--                                            <label for="file" style="cursor: pointer;" class="mb-2">--}}
{{--                                                <a class="btn btn-primary btn-sm" id="uploadLogoText">Upload Logo</a>--}}
{{--                                            </label>--}}
{{--                                            <img id="output" width="200" alt="..."  src="" style="display: none"/>--}}
{{--                                        </div>--}}
                                        <div class="mb-3">
                                            <label class="form-label">Nama Outlet</label>
                                            <input type="text" class="form-control" id="nama">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">No HP</label>
                                            <input type="text" class="form-control" id="no_hp">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Provinsi</label>
                                                    <select class="form-select" id="provinsi" onchange="getProvinsi(this)">
                                                        <option>Pilih Provinsi</option>
                                                        @foreach($provinsi as $pro)
                                                            <option value="{{ $pro->nama_provinsi }}">{{ $pro->nama_provinsi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Kabupaten/Kota</label>
                                                    <select class="form-select" id="kota" onchange="getKota()">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Kecamatan</label>
                                                    <select class="form-select" id="kecamatan" onchange="getKecamatan()">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Kelurahan</label>
                                                    <select class="form-select" id="kelurahan" onchange="getKelurahan()">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kode POS</label>
                                            <select class="form-select" id="kodePos">

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lisensi" class="form-label">Pilihan Durasi Lisensi</label>
                                            <select class="form-select" name="lisensi" id="lisensi" onchange="pilihLisensi(this)">
                                                <option>Pilih Durasi Lisensi Outlet</option>
                                                @foreach($lisensi as $lis)
                                                    <option value="{{ $lis->id }}|{{ $lis->nama }}|{{ $lis->harga }}">{{ $lis->nama }} | @currency($lis->harga)</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kodePromo" class="form-label">Kode Promo</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="kodePromo" id="kodePromo">
                                                <span class="input-group-text cursor-pointer" id="basic-addon2">Cek Kode Promo</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
                                            <select class="form-select" name="metodePembayaran" id="metodePembayaran" onchange="metodePembayaran(this)">
                                                <option>Pilih Metode Pembayaran</option>
                                                @foreach($metodePembayaran as $pem)
                                                    <option value="{{ $pem->id }}|{{ $pem->metode_pembayaran }}">{{ $pem->metode_pembayaran }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Informasi Pembayaran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="fw-bold" id="namaLisensi">Lisensi belum dipilih</p>
                                        <p class="fw-bold mb-0" id="namaPembayaran">Pilih Metode Pembayaran</p>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <p class="fw-bold" id="durasiLisensi">Rp 0</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <p class="fw-bold mb-0">Rp 0</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="fw-bold" id="namaLisensi">Total Harga</p>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <p class="fw-bold" id="totalHarga">Rp 0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary" onclick="prosesPembayaran()">Proses Pembayaran</a>
                                </div>
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
        let loadFile = function(event) {
            document.getElementById('output').style.display = 'block';
            document.getElementById('uploadLogoText').innerText = 'Ganti Logo';
            let image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        localStorage.removeItem('nominalLisensi');
        localStorage.removeItem('lisensiId');
        localStorage.removeItem('metodePembayaran');

        function pilihLisensi(data) {
            let value = data.value;
            let lisensi = value.split('|');
            let namaLisensi = lisensi[1];
            let nominalLisensi = lisensi[2];
            localStorage.setItem('lisensiId', JSON.stringify(lisensi[0]));
            localStorage.setItem('nominalLisensi', JSON.stringify(nominalLisensi));
            document.getElementById('namaLisensi').innerText = "Lisensi Outlet Laundry " + namaLisensi;
            document.getElementById('durasiLisensi').innerText = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            }).format(parseInt(nominalLisensi))

            totalHarga();
        }

        function metodePembayaran(data) {
            let value = data.value;
            let metodePembayaran = value.split("|");
            document.getElementById('namaPembayaran').innerText = metodePembayaran[1];
            localStorage.setItem('metodePembayaran', JSON.stringify(metodePembayaran[0]));

            totalHarga();
        }

        function totalHarga() {
            let lisensi = JSON.parse(localStorage.getItem('nominalLisensi')) ?? 0;

            document.getElementById('totalHarga').innerText = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            }).format(parseInt(lisensi));
        }

        function prosesPembayaran() {
            Swal.fire({
                title:"Apakah anda yakin?",
                text:"Untuk memproses pembayaran ini.",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonText:"Proses Pembayaran",
                cancelButtonText:"Kembali",
                confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass:"btn btn-danger w-xs mt-2",
                buttonsStyling:!1,showCloseButton:!0
            }).then(function(t) {
                if (t.value) {
                    $.ajax({
                        url: '{{ route('createOutlet') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ @csrf_token() }}',
                            nama: document.getElementById('nama').value,
                            no_hp: document.getElementById('no_hp').value,
                            alamat: document.getElementById('alamat').value,
                            provinsi: document.getElementById('provinsi').value,
                            kota: document.getElementById('kota').value,
                            kecamatan: document.getElementById('kecamatan').value,
                            kelurahan: document.getElementById('kelurahan').value,
                            kodePos: document.getElementById('kodePos').value,
                            lisensi: document.getElementById('lisensi').value,
                            kodePromo: document.getElementById('kodePromo').value,
                            metodePembayaran: JSON.parse(localStorage.getItem('metodePembayaran')),
                            harga: JSON.parse(localStorage.getItem('nominalLisensi')),
                            lisensiId: JSON.parse(localStorage.getItem('lisensiId')),
                        },
                        success: function (params) {
                            if (params.status) {
                                Swal.fire({
                                    html:'<div class="mt-3">' +
                                        '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Berhasil !</h4>' +
                                        '<p class="text-muted mx-4 mb-0">Outlet berhasil dibuat.</p>' +
                                        '</div>' +
                                        '</div>',
                                    confirmButtonText:"OK",
                                    confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",
                                    buttonsStyling:!1,
                                    showCloseButton:!0
                                }).then(function (r) {
                                    location.replace('{{ route('historiPembayaran') }}');
                                });
                            } else {
                                Swal.fire({
                                    html:'<div class="mt-3">' +
                                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Gagal !</h4>' +
                                        `<p class="text-muted mx-4 mb-0">Outlet gagal dibuat.</p>` +
                                        '</div>' +
                                        '</div>',
                                    showCancelButton:!0,
                                    showConfirmButton:!1,
                                    cancelButtonClass:"btn btn-primary w-xs mb-1",
                                    cancelButtonText:"Kembali",
                                    buttonsStyling:!1,
                                    showCloseButton:!0
                                });
                            }
                        }
                    });
                }
            });
        }

        function getProvinsi(data) {
            $.ajax({
                url: '{{ route('getKota') }}',
                method: 'GET',
                data: {
                    provinsi: data.value
                },
                success: function (params) {
                    let html = '<option>Pilih Kabupaten/Kota</option';
                    let dataKota = params.data;

                    dataKota.forEach(function (kota) {
                        html += `
                            <option value="${kota.nama_kota}">${kota.nama_kota}</option>
                        `;
                    });

                    document.getElementById('kota').innerHTML = html;
                    document.getElementById('kecamatan').innerHTML = '';
                    document.getElementById('kelurahan').innerHTML = '';
                    document.getElementById('kodePos').innerHTML = '';
                }
            });
        }

        function getKota() {
            $.ajax({
                url: '{{ route('getKecamatan') }}',
                method: 'GET',
                data: {
                    provinsi: document.getElementById('provinsi').value,
                    kota: document.getElementById('kota').value
                },
                success: function (params) {
                    let html = '<option>Pilih kecamatan</option';
                    let dataKota = params.data;

                    dataKota.forEach(function (kota) {
                        html += `
                            <option value="${kota.nama_kecamatan}">${kota.nama_kecamatan}</option>
                        `;
                    });

                    document.getElementById('kecamatan').innerHTML = html;
                    document.getElementById('kelurahan').innerHTML = '';
                    document.getElementById('kodePos').innerHTML = '';
                }
            });
        }

        function getKecamatan() {
            $.ajax({
                url: '{{ route('getKelurahan') }}',
                method: 'GET',
                data: {
                    provinsi: document.getElementById('provinsi').value,
                    kota: document.getElementById('kota').value,
                    kecamatan: document.getElementById('kecamatan').value
                },
                success: function (params) {
                    let html = '<option>Pilih Kelurahan</option';
                    let dataKota = params.data;

                    dataKota.forEach(function (kota) {
                        html += `
                            <option value="${kota.nama_kelurahan}">${kota.nama_kelurahan}</option>
                        `;
                    });

                    document.getElementById('kelurahan').innerHTML = html;
                    document.getElementById('kodePos').innerHTML = '';
                }
            });
        }

        function getKelurahan() {
            $.ajax({
                url: '{{ route('getKodePos') }}',
                method: 'GET',
                data: {
                    provinsi: document.getElementById('provinsi').value,
                    kota: document.getElementById('kota').value,
                    kecamatan: document.getElementById('kecamatan').value,
                    kelurahan: document.getElementById('kelurahan').value
                },
                success: function (params) {
                    let dataKota = params.data;

                    document.getElementById('kodePos').innerHTML = `<option value="${dataKota[0].nama_kode_pos}">${dataKota[0].nama_kode_pos}</option>`;
                }
            });
        }
    </script>
@endsection
