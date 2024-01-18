<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    <title>@yield('title') | LaundryMu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <div class="top-tagbar">
        <div class="w-100">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto col-9">
                    <div class="text-white-50 fs-13">
                        <i class="bi bi-clock align-middle me-2"></i> <span id="current-time"></span>
                    </div>
                </div>
                <div class="col-md-auto col-6 d-none d-lg-block">
                    <div class="d-flex align-items-center justify-content-center gap-3 fs-13 text-white-50">
                        <div>
                            <i class="bi bi-envelope align-middle me-2"></i> support@laundrymu.co.id
                        </div>
                        <div>
                            <i class="bi bi-globe align-middle me-2"></i> www.laundrymu.co.id
                        </div>
                    </div>
                </div>
                <div class="col-md-auto col-3">
                </div>
            </div>
        </div>
    </div>
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="22">
                                    </span>
                            <span class="logo-lg">
                                        <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="25">
                                    </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="22">
                                    </span>
                            <span class="logo-lg">
                                        <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="25">
                                    </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                                <span class="hamburger-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                    </button>
                </div>

                <div class="d-flex align-items-center">

                    <div class="d-md-none topbar-head-dropdown header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" id="page-header-search-dropdown" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="bi bi-search fs-16"></i>
                        </button>
                    </div>

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" data-toggle="fullscreen">
                            <i class='bi bi-arrows-fullscreen fs-16'></i>
                        </button>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-sun align-middle fs-20"></i>
                        </button>
                        <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                            <a href="#!" class="dropdown-item" data-mode="light"><i class="bi bi-sun align-middle me-2"></i> Defualt (light mode)</a>
                            <a href="#!" class="dropdown-item" data-mode="dark"><i class="bi bi-moon align-middle me-2"></i> Dark</a>
                            <a href="#!" class="dropdown-item" data-mode="auto"><i class="bi bi-moon-stars align-middle me-2"></i> Auto (system defualt)</a>
                        </div>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown"  data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bi bi-bell fs-18'></i>
                            <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"><span class="notification-badge">4</span><span class="visually-hidden">unread messages</span></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                            <div class="dropdown-head rounded-top">
                                <div class="p-3 border-bottom border-bottom-dashed">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="mb-0 fs-16 fw-semibold"> Notifications <span class="badge badge-soft-danger fs-13 notification-badge"> 4</span></h6>
                                            <p class="fs-14 text-muted mt-1 mb-0">You have <span class="fw-semibold notification-unread">3</span> unread messages</p>
                                        </div>
                                        <div class="col-auto dropdown">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="link-secondary fs-14"><i class="bi bi-three-dots-vertical"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">All Clear</a></li>
                                                <li><a class="dropdown-item" href="#">Mark all as read</a></li>
                                                <li><a class="dropdown-item" href="#">Archive All</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="py-2 ps-2" id="notificationItemsTabContent">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    <h6 class="text-overflow text-muted fs-13 my-2 text-uppercase notification-title">New</h6>
                                    <div class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                            <i class="bx bx-badge-check"></i>
                                                        </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 fs-14 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                        Optimization <span class="text-secondary">reward</span> is ready!
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                                    <label class="form-check-label" for="all-notification-check01"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="position-relative me-3 flex-shrink-0">
                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                                <span class="active-badge position-absolute start-100 translate-middle p-1 bg-success rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-1 fs-14 fw-semibold">Angela Bernier</h6>
                                                </a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">Answered to your comment on the cash flow forecast's graph 🔔.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                    <label class="form-check-label" for="all-notification-check02"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                        <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                            <i class='bx bx-message-square-dots'></i>
                                                        </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 fs-14 lh-base">You have received <b class="text-success">20</b> new messages in the conversation
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="all-notification-check03">
                                                    <label class="form-check-label" for="all-notification-check03"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="text-overflow text-muted fs-13 my-2 text-uppercase notification-title">Read Before</h6>

                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">

                                            <div class="position-relative me-3 flex-shrink-0">
                                                <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                                <span class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                            </div>

                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-1 fs-14 fw-semibold">Maureen Gibson</h6>
                                                </a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                                    <label class="form-check-label" for="all-notification-check04"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-actions" id="notification-actions">
                                    <div class="d-flex text-muted justify-content-center align-items-center">
                                        Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result <button type="button" class="btn btn-link link-danger p-0 ms-2" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                        <span class="text-start ms-xl-2">
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Session::get('data_user')->nama }}</span>
                                            <span class="d-none d-xl-block ms-1 fs-13 text-muted user-name-sub-text">{{ Session::get('toko')->nama }}</span>
                                        </span>
                                    </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome Diana!</h6>
                            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                            <a class="dropdown-item" href="#!"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                            <a class="dropdown-item" href="#!"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                            <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$8451.36</b></span></a>
                            <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded">
                <div class="modal-header p-3">
                    <div class="position-relative w-100">
                        <input type="text" class="form-control form-control-lg border-2" placeholder="Search for hybrix..." autocomplete="off" id="search-options" value="">
                        <span class="bi bi-search search-widget-icon fs-17"></span>
                        <a href="javascript:void(0);" class="search-widget-icon fs-14 link-secondary text-decoration-underline search-widget-icon-close d-none" id="search-close-options">Clear</a>
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 overflow-hidden" id="search-dropdown">

                    <div class="dropdown-head rounded-top">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-14 text-muted fw-semibold"> RECENT SEARCHES </h6>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-item bg-transparent text-wrap">
                            <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                            <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                        </div>
                    </div>

                    <div data-simplebar style="max-height: 300px;" class="pe-2 ps-3 my-3">
                        <div class="list-group list-group-flush">
                            <div class="notification-group-list">
                                <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">Apps Pages</h5>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-speedometer2 me-2"></i> <span>Analytics Dashboard</span></a>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-filetype-psd me-2"></i> <span>hybrix.psd</span></a>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-ticket-detailed me-2"></i> <span>Support Tickets</span></a>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-file-earmark-zip me-2"></i> <span>hybrix.zip</span></a>
                            </div>

                            <div class="notification-group-list">
                                <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">Links</h5>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-link-45deg me-2 align-middle"></i> <span>www.themesbrand.com</span></a>
                            </div>

                            <div class="notification-group-list">
                                <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">People</h5>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                        <div>
                                            <h6 class="mb-0">Ayaan Bowen</h6>
                                            <span class="fs-13 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                        <div>
                                            <h6 class="mb-0">Alexander Kristi</h6>
                                            <span class="fs-13 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                        <div>
                                            <h6 class="mb-0">Alan Carla</h6>
                                            <span class="fs-13 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- removeNotificationModal -->
    <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i class="bi bi-trash display-4"></i>
                        </div>
                        <div class="mt-4 fs-15">
                            <h4 class="mb-1">Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="26">
                        </span>
                <span class="logo-lg">
                            <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="26">
                        </span>
            </a>
            <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="26">
                        </span>
                <span class="logo-lg">
                            <img src="{{ asset('assets/images/laundrymu.png') }}" alt="" height="26">
                        </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link menu-link {{ $title == "dashboard" ? "active" : "" }}">
                            <i class="bi bi-speedometer2"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-title"><span data-key="t-menu">Transaksi</span></li>
                    <li class="nav-item">
                        <a href="{{ route('buatTransaksi') }}" class="nav-link menu-link {{ $title == "buat transaksi" ? "active" : "" }}">
                            <i class="bi bi-clipboard-plus"></i>
                            <span data-key="t-dashboard">Buat Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('listTransaksi') }}" class="nav-link menu-link {{ $title == "list transaksi" ? "active" : "" }}"> <i class="bi bi-clipboard2-data"></i> <span data-key="t-dashboard">List Transaksi</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('historiTransaksi') }}" class="nav-link menu-link {{ $title == "histori transaksi" ? "active" : "" }}"> <i class="bi bi-journal-text"></i> <span data-key="t-dashboard">Histori Transaksi</span> </a>
                    </li>

                    <li class="menu-title"><span data-key="t-menu">Lainnya</span></li>
                    <li class="nav-item">
                        <a href="{{ route('layanan') }}" class="nav-link menu-link {{ $title == "layanan" ? "active" : "" }}">
                            <i class="ri-t-shirt-air-line"></i>
                            <span data-key="t-dashboard">Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('parfum') }}" class="nav-link menu-link {{ $title == "parfum" ? "active" : "" }}">
                            <i class="bx bx-spray-can"></i>
                            <span data-key="t-dashboard">Parfum</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('diskon') }}" class="nav-link menu-link {{ $title == "diskon" ? "active" : "" }}">
                            <i class="mdi mdi-sale"></i>
                            <span data-key="t-dashboard">Diskon</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pelanggan') }}" class="nav-link menu-link {{ $title == "pelanggan" ? "active" : "" }}">
                            <i class="bi bi-person-video"></i>
                            <span data-key="t-dashboard">Pelanggan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pembayaran') }}" class="nav-link menu-link {{ $title == "pembayaran" ? "active" : "" }}">
                            <i class="bi bi-cash-stack"></i>
                            <span data-key="t-dashboard">Pembayaran</span>
                        </a>
                    </li>

                    <li class="menu-title"><span data-key="t-menu">Laporan</span></li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link menu-link"> <i class="bi bi-graph-up"></i> <span data-key="t-dashboard">Laporan Laundry</span> </a>
                    </li>

                    @if(Session::get('data_user')->role == "owner")
                        <li class="menu-title"><span data-key="t-menu">Pengaturan</span></li>
                        <li class="nav-item">
                            <a href="{{ route('pegawai') }}" class="nav-link menu-link {{ $title == "pegawai" ? "active" : "" }}">
                                <i class="bi bi-people"></i>
                                <span data-key="t-dashboard">Pegawai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                                <i class="bi bi-house"></i><span data-key="t-multi-level">Outlet</span>
                            </a>
                            <div class="collapse menu-dropdown {{ $title == "outlet" ? "show" : "" }} {{ $title == "pembayaran outlet" ? "show" : "" }}" id="sidebarMultilevel">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('outlet') }}" class="nav-link {{ $title == "outlet" ? "active" : "" }}"> Daftar Outlet </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('historiPembayaran') }}" class="nav-link {{ $title == "pembayaran outlet" ? "active" : "" }}"> Histori Pembayaran </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    <li class="menu-title"><span data-key="t-menu">Bantuan</span></li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link menu-link">
                            <i class="bi bi-chat-dots"></i>
                            <span data-key="t-dashboard">Live Chat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link menu-link">
                            <i class="bi bi-question-circle"></i>
                            <span data-key="t-dashboard">FAQ</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    @yield('konten')

    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

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

@yield('js')

<script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
