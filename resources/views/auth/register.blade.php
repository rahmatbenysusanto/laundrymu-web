<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Buat Akun | Laundrymu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>


<section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-lg-5">
                                <div class="auth-card card bg-primary h-100 border-0 shadow-none p-sm-3 overflow-hidden">
                                    <div class="card-body p-4 d-flex justify-content-between flex-column">
                                        <div class="auth-image">
                                            <img src="assets/images/logo-light-full.png" alt="" height="26" />
                                            <img src="assets/images/effect-pattern/auth-effect-2.png" alt="" class="auth-effect-2" />
                                            <img src="assets/images/effect-pattern/auth-effect.png" alt="" class="auth-effect" />
                                            <img src="assets/images/effect-pattern/auth-effect.png" alt="" class="auth-effect-3" />
                                        </div>

                                        <div>
                                            <h3 class="text-white">Mulai bisnis laundry anda bersama LaundryMu.</h3>
                                            <p class="text-white-75 fs-15">Sistem management laundry terbaik dengan fitur terlengkap & harga termurah</p>
                                        </div>
                                        <div class="text-center text-white-75">
                                            <script>document.write(new Date().getFullYear())</script>. Develop by LaundryMu Team
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-7">
                                <div class="card mb-0 border-0 py-3 shadow-none">
                                    <div class="card-body px-0 p-sm-5 m-lg-4">
                                        <div class="text-center mt-2">
                                            <h5 class="text-primary fs-20">Buat Akun Baru</h5>
                                            <p class="text-muted">Dapatkan gratis trial selama 30 hari gratis</p>
                                        </div>
                                        <div class="p-2 mt-5">
                                            <form class="needs-validation" action="{{ route('prosesRegister') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama anda" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email anda" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">No HP <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan nomor hp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="outlet" class="form-label">Nama Laundry <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="outlet" name="outlet" placeholder="Masukan nama laundry" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input type="password" class="form-control pe-5 password-input" onpaste="return false" name="password" placeholder="Masukan Password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <div class="invalid-feedback">
                                                            Masukan Password
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <p class="mb-0 fs-12 text-muted fst-italic">Dengan mendaftar, Anda menyetujui Laundrymu <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                                                </div>

                                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                    <h5 class="fs-13">Kata sandi harus mengandung:</h5>
                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimal <b>8 karakter</b></p>
                                                    <p id="pass-lower" class="invalid fs-12 mb-2">Mengandung huruf kecil (a-z)</p>
                                                    <p id="pass-upper" class="invalid fs-12 mb-2">Mengandung huruf besar (A-Z)</p>
                                                    <p id="pass-number" class="invalid fs-12 mb-0">Mengandung angka (0-9)</p>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Sudah memiliki akun laundrymu ? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Masuk </a> </p>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/passowrd-create.init.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('assets/js/pages/sweetalerts.init.js') }}"></script>

@if($message = Session::get('success'))
    <script>
        Swal.fire({
            html:'<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Berhasil !</h4>' +
                '<p class="text-muted mx-4 mb-0">{{ $message }}.</p>' +
                '</div>' +
                '</div>',
            showCancelButton:!0,
            showConfirmButton:!1,
            cancelButtonClass:"btn btn-primary w-xs mb-1",
            cancelButtonText:"Kembali",
            buttonsStyling:!1,
            showCloseButton:!0
        });
    </script>
@endif

@if($message = Session::get('error'))
    <script>
        Swal.fire({
            html:'<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Gagal !</h4>' +
                '<p class="text-muted mx-4 mb-0">{{ $message }}</p>' +
                '</div>' +
                '</div>',
            showCancelButton:!0,
            showConfirmButton:!1,
            cancelButtonClass:"btn btn-primary w-xs mb-1",
            cancelButtonText:"Kembali",
            buttonsStyling:!1,
            showCloseButton:!0
        })
    </script>
@endif

</body>

</html>
