@extends('layout')
@section('title', 'Buat Transaksi')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Buat Transaksi</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                                    <li class="breadcrumb-item active">Buat Transaksi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="pelanggan" class="form-label">Nama Pelanggan</label>
                                            <div id="pelanggan">
                                                <a class="btn btn-primary" onclick="modalPelanggan()">Pilih Pelanggan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="parfum" class="form-label">Parfum Laundry</label>
                                            <select class="form-select" id="selectParfum">
                                                @foreach($parfum as $par)
                                                    <option value="{{ $par->id }}">{{ $par->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="parfum" class="form-label">Diskon Laundry</label>
                                            <select class="form-select" onchange="diskon(this)" id="selectDiskon">
                                                @foreach($diskon as $dis)
                                                    @if($dis->type == "nominal")
                                                        <option value="{{ $dis->id }}!{{ $dis->type }}!{{ $dis->nominal }}">{{ $dis->nama }} | @currency($dis->nominal)</option>
                                                    @else
                                                        <option value="{{ $dis->id }}!{{ $dis->type }}!{{ $dis->nominal }}">{{ $dis->nama }} | {{ $dis->nominal }} %</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="parfum" class="form-label">Pembayaran</label>
                                            <select class="form-select" id="selectPembayaran">
                                                @foreach($pembayaran as $pem)
                                                    <option value="{{ $pem->id }}">{{ $pem->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="parfum" class="form-label">Status Pelunasan</label>
                                            <select class="form-select" id="selectStatus">
                                                <option value="belum lunas">Belum DiBayar</option>
                                                <option value="lunas">Lunas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="parfum" class="form-label">Pengiriman</label>
                                            <select class="form-select" onchange="pengiriman(this)" id="selectPengiriman">
                                                @foreach($pengiriman as $peng)
                                                    <option value="{{ $peng->id }}!{{ $peng->harga }}">{{ $peng->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Pilih Layanan</label>
                                            <div class="row">
                                                <div class="col-8">
                                                    <select class="form-select" id="layanan">
                                                        @foreach($layanan as $lay)
                                                            <option value="{{ $lay->id }}!{{ $lay->nama }}!{{ $lay->type }}!{{ $lay->harga }}">{{ $lay->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <a class="btn btn-primary" onclick="pilihLayanan()">Pilih Layanan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">Nama Layanan</th>
                                                    <th scope="col">Tipe Layanan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col" style="max-width: 300px">Jumlah</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listLayanan">

                                            </tbody>
                                        </table>
                                        <div class="row mt-3">
                                            <div class="col-9"></div>
                                            <div class="col-2">
                                                <table>
                                                    <tr>
                                                        <td><p class="form-label">Harga</p></td>
                                                        <td><p class="form-label ms-3">:</p></td>
                                                        <td><p class="form-label ms-3" id="harga"></p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="form-label">Ongkos Kirim</p></td>
                                                        <td><p class="form-label ms-3">:</p></td>
                                                        <td><p class="form-label ms-3" id="ongkos_kirim">Rp 0,00</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="form-label">Diskon</p></td>
                                                        <td><p class="form-label ms-3">:</p></td>
                                                        <td><p class="form-label ms-3" id="diskon">Rp 0,00</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="form-label">Total DiBayarkan</p></td>
                                                        <td><p class="form-label ms-3">:</p></td>
                                                        <td><p class="form-label ms-3" id="total_dibayarkan">Rp 0,00</p></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <a class="btn btn-primary" onclick="prosesTransaksi()">Proses Transaksi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pilihPelanggan" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Daftar Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahPelanggan">Tambah Pelanggan Baru</a>
                    </div>
                    <table id="datatable_pelanggan" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>No HP</th>
                            <th>Pilih</th>
                        </tr>
                        </thead>
                        <tbody id="listPelanggan">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Pelanggan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="number" class="form-control" id="no_hp">
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary" onclick="tambahPelanggan()">Tambah</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        localStorage.removeItem('pelanggan');
        viewListLayanan();

        function modalPelanggan() {
            $.ajax({
               url: '{{ route('getPelanggan') }}',
               method: 'GET',
               success: function (res) {
                   let pelanggan = res.data;
                   let html = '';
                   pelanggan.forEach(function (pel) {
                        html += `
                            <tr>
                                <td>${pel.nama}</td>
                                <td>${pel.no_hp}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" onclick="pilihPelanggan('${pel.id}', '${pel.nama}', '${pel.no_hp}')">Pilih</a>
                                </td>
                            </tr>
                        `;
                   });
                   document.getElementById('listPelanggan').innerHTML = html;
                   new DataTable('#datatable_pelanggan', {
                   });
                   $("#pilihPelanggan").modal("show");
               }
            });
        }

        function pilihPelanggan(id, nama, no_hp) {
            let dataPelanggan = {
                'id' : id,
                'nama' : nama,
                'no_ho' : no_hp
            };
            localStorage.setItem('pelanggan', JSON.stringify(dataPelanggan));

            document.getElementById('pelanggan').innerHTML = `
                <div class="row">
                    <div class="col-3">
                        <input type="text" class="form-control" value="${nama} | ${no_hp}" readonly>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-primary ms-3" onclick="modalPelanggan()">Ubah Pelanggan</a>
                    </div>
                </div>
            `;
            $("#pilihPelanggan").modal("hide");
        }

        function tambahPelanggan() {
            let nama = document.getElementById('nama').value;
            let no_hp = document.getElementById('no_hp').value;

            if (nama === null || nama === "") {
                Swal.fire({
                    html:'<div class="mt-3">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Error !</h4>' +
                        '<p class="text-muted mx-4 mb-0">Nama Pelanggan Tidak Boleh Kosong!</p>' +
                        '</div>' +
                        '</div>',
                    showCancelButton:!0,
                    showConfirmButton:!1,
                    cancelButtonClass:"btn btn-primary w-xs mb-1",
                    cancelButtonText:"Kembali",
                    buttonsStyling:!1,
                    showCloseButton:!0
                })
            }

            if (no_hp === null || no_hp === "") {
                Swal.fire({
                    html:'<div class="mt-3">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Error !</h4>' +
                        '<p class="text-muted mx-4 mb-0">No HP Pelanggan Tidak Boleh Kosong!</p>' +
                        '</div>' +
                        '</div>',
                    showCancelButton:!0,
                    showConfirmButton:!1,
                    cancelButtonClass:"btn btn-primary w-xs mb-1",
                    cancelButtonText:"Kembali",
                    buttonsStyling:!1,
                    showCloseButton:!0
                })
            }

            $.ajax({
                url: '{{ route('tambahPelangganAjax') }}',
                method: 'POST',
                data: {
                    nama: nama,
                    no_hp: no_hp,
                    _token: '{{ @csrf_token() }}'
                },
                success: function (res) {
                    if (res.status) {
                        pilihPelanggan(res.data, nama, no_hp);
                        $("#tambahPelanggan").modal('hide');
                    } else {
                        Swal.fire({
                            html:'<div class="mt-3">' +
                                '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                                '<div class="mt-4 pt-2 fs-15">' +
                                '<h4>Error !</h4>' +
                                '<p class="text-muted mx-4 mb-0">Pelanggan gagal ditambahkan!</p>' +
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

        function pilihLayanan() {
            let layanan = document.getElementById('layanan').value;
            let check = 0;

            let splitLayanan = layanan.split('!');

            let dataLayanan = JSON.parse(localStorage.getItem('layanan')) ?? [];
            dataLayanan.forEach(function (res) {
                if (parseInt(splitLayanan[0]) === parseInt(res.id)) {
                    check++;
                }
            });

            if (check === 0) {
                let data = {
                    'id' : splitLayanan[0],
                    'nama' : splitLayanan[1],
                    'type': splitLayanan[2],
                    'harga': splitLayanan[3],
                    'jumlah': 1,
                    'total': parseInt(splitLayanan[3])
                }
                dataLayanan.push(data);
                localStorage.setItem('layanan', JSON.stringify(dataLayanan));
                viewListLayanan();
            } else {
                Swal.fire({
                    html:'<div class="mt-3">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Error !</h4>' +
                        `<p class="text-muted mx-4 mb-0">Layanan ${splitLayanan[1]} telah ditambahkan ke dalam list</p>` +
                        '</div>' +
                        '</div>',
                    showCancelButton:!0,
                    showConfirmButton:!1,
                    cancelButtonClass:"btn btn-primary w-xs mb-1",
                    cancelButtonText:"Kembali",
                    buttonsStyling:!1,
                    showCloseButton:!0
                })
            }
        }

        function viewListLayanan() {
            let layanan = JSON.parse(localStorage.getItem('layanan')) ?? [];

            let html = '';
            let text;
            layanan.forEach(function (res) {
                if (res.type === 'berat') {
                    text = 'KG';
                } else {
                    text = 'PCS';
                }
                html += `
                    <tr>
                        <td>${res.nama}</td>
                        <td>${res.type}</td>
                        <td>${formatRupiah(res.harga)}</td>
                        <td style="max-width: 300px">
                            <div class="input-group">
                                <input type="number" class="form-control" style="max-width: 300px" value="${res.jumlah}" onchange="changeJumlah(this, ${res.id})">
                                <span class="input-group-text" id="basic-addon2">${text}</span>
                            </div>
                        </td>
                        <td>${formatRupiah(res.total)}</td>
                        <td><a class="btn btn-danger btn-sm" onclick="hapusLayanan(${res.id})">Hapus</a></td>
                    </tr>
                `;
            });

            document.getElementById('listLayanan').innerHTML = html;
            totalHarga();
            changeDiskon();
            totalDiBayarkan();
        }

        function hapusLayanan(id) {
            let layanan = JSON.parse(localStorage.getItem('layanan')) ?? [];
            let data = [];
            layanan.forEach(function (res) {
                if (parseInt(id) !== parseInt(res.id)) {
                    data.push(res);
                }
            });
            localStorage.setItem('layanan', JSON.stringify(data));
            viewListLayanan();
        }

        function changeJumlah(num, id) {
            let layanan = JSON.parse(localStorage.getItem('layanan')) ?? [];

            let data = [];
            layanan.forEach(function (res) {
                if (parseInt(id) === parseInt(res.id)) {
                    data.push({
                        'id' : res.id,
                        'nama' : res.nama,
                        'type': res.type,
                        'harga': res.harga,
                        'jumlah': num.value,
                        'total': parseFloat(num.value) * parseInt(res.harga)
                    });
                } else {
                    data.push(res);
                }
            });
            localStorage.setItem('layanan', JSON.stringify(data));
            viewListLayanan();
        }

        function formatRupiah(num) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            }).format(num);
        }

        function pengiriman(data) {
            let split = data.value;
            let dataSplit = split.split('!');
            let id = dataSplit[0];
            let harga = dataSplit[1];

            localStorage.setItem('pengiriman', JSON.stringify({
                'id' : id,
                'harga' : harga
            }));
            document.getElementById('ongkos_kirim').innerText = formatRupiah(harga);
            totalDiBayarkan();
        }

        function diskon(data) {
            let dataSplit = data.value;
            let splitDiskon = dataSplit.split('!');
            let id = splitDiskon[0];
            let type = splitDiskon[1];
            let nominal = splitDiskon[2];

            let diskon;
            if (type === "nominal") {
                diskon = nominal;
            } else {
                diskon = parseInt(localStorage.getItem('harga')) * (parseInt(nominal) / 100);
            }

            localStorage.setItem('diskon', JSON.stringify({
                'id' : id,
                'type' : type,
                'nominal': diskon
            }));

            document.getElementById('diskon').innerText = formatRupiah(parseInt(diskon));
            totalDiBayarkan();
        }

        function changeDiskon() {
            let dataDiskon = document.getElementById('selectDiskon').value;

            let splitDiskon = dataDiskon.split('!');
            let id = splitDiskon[0];
            let type = splitDiskon[1];
            let nominal = splitDiskon[2];

            let diskon;
            if (type === "nominal") {
                diskon = nominal;
            } else {
                diskon = parseInt(localStorage.getItem('harga')) * (parseInt(nominal) / 100);
            }

            localStorage.setItem('diskon', JSON.stringify({
                'id' : id,
                'type' : type,
                'nominal': diskon
            }));

            document.getElementById('diskon').innerText = formatRupiah(parseInt(diskon));
            totalDiBayarkan();
        }

        function totalHarga() {
            let layanan = JSON.parse(localStorage.getItem('layanan')) ?? [];
            let harga = 0;
            layanan.forEach(function (res) {
                harga += parseInt(res.total);
            });
            document.getElementById('harga').innerText = formatRupiah(harga);
            localStorage.setItem('harga', harga);
        }

        function totalDiBayarkan() {
            let layanan = JSON.parse(localStorage.getItem('layanan')) ?? [];
            let harga = 0;
            layanan.forEach(function (res) {
                harga += parseInt(res.total);
            });

            let dataDiskon = JSON.parse(localStorage.getItem('diskon')) ?? 0;
            let dataOngkir = JSON.parse(localStorage.getItem('pengiriman')) ?? 0;

            let diskon = dataDiskon.nominal ?? 0;
            let ongkir = dataOngkir.harga ?? 0;

            let totalDiBayarkan = (harga + parseInt(ongkir)) - parseInt(diskon);
            localStorage.setItem('totalDiBayarkan', JSON.stringify(totalDiBayarkan));
            document.getElementById('total_dibayarkan').innerText = formatRupiah(totalDiBayarkan);
        }

        function error(message) {
            Swal.fire({
                html:'<div class="mt-3">' +
                    '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Gagal !</h4>' +
                    `<p class="text-muted mx-4 mb-0">${message}</p>` +
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

        function prosesTransaksi() {
            Swal.fire({
                title:"Apakah anda yakin?",
                text:"Untuk memproses transaksi ini.",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonText:"Proses Transaksi",
                cancelButtonText:"Kembali",
                confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass:"btn btn-danger w-xs mt-2",
                buttonsStyling:!1,showCloseButton:!0
            }).then(function(t){
                if (t.value) {
                    let err = 0;
                    let dataPelanggan = JSON.parse(localStorage.getItem('pelanggan')) ?? null;
                    if (dataPelanggan === null) {
                        err++;
                        error("Pelanggan tidak boleh kosong");
                    }

                    let dataDiskon = JSON.parse(localStorage.getItem('diskon')) ?? null;
                    let dataPengiriman = document.getElementById('selectPengiriman').value;
                    let pengirimanId = dataPengiriman.split('!');

                    if (err === 0) {
                        $.ajax({
                            url: "{{ route('createTransaksi') }}",
                            method: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                pelanggan_id: dataPelanggan.id,
                                diskon_id: dataDiskon.id,
                                parfum_id: document.getElementById('selectParfum').value,
                                pengiriman_id: pengirimanId[0],
                                pembayaran_id: document.getElementById('selectPembayaran').value,
                                status_pembayaran: document.getElementById('selectStatus').value,
                                harga: localStorage.getItem('harga'),
                                harga_diskon: dataDiskon.nominal,
                                total_harga: localStorage.getItem('totalDiBayarkan'),
                                layanan: JSON.parse(localStorage.getItem('layanan'))
                            },
                            success: function (res) {
                                if (res.status) {
                                    localStorage.removeItem('harga');
                                    localStorage.removeItem('pelanggan');
                                    localStorage.removeItem('diskon');
                                    localStorage.removeItem('totalDiBayarkan');
                                    localStorage.removeItem('pengiriman');
                                    localStorage.removeItem('layanan');

                                    Swal.fire({
                                        html:'<div class="mt-3">' +
                                            '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                                            '<div class="mt-4 pt-2 fs-15">' +
                                            '<h4>Berhasil !</h4>' +
                                            '<p class="text-muted mx-4 mb-0">Transaksi berhasil dibuat.</p>' +
                                            '</div>' +
                                            '</div>',
                                        confirmButtonText:"OK",
                                        confirmButtonClass:"btn btn-primary w-xs me-2 mt-2",
                                        buttonsStyling:!1,
                                        showCloseButton:!0
                                    }).then(function (r) {
                                        location.replace('{{ route('listTransaksi') }}');
                                    });
                                } else {
                                    error('Transaksi Gagal DiBuat');
                                }
                            }
                        });
                    }
                }
            });
        }
    </script>
@endsection
