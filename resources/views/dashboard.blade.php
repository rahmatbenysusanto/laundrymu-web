@extends('layout')
@section('konten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">

                        <div class="h-100">
                            <div class="row">
                                <div class="col-4">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Laundry Baru</p>
                                                    <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $statusTransaksi->baru ?? 0 }}">0</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                        <i class="bx bx-party text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                        <div class="animation-effect-6 text-primary opacity-25 fs-18">
                                            <i class="bx bx-party"></i>
                                        </div>
                                        <div class="animation-effect-4 text-primary opacity-25 fs-18">
                                            <i class="bx bx-party"></i>
                                        </div>
                                        <div class="animation-effect-3 text-primary opacity-25 fs-18">
                                            <i class="bx bx-party"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Laundry DiProses</p>
                                                    <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $statusTransaksi->diproses ?? 0 }}">0</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                        <i class="bx bxs-washer text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                        <div class="animation-effect-6 text-info opacity-25 fs-18">
                                            <i class="bx bxs-washer"></i>
                                        </div>
                                        <div class="animation-effect-4 text-info opacity-25 fs-18">
                                            <i class="bx bxs-washer"></i>
                                        </div>
                                        <div class="animation-effect-3 text-info opacity-25 fs-18">
                                            <i class="bx bxs-washer"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Laundry Selesai</p>
                                                    <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $statusTransaksi->selesai ?? 0 }}">0</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                                        <i class="bx bxs-box text-success"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                        <div class="animation-effect-6 text-success opacity-25 fs-18">
                                            <i class="bx bxs-box"></i>
                                        </div>
                                        <div class="animation-effect-4 text-success opacity-25 fs-18">
                                            <i class="bx bxs-box"></i>
                                        </div>
                                        <div class="animation-effect-3 text-success opacity-25 fs-18">
                                            <i class="bx bxs-box"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-6">
                                            <!-- card -->
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="flex-grow-1">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Pendapatan Bulanan</p>
                                                            <h4 class="fs-22 fw-semibold mb-3">Rp. <span class="counter-value" data-target="{{ $nominalTransaksi->nominal_transaksi }}">0</span></h4>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <p class="text-muted mb-0">Pendapatan Bulan {{ getBulan() }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                                <i class="bx bx-dollar-circle text-success"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                                <div class="animation-effect-6 text-success opacity-25 fs-18">
                                                    <i class="bi bi-currency-dollar"></i>
                                                </div>
                                                <div class="animation-effect-4 text-success opacity-25 fs-18">
                                                    <i class="bi bi-currency-pound"></i>
                                                </div>
                                                <div class="animation-effect-3 text-success opacity-25 fs-18">
                                                    <i class="bi bi-currency-euro"></i>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-12 col-md-6">
                                            <!-- card -->
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="avatar-sm flex-shrink-0">
                                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                        <i class="bx bx-shopping-bag text-info"></i>
                                                                    </span>
                                                        </div>
                                                        <div class="text-end flex-grow-1">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Jumlah Transaksi</p>
                                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $transaksiHarian->jumlah }}">0</span></h4>
                                                            <div class="d-flex align-items-center justify-content-end gap-2">
                                                                <p class="text-muted mb-0">Jumlah Transaksi Perhari</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                                <div class="animation-effect-6 text-info opacity-25 left fs-18">
                                                    <i class="bi bi-handbag"></i>
                                                </div>
                                                <div class="animation-effect-4 text-info opacity-25 left fs-18">
                                                    <i class="bi bi-shop"></i>
                                                </div>
                                                <div class="animation-effect-3 text-info opacity-25 left fs-18">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-12 col-md-6">
                                            <!-- card -->
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="flex-grow-1">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Pendapatan Harian</p>
                                                            <h4 class="fs-22 fw-semibold mb-3">Rp. <span class="counter-value" data-target="{{ $transaksiHarian->nominal }}">0</span></h4>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <p class="text-muted mb-0">Pendapatan Laundry Harian</p>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                                        <i class="bx bx-user-circle text-warning"></i>
                                                                    </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                                <div class="animation-effect-6 text-warning opacity-25 fs-18">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                                <div class="animation-effect-4 text-warning opacity-25 fs-18">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                                <div class="animation-effect-3 text-warning opacity-25 fs-18">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div> <!-- end row-->
                                </div>
                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Pendapatan</h4>
                                            <div>
                                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                                    1 Minggu
                                                </button>
                                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                                    1 Bulan
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-sm">
                                                    1 Tahun
                                                </button>
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-header p-0 border-0 bg-soft-light">
                                            <div class="row g-0 text-center">
                                                <div class="col-6 col-sm-6">
                                                    <div class="p-3 border border-dashed border-start-0">
                                                        <h5 class="mb-1" id="nominalTransaksi">0</h5>
                                                        <p class="text-muted mb-0">Nominal Transaksi</p>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-sm-6">
                                                    <div class="p-3 border border-dashed border-start-0">
                                                        <h5 class="mb-1" id="jumlahTransaksi">0</h5>
                                                        <p class="text-muted mb-0">Jumlah Transaksi</p>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-body p-0 pb-2">
                                            <div class="w-100">
                                                <div id="customer_impression_charts" data-colors='["--tb-dark", "--tb-primary", "--tb-secondary"]' class="apex-charts" dir="ltr"></div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- card -->
                                    <div class="card bg-info-subtle text-info border-0">
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                <div class="col-sm">
                                                    <h5 class="card-title fs-17">{{ Session::get('toko')->nama }}</h5>
                                                    <p class="mb-0">Outlet aktif sampai : {{ tanggal_indo(Session::get('toko')->expired) }}</p>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <button type="button" class="btn btn-info btn-label rounded-pill"><i class="ri-markup-line label-icon align-middle rounded-pill fs-16 me-2"></i> Perpanjang Lisensi Outlet</button>
                                                </div>
                                            </div>
                                            <div class="position-absolute top-0 start-50 mt-2 opacity-25">
                                                <i class="bi bi-shop display-4"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Top Pelanggan Bulan {{ getBulan() }}</h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive table-card">
                                                <table class="table table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>No HP</th>
                                                        <th class="text-center">Total Transaksi</th>
                                                        <th>Total Nominal Transaksi</th>
                                                        <th class="text-center">Transaksi Bulanan</th>
                                                        <th>Nominal Bulanan</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($pelanggan as $pel)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $pel->nama }}</td>
                                                                <td>{{ $pel->no_hp }}</td>
                                                                <td class="text-center">{{ $pel->jumlah_transaksi }}</td>
                                                                <td>@currency($pel->nominal_transaksi)</td>
                                                                <td class="text-center">{{ $pel->jumlah_transaksi_bulanan }}</td>
                                                                <td>@currency($pel->nominal_transaksi_bulanan)</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->

                    <div class="col-auto layout-rightside-col">
                        <div class="overlay"></div>
                        <div class="layout-rightside">
                            <div class="card h-100 rounded-0">
                                <div class="widget-userlist" data-simplebar>
                                    <div class="card-body pb-0">
                                        <p class="text-muted text-uppercase fw-medium fs-13">Recent Chat</p>
                                        <ul class="hstack gap-2 chat-panel-list list-unstyled">
                                            <li>
                                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                                    <div class="chat-user-img online">
                                                        <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Ashley Silva</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                                    <div class="chat-user-img online">
                                                        <img src="assets/images/users/avatar-2.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Misty Taylor</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                                    <div class="chat-user-img away">
                                                        <img src="assets/images/users/avatar-3.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Scott Wilson</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                                    <div class="chat-user-img online">
                                                        <img src="assets/images/users/avatar-4.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Patricia Wilson</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                                    <div class="chat-user-img away">
                                                        <img src="assets/images/users/avatar-5.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Allyson Wigfall</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="search-box flex-grow-1">
                                                <input type="text" class="form-control" id="searchResultList" autocomplete="off" placeholder="Search for ...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="chat-panel-list list-group list-group-flush mb-0 border-dashed">
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Ashley Silva</h6></a>
                                                        <p class="chatlist-desc fs-13 text-info mb-0 text-truncate">Good Morning</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="mb-1 text-muted fs-12">04:32 PM</p>
                                                        <span class="badge badge-soft-info rounded-circle fs-10">4</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Misty Taylor</h6></a>
                                                        <p class="chatlist-desc fs-13 text-info mb-0 text-truncate">Okay, Byy</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="mb-1 text-muted fs-12">02:49 PM</p>
                                                        <span class="badge badge-soft-info rounded-circle fs-10">1</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Scott Wilson</h6></a>
                                                        <p class="chatlist-desc fs-13 text-info mb-0 text-truncate">Yeah everything is fine...</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="mb-1 text-muted fs-12">12:04 PM</p>
                                                        <span class="badge badge-soft-info rounded-circle fs-10">8</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Patricia Wilson</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Hey! there I'm available</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">11:11 AM</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Allyson Wigfall</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">I've finished it! See you so</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">09:24 AM</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Martha Griffin</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Wow that's great</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">16/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Mark Sargent</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Nice to meet you</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">16/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Ray Stricklin</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Hey, Hi Ray Stricklin ...!</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">16/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Frank Taylor</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Happy holiday 🙂</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">15/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Karla Basso</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Okay, Sure.</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">14/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Sally McPherson</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Thanks</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">14/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Lizzie Beil</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Our next meeting tomorrow at 10.00 AM</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">13/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Mark Williams</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">See you tomorrow</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">12/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Vina Scott</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Yeah everything is fine...</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">11/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Keli Henry</h6></a>
                                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Good afternoon</p>
                                                    </div>
                                                    <div class="text-end align-self-start">
                                                        <p class="mb-1 text-muted fs-12">11/11</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-user-chatlist">
                                    <div class="chat-topbar p-4 border-bottom border-bottom-dashed">
                                        <div class="align-items-center d-flex">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2">
                                                        <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-1.jpg" class="rounded-circle img-fluid userprofile" alt="">
                                                                <span class="user-status"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-14 mb-0 profile-username">Ashley Silva</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex align-items-start gap-2">
                                                    <div class="dropdown">
                                                        <a class="btn btn-ghost-secondary btn-sm fs-16" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#"><i class="bi bi-archive text-muted me-2"></i> Archive</a>
                                                            <a class="dropdown-item" href="#"><i class="bi bi-mic-mute text-muted me-2"></i> Muted</a>
                                                            <a class="dropdown-item" href="#"><i class="bi bi-trash3 text-muted me-2"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-soft-danger btn-sm fs-16" id="close-chatlist"><i class="ri-close-fill"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end chat-topbar -->
                                    <div class="card-body p-0">
                                        <div>
                                            <div id="users-chat">
                                                <div class="chat-conversation p-3" id="chat-conversation" data-simplebar>
                                                    <ul class="list-unstyled chat-conversation-list chat-sm" id="users-conversation">
                                                        <li class="chat-list left">
                                                            <div class="conversation-list">
                                                                <div class="chat-avatar">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                                                </div>
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content">
                                                                            <p class="mb-0 ctext-content">Good morning 😊</p>
                                                                        </div>
                                                                        <div class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="bi bi-three-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><small class="text-muted time">09:07 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- chat-list -->

                                                        <li class="chat-list right">
                                                            <div class="conversation-list">
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content">
                                                                            <p class="mb-0 ctext-content">Good morning, How are you? What about our next meeting?</p>
                                                                        </div>
                                                                        <div class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="bi bi-three-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><small class="text-muted time">09:08 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- chat-list -->

                                                        <li class="chat-list left">
                                                            <div class="conversation-list">
                                                                <div class="chat-avatar">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                                                </div>
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content">
                                                                            <p class="mb-0 ctext-content">Yeah everything is fine. Our next meeting tomorrow at 10.00 AM</p>
                                                                        </div>
                                                                        <div class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="bi bi-three-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content">
                                                                            <p class="mb-0 ctext-content">Yeah everything is fine.</p>
                                                                        </div>
                                                                        <div class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="bi bi-three-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content">
                                                                            <p class="mb-0 ctext-content">Hey, I'm going to meet a friend of mine at the department store. I have to buy some presents for my parents 🎁.</p>
                                                                        </div>
                                                                        <div class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="bi bi-three-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><small class="text-muted time">09:10 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- chat-list -->

                                                        <li class="chat-list right">
                                                            <div class="conversation-list">
                                                                <div class="user-chat-content">
                                                                    <div class="ctext-wrap">
                                                                        <div class="ctext-wrap-content">
                                                                            <p class="mb-0 ctext-content">Wow that's great</p>
                                                                        </div>
                                                                        <div class="dropdown align-self-start message-box-drop">
                                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="bi bi-three-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="conversation-name"><small class="text-muted time">09:12 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- chat-list -->

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative p-4 border-top border-top-dashed">
                                        <form class="chat-form" autocomplete="off">
                                            <div class="row g-2">
                                                <div class="col">
                                                    <div class="position-relative">
                                                        <input type="text" id="chat-input" class="form-control border-light bg-light" placeholder="Enter Message...">
                                                        <div class="chat-input-feedback">
                                                            Please enter a message
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill"></i></button>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end .rightbar-->
                    </div> <!-- end col -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <div>
            <button type="button" class="btn-success btn-rounded shadow-lg btn btn-icon layout-rightside-btn fs-22"><i class="ri-chat-smile-2-line"></i></button>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Laundrymu.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Laundrymu
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection


@section('js')
    <script>
        $.ajax({
            url: '{{ route('getChartDashboard') }}',
            method: 'GET',
            success: function (params) {
                document.getElementById('nominalTransaksi').innerText = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                }).format(params.data[3]);
                document.getElementById('jumlahTransaksi').innerText = params.data[2]

                chartTahun(params.data[1], params.data[0]);
            }
        });

        function getChartColorsArray(e) {
            if (null !== document.getElementById(e)) {
                var t = document.getElementById(e).getAttribute("data-colors");
                if (t) return (t = JSON.parse(t)).map(function(e) {
                    var t = e.replace(" ", "");
                    return -1 === t.indexOf(",") ? getComputedStyle(document.documentElement).getPropertyValue(t) || t : 2 == (e = e.split(",")).length ? "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")" : t
                });
                console.warn("data-colors atributes not found on", e)
            }
        }

        function chartTahun(nominal, jumlah) {
            let worldlinemap, overlay, options, chart, linechartcustomerColors = getChartColorsArray("customer_impression_charts"),
                chartDonutBasicColors = (linechartcustomerColors && (options = {
                    series: [{
                        name: "Jumlah",
                        type: "area",
                        data: jumlah
                    }, {
                        name: "Nominal",
                        type: "bar",
                        data: nominal
                    }],
                    chart: {
                        height: 310,
                        type: "line",
                        toolbar: {
                            show: !1
                        }
                    },
                    stroke: {
                        curve: "straight",
                        dashArray: [0, 0, 8],
                        width: [.1, 0, 2]
                    },
                    fill: {
                        opacity: [.03, .9, 1]
                    },
                    markers: {
                        size: [0, 0, 0],
                        strokeWidth: 2,
                        hover: {
                            size: 4
                        }
                    },
                    xaxis: {
                        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        axisTicks: {
                            show: !1
                        },
                        axisBorder: {
                            show: !1
                        }
                    },
                    grid: {
                        show: !0,
                        xaxis: {
                            lines: {
                                show: !0
                            }
                        },
                        yaxis: {
                            lines: {
                                show: !1
                            }
                        },
                        padding: {
                            top: 0,
                            right: -2,
                            bottom: 15,
                            left: 10
                        }
                    },
                    legend: {
                        show: !0,
                        horizontalAlign: "center",
                        offsetX: 0,
                        offsetY: -5,
                        markers: {
                            width: 9,
                            height: 9,
                            radius: 6
                        },
                        itemMargin: {
                            horizontal: 10,
                            vertical: 0
                        }
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "20%",
                            barHeight: "100%",
                            borderRadius: [8]
                        }
                    },
                    colors: linechartcustomerColors,
                    tooltip: {
                        shared: !0,
                        y: [{
                            formatter: function(e) {
                                return void 0 !== e ? e.toFixed(0) : e
                            }
                        }, {
                            formatter: function(e) {
                                return void 0 !== e ? new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                }).format(e.toFixed(2)) : e
                            }
                        }]
                    }
                }, (chart = new ApexCharts(document.querySelector("#customer_impression_charts"), options)).render()), getChartColorsArray("#store-visits-source"));
        }

    </script>
@endsection

