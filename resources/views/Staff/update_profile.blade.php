@extends('layouts.app')



@section('content')
    <title>JTMK Supervisor | Manage Staff</title>
    <style type="text/css">
        html {
            overflow-y: hidden;
        }
    </style>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    </head>

    <body class="g-sidenav-show bg-gray-100">
        <div class="position-absolute w-100 min-height-300 top-0"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
            <span class="mask bg-primary opacity-6"></span>
        </div>
        <aside
            class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href=" {{ route('home') }} " target="_blank">
                    <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold">JTMK SUPERVISOR</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('staff_page', ['id' => 'dashboard']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PROFILE</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                            href="{{ route('staff_page', ['id' => 'update_profile']) }}?profile_picture">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Update Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('staff_page', ['id' => 'change_password']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Change Password</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Supervisee</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('staff_page', ['id' => 'manage_supervisee']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-collection text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Supervisee</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('staff_page', ['id' => 'supervisor_request']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-collection text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Supervisor Request</span>
                        </a>
                </ul>
            </div>
            <div class="sidenav-footer mx-3">
                <div class="card card-plain shadow-none" id="sidenavCard">
                    <img class="w-50 mx-auto"
                        src="https://puov2.gementar.com/wiki/lib/exe/fetch.php?w=400&tok=7c6b72&media=wiki:gementar.png"
                        alt="sidebar_illustration">
                    <div class="card-body text-center p-3 w-100 pt-0">
                        <div class="docs-info">
                            <p class="text-xs font-weight-bold mb-0">Develop by</p>
                            <h6 class="mb-0">Gementar Team</h6>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="main-content position-relative max-height-vh-100 h-100">
            <!-- Navbar -->
            <nav
                class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
                <div class="container-fluid py-1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5"
                                    href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
                        </ol>
                        <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
                    </nav>
                    <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="Type here...">
                            </div>
                        </div>
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Sign In</span>
                                </a>
                            </li>
                            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0">
                                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                        <div class="sidenav-toggler-inner">
                                            <i class="sidenav-toggler-line bg-white"></i>
                                            <i class="sidenav-toggler-line bg-white"></i>
                                            <i class="sidenav-toggler-line bg-white"></i>
                                        </div>
                                    </a>
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span> from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm bg-gradient-dark me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New album</span> by Travis Scott
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        1 day
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>credit-card</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background"
                                                                            d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                            opacity="0.593633743"></path>
                                                                        <path class="color-background"
                                                                            d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Payment successfully completed
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        2 days
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="card shadow-lg mx-4 card-profile-bottom">
                <div class="card-body p-3">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                @if (file_exists(public_path('downloadable/staff_img/' . Auth::user()->email . '.jpg')))
                                    <img src="{{ asset('downloadable/staff_img/' . Auth::user()->email . '.jpg') }}"
                                        class="w-90 h-100 border-radius-lg shadow-sm">
                                @else
                                    <img src="{{ asset('downloadable/staff_img/empty_profile.jpg') }}"
                                        class="w-90 h-100  border-radius-lg shadow-sm">
                                @endif
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ Auth::user()->name }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
            <div class="container-fluid py-4">
                <div class="row">

                    <div class="col-md-2 py-2">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                            </div>
                            <div class="card-body pt-0 p-3">
                                <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">Supervisee</h6>
                                <hr class="horizontal dark my-3">
                                <button type="button"
                                    class="btn
                                @if (isset($_GET['profile_picture'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?profile_picture'">Profile
                                    Picture</button>

                                <button type="button"
                                    class="btn
                                @if (isset($_GET['addition_information'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?addition_information'">Addition
                                    Information</button>


                                <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">Citation</h6>
                                <hr class="horizontal dark my-3">

                                <button type="button"
                                    class="btn
                                @if (isset($_GET['research'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?research'">Research</button>

                                <button type="button"
                                    class="btn
                                @if (isset($_GET['article'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?article'">Article</button>
                                <button type="button"
                                    class="btn
                                @if (isset($_GET['proceeding'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?proceeding'">Proceeding</button>
                                <button type="button"
                                    class="btn
                                @if (isset($_GET['others'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?others'">Others</button>
                                <button type="button"
                                    class="btn
                                @if (isset($_GET['supervision'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?supervision'">Supervision</button>
                                <button type="button"
                                    class="btn
                                @if (isset($_GET['consultation'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?consultation'">Consultation</button>
                                <button type="button"
                                    class="btn
                                @if (isset($_GET['award_recognition'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                    onclick="location.href='{{ route('staff_page', ['id' => 'update_profile']) }}?award_recognition'">Award/Recognition</button>
                            </div>
                        </div>
                    </div>

                    @if (isset($_GET['profile_picture']))
                        <div class="col-md-10 py-2">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    @if (isset($_GET['errors']))
                                        <div class="alert alert-danger" role="alert">
                                            <a style="color: white"> {{ $_GET['errors'] }} </a>
                                        </div>
                                    @endif
                                    @if (isset($_GET['success']))
                                        <div class="alert alert-success" role="alert">
                                            <a style="color: white"> {{ $_GET['success'] }} </a>
                                        </div>
                                    @endif
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                        <i class="fas fa-duotone fa-quote-left"></i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Profile Picture</h6>
                                    <span class="text-xs">Upload your profile picture here.</span>
                                    <br>
                                    <hr class="horizontal dark my-3">

                                    <form id="update-form" enctype="multipart/form-data"
                                        action="{{ route('updateProfilePicture') }}" method="POST">
                                        @csrf

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Upload Profile
                                                    Image (JPG MAX 15MB)</label>
                                                <br>
                                                <input type="file" class="form-control" id="fileImage" accept=".jpg"
                                                    required name="fileImage" />
                                                <input type="text" name="txtEmail" value="{{ Auth::user()->email }}"
                                                    hidden />
                                            </div>
                                        </div>

                                        <div class="text-center"">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($_GET['addition_information']))
                        <div class="col-md-10 py-2">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    @if (isset($_GET['errors']))
                                        <div class="alert alert-danger" role="alert">
                                            <a style="color: white"> {{ $_GET['errors'] }} </a>
                                        </div>
                                    @endif
                                    @if (isset($_GET['success']))
                                        <div class="alert alert-success" role="alert">
                                            <a style="color: white"> {{ $_GET['success'] }} </a>
                                        </div>
                                    @endif
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                        <i class="fas fa-duotone fa-quote-left"></i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Supervisee List</h6>
                                    <span class="text-xs">List of your supervisee.</span>
                                    <br>
                                    <hr class="horizontal dark my-3">

                                    <form id="update-form" action="{{ route('updateAdditionInformation') }}"
                                        method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">scopus
                                                    id</label>
                                                <br>
                                                <input class="form-control" type="text" name="txtScopusId"
                                                    placeholder="85645312345" value="{{ $currentStaffMain->scopus_id }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">google
                                                    scholar</label>
                                                <br>
                                                <input class="form-control" type="text" name="txtGoogleScholar"
                                                    placeholder="https://scholar.google.com/citations?user=d1_34eQERSVVBJ&hl=en&oi=ao"
                                                    value="{{ $currentStaffMain->google_scholar }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">consultation
                                                    price</label>
                                                <br>
                                                <input class="form-control" type="number" name="txtConsultationPrice"
                                                    placeholder="10000"
                                                    value="{{ $currentStaffMain->consultation_price }}">
                                            </div>
                                        </div>

                                        <div class="text-center"">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($_GET['research']))
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header pb-0">
                                </div>
                                <div class="card-body">
                                    @if (isset($_GET['errors']))
                                        <div class="alert alert-danger" role="alert">
                                            <a style="color: white"> {{ $_GET['errors'] }} </a>
                                        </div>
                                    @endif
                                    @if (isset($_GET['success']))
                                        <div class="alert alert-success" role="alert">
                                            <a style="color: white"> {{ $_GET['success'] }} </a>
                                        </div>
                                    @endif
                                    <p class="text-uppercase text-sm">ADD NEW RESEARCH</p>

                                    <form id="update-form" action="{{ route('insertStaffInfoResearch') }}"
                                        method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Tittle</label>
                                                    <input class="form-control" type="text" required name="txtTittle"
                                                        placeholder="Analysis of Research in Programming Teaching Tools"
                                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Institution</label>
                                                    <input class="form-control" type="text" required
                                                        name="txtInstitution" placeholder="Politeknik Ungku Omar"
                                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Position</label>
                                                    <select name="selectCategory" class="form-select"
                                                        aria-label="Default select example" required>
                                                        <option value="leader" selected>Leader</option>
                                                        <option value="member">Member</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Date</label>
                                                    <select name="selectDate" class="form-select"
                                                        aria-label="Default select example" required>
                                                        @for ($i = 1970; $i < date('Y'); $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                        <option selected value="{{ date('Y') }}">{{ date('Y') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Status</label>
                                                    <select name="selectStatus" class="form-select"
                                                        aria-label="Default select example" required>
                                                        <option selected value="completed">completed</option>
                                                        <option selected value="pending">pending</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-success btn-sm ms-auto">Submit</button>
                                        </div>

                                    </form>
                                    <hr class="horizontal dark">

                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Tittle</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Insitution</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Position</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Date</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Status</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($currentStaffInfos as $info)
                                                    @if ($info->category == 'research')
                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $info->tittle }}</p>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-success">{{ $info->green_text }}</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-primary">{{ $info->blue_text }}</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-danger">{{ $info->red_text }}</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-info">{{ $info->light_blue_text }}</span>
                                                            </td>
                                                            <td>
                                                                <form id="update-form"
                                                                    action="{{ route('deleteStaffInfo') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">remove</button>
                                                                    <input type="text" name="txtStaffInfoID"
                                                                        value="{{ $info->id }}" hidden>
                                                                    <input type="text" name="currentPage"
                                                                        value="research" hidden>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($_GET['article']))
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header pb-0">
                                </div>
                                <div class="card-body">
                                    @if (isset($_GET['errors']))
                                        <div class="alert alert-danger" role="alert">
                                            <a style="color: white"> {{ $_GET['errors'] }} </a>
                                        </div>
                                    @endif
                                    @if (isset($_GET['success']))
                                        <div class="alert alert-success" role="alert">
                                            <a style="color: white"> {{ $_GET['success'] }} </a>
                                        </div>
                                    @endif
                                    <p class="text-uppercase text-sm">ADD NEW ARTICLE</p>

                                    <form id="update-form" action="{{ route('insertStaffInfoArticle') }}"
                                        method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Tittle</label>
                                                    <input class="form-control" type="text" required name="txtTittle"
                                                        placeholder="Analysis of Research in Programming Teaching Tools"
                                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Info</label>
                                                    <input class="form-control" type="text" required name="txtInfo"
                                                        placeholder="Journal of Information and Communication Technology"
                                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Index</label>
                                                    <input class="form-control" type="text" required name="txtIndex"
                                                        placeholder="Google Scholar" onfocus="focused(this)"
                                                        onfocusout="defocused(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Author
                                                        Position</label>
                                                    <select name="selectAuthor" class="form-select"
                                                        aria-label="Default select example" required>
                                                        <option value="First Author" selected>First Author</option>
                                                        <option value="Co-Author">Co-Author</option>
                                                        <option value="Correspondence Author">Correspondence Author
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Date</label>
                                                    <select name="selectDate" class="form-select"
                                                        aria-label="Default select example" required>
                                                        @for ($i = 1970; $i < date('Y'); $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                        <option selected value="{{ date('Y') }}">{{ date('Y') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-success btn-sm ms-auto">Submit</button>
                                        </div>

                                    </form>
                                    <hr class="horizontal dark">

                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Tittle</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Info</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Index</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Date</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Author Position</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($currentStaffInfos as $info)
                                                    @if ($info->category == 'article')
                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $info->tittle }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $info->info }}</p>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-primary">{{ $info->blue_text }}</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-danger">{{ $info->red_text }}</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-success">{{ $info->green_text }}</span>
                                                            </td>
                                                            <td>
                                                                <form id="update-form"
                                                                    action="{{ route('deleteStaffInfo') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">remove</button>
                                                                    <input type="text" name="txtStaffInfoID"
                                                                        value="{{ $info->id }}" hidden>
                                                                    <input type="text" name="currentPage"
                                                                        value="article" hidden>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($_GET['proceeding']))
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header pb-0">
                                </div>
                                <div class="card-body">
                                    @if (isset($_GET['errors']))
                                        <div class="alert alert-danger" role="alert">
                                            <a style="color: white"> {{ $_GET['errors'] }} </a>
                                        </div>
                                    @endif
                                    @if (isset($_GET['success']))
                                        <div class="alert alert-success" role="alert">
                                            <a style="color: white"> {{ $_GET['success'] }} </a>
                                        </div>
                                    @endif
                                    <p class="text-uppercase text-sm">ADD NEW PROCEEDING</p>

                                    <form id="update-form" action="{{ route('insertStaffInfoProceeding') }}"
                                        method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Tittle</label>
                                                    <input class="form-control" type="text" required name="txtTittle"
                                                        placeholder="Analysis of Research in Programming Teaching Tools"
                                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Level</label>
                                                    <select name="selectLevel" class="form-select"
                                                        aria-label="Default select example" required>
                                                        <option value="national" selected>National</option>
                                                        <option value="international">International</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Date</label>
                                                    <select name="selectDate" class="form-select"
                                                        aria-label="Default select example" required>
                                                        @for ($i = 1970; $i < date('Y'); $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                        <option selected value="{{ date('Y') }}">{{ date('Y') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-success btn-sm ms-auto">Submit</button>
                                        </div>

                                    </form>
                                    <hr class="horizontal dark">

                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Tittle</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Date</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Level</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($currentStaffInfos as $info)
                                                    @if ($info->category == 'proceeding')
                                                        <tr>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $info->tittle }}</p>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-danger">{{ $info->red_text }}</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-sm bg-gradient-success">{{ $info->green_text }}</span>
                                                            </td>
                                                            <td>
                                                                <form id="update-form"
                                                                    action="{{ route('deleteStaffInfo') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">remove</button>
                                                                    <input type="text" name="txtStaffInfoID"
                                                                        value="{{ $info->id }}" hidden>
                                                                    <input type="text" name="currentPage"
                                                                        value="proceeding" hidden>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($_GET['others']))
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header pb-0">
                            </div>
                            <div class="card-body">
                                @if (isset($_GET['errors']))
                                    <div class="alert alert-danger" role="alert">
                                        <a style="color: white"> {{ $_GET['errors'] }} </a>
                                    </div>
                                @endif
                                @if (isset($_GET['success']))
                                    <div class="alert alert-success" role="alert">
                                        <a style="color: white"> {{ $_GET['success'] }} </a>
                                    </div>
                                @endif
                                <p class="text-uppercase text-sm">ADD NEW OTHERS</p>

                                <form id="update-form" action="{{ route('insertStaffInfoOthers') }}"
                                    method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Tittle</label>
                                                <input class="form-control" type="text" required name="txtTittle"
                                                    placeholder="Analysis of Research in Programming Teaching Tools"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Category</label>
                                                <input class="form-control" type="text" required name="txtCategory"
                                                    placeholder="Report/Art" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Level</label>
                                                <select name="selectLevel" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="national" selected>National</option>
                                                    <option value="international">International</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Date</label>
                                                <select name="selectDate" class="form-select"
                                                    aria-label="Default select example" required>
                                                    @for ($i = 1970; $i < date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                    <option selected value="{{ date('Y') }}">{{ date('Y') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-success btn-sm ms-auto">Submit</button>
                                    </div>

                                </form>
                                <hr class="horizontal dark">

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Tittle</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Category</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Date</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Level</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($currentStaffInfos as $info)
                                                @if ($info->category == 'others')
                                                    <tr>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                {{ $info->tittle }}</p>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-primary">{{ $info->blue_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-danger">{{ $info->red_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $info->green_text }}</span>
                                                        </td>
                                                        <td>
                                                            <form id="update-form"
                                                                action="{{ route('deleteStaffInfo') }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">remove</button>
                                                                <input type="text" name="txtStaffInfoID"
                                                                    value="{{ $info->id }}" hidden>
                                                                <input type="text" name="currentPage"
                                                                    value="others" hidden>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (isset($_GET['supervision']))
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header pb-0">
                            </div>
                            <div class="card-body">
                                @if (isset($_GET['errors']))
                                    <div class="alert alert-danger" role="alert">
                                        <a style="color: white"> {{ $_GET['errors'] }} </a>
                                    </div>
                                @endif
                                @if (isset($_GET['success']))
                                    <div class="alert alert-success" role="alert">
                                        <a style="color: white"> {{ $_GET['success'] }} </a>
                                    </div>
                                @endif
                                <p class="text-uppercase text-sm">ADD NEW SUPERVISION</p>

                                <form id="update-form" action="{{ route('insertStaffInfoSupervision') }}"
                                    method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Tittle</label>
                                                <input class="form-control" type="text" required name="txtTittle"
                                                    placeholder="Analysis of Research in Programming Teaching Tools"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Status</label>
                                                <select name="selectStatus" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="leader" selected>Completed</option>
                                                    <option value="member">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Position</label>
                                                <select name="selectPosition" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="leader" selected>Supervisor</option>
                                                    <option value="member">Co-Supervisor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Level</label>
                                                <select name="selectLevel" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option selected value="national">National</option>
                                                    <option value="international">International</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Academic Level</label>
                                                <select name="selectAcademicLevel" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option selected value="diploma">diploma</option>
                                                    <option value="Associate degree">Associate degree</option>
                                                    <option value="Bachelor degree">Bachelor degree</option>
                                                    <option value="Master degree">Master degree</option>
                                                    <option value="Doctoral degree">Doctoral degree</option>
                                                    <option value="Professional degree">Professional degree</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Date</label>
                                                <select name="selectDate" class="form-select"
                                                    aria-label="Default select example" required>
                                                    @for ($i = 1970; $i < date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                    <option selected value="{{ date('Y') }}">{{ date('Y') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-success btn-sm ms-auto">Submit</button>
                                    </div>

                                </form>
                                <hr class="horizontal dark">

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Tittle</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Status</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Position</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Date</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Level</th>
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Academic Level</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($currentStaffInfos as $info)
                                                @if ($info->category == 'supervision')
                                                    <tr>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                {{ $info->tittle }}</p>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-warning">{{ $info->yellow_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-info">{{ $info->light_blue_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-danger">{{ $info->red_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $info->green_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-primary">{{ $info->blue_text }}</span>
                                                        </td>
                                                        <td>
                                                            <form id="update-form"
                                                                action="{{ route('deleteStaffInfo') }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">remove</button>
                                                                <input type="text" name="txtStaffInfoID"
                                                                    value="{{ $info->id }}" hidden>
                                                                <input type="text" name="currentPage"
                                                                    value="supervision" hidden>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (isset($_GET['consultation']))
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header pb-0">
                            </div>
                            <div class="card-body">
                                @if (isset($_GET['errors']))
                                    <div class="alert alert-danger" role="alert">
                                        <a style="color: white"> {{ $_GET['errors'] }} </a>
                                    </div>
                                @endif
                                @if (isset($_GET['success']))
                                    <div class="alert alert-success" role="alert">
                                        <a style="color: white"> {{ $_GET['success'] }} </a>
                                    </div>
                                @endif
                                <p class="text-uppercase text-sm">ADD NEW CONSULTATION</p>

                                <form id="update-form" action="{{ route('insertStaffInfoConsultation') }}"
                                    method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Tittle</label>
                                                <input class="form-control" type="text" required name="txtTittle"
                                                    placeholder="Analysis of Research in Programming Teaching Tools"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Info</label>
                                                <input class="form-control" type="text" required name="txtInfo"
                                                    placeholder="Journal of Information and Communication Technology"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Position</label>
                                                <select name="selectPosition" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="leader" selected>Leader</option>
                                                    <option value="member">Member</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Status</label>
                                                <select name="selectStatus" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="completed" selected>Completed</option>
                                                    <option value="pendingr">Pending</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Date</label>
                                                <select name="selectDate" class="form-select"
                                                    aria-label="Default select example" required>
                                                    @for ($i = 1970; $i < date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                    <option selected value="{{ date('Y') }}">{{ date('Y') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-success btn-sm ms-auto">Submit</button>
                                    </div>

                                </form>
                                <hr class="horizontal dark">

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Tittle</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Info</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Position</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Date</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Status</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($currentStaffInfos as $info)
                                                @if ($info->category == 'consultation')
                                                    <tr>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                {{ $info->tittle }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                {{ $info->info }}</p>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-primary">{{ $info->blue_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-danger">{{ $info->red_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $info->green_text }}</span>
                                                        </td>
                                                        <td>
                                                            <form id="update-form"
                                                                action="{{ route('deleteStaffInfo') }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">remove</button>
                                                                <input type="text" name="txtStaffInfoID"
                                                                    value="{{ $info->id }}" hidden>
                                                                <input type="text" name="currentPage"
                                                                    value="consultation" hidden>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (isset($_GET['award_recognition']))
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header pb-0">
                            </div>
                            <div class="card-body">
                                @if (isset($_GET['errors']))
                                    <div class="alert alert-danger" role="alert">
                                        <a style="color: white"> {{ $_GET['errors'] }} </a>
                                    </div>
                                @endif
                                @if (isset($_GET['success']))
                                    <div class="alert alert-success" role="alert">
                                        <a style="color: white"> {{ $_GET['success'] }} </a>
                                    </div>
                                @endif
                                <p class="text-uppercase text-sm">ADD NEW AWARD/RECOGNITION</p>

                                <form id="update-form" action="{{ route('insertStaffInfoAward_Recognition') }}"
                                    method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Tittle</label>
                                                <input class="form-control" type="text" required name="txtTittle"
                                                    placeholder="Analysis of Research in Programming Teaching Tools"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Info</label>
                                                <input class="form-control" type="text" required name="txtInfo"
                                                    placeholder="Journal of Information and Communication Technology"
                                                    onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Level</label>
                                                <select name="selectLevel" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="international" selected>International</option>
                                                    <option value="national">National</option>
                                                    <option value="university" selected>University</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Medal</label>
                                                <select name="selectMedal" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="gold" selected>Gold</option>
                                                    <option value="bronze">Bronze</option>
                                                    <option value="silver">Silver</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Date</label>
                                                <select name="selectDate" class="form-select"
                                                    aria-label="Default select example" required>
                                                    @for ($i = 1970; $i < date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                    <option selected value="{{ date('Y') }}">{{ date('Y') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-success btn-sm ms-auto">Submit</button>
                                    </div>

                                </form>
                                <hr class="horizontal dark">

                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Tittle</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Info</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Level</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Date</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Medal</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($currentStaffInfos as $info)
                                                @if ($info->category == 'award_recognition')
                                                    <tr>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                {{ $info->tittle }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                {{ $info->info }}</p>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-primary">{{ $info->blue_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-danger">{{ $info->red_text }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $info->green_text }}</span>
                                                        </td>
                                                        <td>
                                                            <form id="update-form"
                                                                action="{{ route('deleteStaffInfo') }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">remove</button>
                                                                <input type="text" name="txtStaffInfoID"
                                                                    value="{{ $info->id }}" hidden>
                                                                <input type="text" name="currentPage"
                                                                    value="award_recognition" hidden>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <br><br><br><br><br>

                </div>
            </footer>
        </div>
        </div>
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-cog py-2"> </i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3 ">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">About</h5>
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0 overflow-auto">
                    <p>This project is created for Jabatan Teknologi Maklumat & Komunikasi Politeknik Ungku Omar.</p>
                    <div class="w-100 text-center">
                        <h6 class="mt-3">Check us out!</h6>
                        <a href="https://gementar.com" class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-earth-asia me-1" aria-hidden="true"></i> Website
                        </a>
                        <a href="https://github.com/themuhdhilmi/daftartprojekjtmk" class="btn btn-dark mb-0 me-2"
                            target="_blank">
                            <i class="fab fa-github-square me-1" aria-hidden="true"></i> Github
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    </body>

    </html>
@endsection
