@extends('layouts.app')



@section('content')
<title>IChooseSV | Manage Admin</title>
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
                    <a class="navbar-brand m-0" href=" {{  route('home') }} "
                    target="_blank">
                    <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold">IChooseSV</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin_page', ['id' => 'dashboard']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin_page', ['id' => 'manage_admin']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Admin</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin_page', ['id' => 'global_value']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Global Value</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">STAFF</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin_page', ['id' => 'manage_staff']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Staff</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin_page', ['id' => 'bulk_add_staff']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Bulk Add Staff</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">STUDENT</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin_page', ['id' => 'manage_student']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-collection text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Student</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin_page', ['id' => 'bulk_add_student']) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-collection text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Bulk Add Student</span>
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
                                <img src="https://cdn-icons-png.flaticon.com/512/270/270023.png" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
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

                    <div class="col-md-4 py-2">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="fas fa-duotone fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <div id="form-message" class="mt-3"></div>
                                <h6 class="text-center mb-0">Admin add</h6>
                                <span class="text-xs">admin can manage students and staff</span>
                                <hr class="horizontal dark my-3">

                                <form id="form" method="POST" action="{{ route('radmin') }}">
                                    @csrf
                                    <label for="example-text-input">Email</label>
                                    <input name="email" class="form-control" type="email" required>
                                    <label for="example-text-input">Full Name</label>
                                    <input name="name" class="form-control" type="text" required>
                                    <label for="example-text-input">Password</label>
                                    <input name="password" class="form-control" type="password" required minlength="8">
                                    <label for="example-text-input"> </label>
                                    <button type="submit" class="btn btn-primary btn-sm mb-0 w-100"
                                        id="submit-button">Add User</button>
                                </form>

                                <div id="form-message" class="mt-3"></div>

                                <script>
                                    $('#form').on('submit', function(e) {
                                        e.preventDefault();

                                        $.ajax({
                                            type: 'POST',
                                            url: $(this).attr('action'),
                                            data: $(this).serialize(),
                                            success: function(response) {
                                                $('#form-message').html('<div class="alert alert-success">' + 'success' + '</div>');

                                                // Show countdown message
                                                var countdown = 5;
                                                setInterval(function() {
                                                    $('#form-message').html(
                                                        '<div class="alert alert-success">Redirecting in ' + countdown +
                                                        ' seconds...</div>');
                                                    countdown--;
                                                }, 1000);

                                                // Redirect to same page after 3 seconds
                                                setTimeout(function() {
                                                    window.location = window.location.href;
                                                }, 5000);
                                            },
                                            error: function(response) {
                                                $('#form-message').html('<div class="alert alert-danger">' + response.responseJSON
                                                    .message + '</div>');
                                            }
                                        });
                                    });
                                </script>

                                {{-- <style>
                                    $(function(){
                                    $("form-id").submit(function(){
                                        $.post($(this).attr("action"), $(this).serialize(), function(jsonData){
                                        console.log(jsonData);
                                        }, "json");
                                    });
                                    });
                                </style> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 py-2">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="fas fa-duotone fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Admin list</h6>
                                <span class="text-xs">list of all admin here</span>
                                <hr class="horizontal dark my-3">
                                <div id="form-message" class="mt-3"></div>
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        @foreach ($MainUser as $adminuser_loop)
                                            @if ($adminuser_loop->role == 'Admin')
                                                <tr id='admin_row_{{ $adminuser_loop->email }}'>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div><img
                                                                    src="https://cdn-icons-png.flaticon.com/512/270/270023.png"
                                                                    class="avatar avatar-sm me-3" alt="user6"></div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $adminuser_loop->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $adminuser_loop->email }}</p>
                                                    </td>

                                                    <td class="align-middle">
                                                        {{-- <a href="javascript:;"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            @if ($adminuser_loop->id != '1')
                                                                Delete
                                                            @endif
                                                        </a> --}}
                                                        <form id="delete-form-{{ $adminuser_loop->id }}" method="POST"
                                                            action="{{ route('user_delete_all') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="email"
                                                                value="{{ $adminuser_loop->email }}">
                                                            <!-- Other form fields go here -->
                                                            @if ($adminuser_loop->id != '1')
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    id="submit-button-{{ $adminuser_loop->id }}"
                                                                    data-email="{{ $adminuser_loop->email }}"
                                                                    onclick="deleteRow(this)">Delete</button>

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-email="{{ $adminuser_loop->email }}"
                                                                    onclick="updatePassword(this)">Password</button>
                                                            @endif


                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <script>
                                    function deleteRow(button) {
                                        if (confirm('Are you sure you want to delete this user?')) {
                                            $.ajax({
                                                type: 'DELETE',
                                                url: '../api/user_delete_all',
                                                data: {
                                                    email: button.getAttribute('data-email')
                                                },
                                                success: function(response) {

                                                    document.getElementById('admin_row_' + button.getAttribute('data-email')).setAttribute(
                                                        'hidden', true);
                                                    button.innerHTML = "Deleted";
                                                    // Add a disabled attribute to the button to prevent further clicks
                                                    button.setAttribute("class", "btn btn-secondary btn-sm");
                                                    button.setAttribute("disabled", "disabled");
                                                },
                                                error: function(response) {
                                                    console.log(response);
                                                }
                                            });
                                        }

                                    }

                                    function updatePassword(button) {
                                        let passwords = prompt("Set new password", "newpasswordhere");
                                        if (passwords != null) {
                                            $.ajax({
                                                type: 'POST',
                                                url: '../api/user_update_password',
                                                data: {
                                                    email: button.getAttribute('data-email'),
                                                    password: passwords,
                                                },
                                                success: function(response) {
                                                    alert('Password Changed');
                                                },
                                                error: function(response) {
                                                    alert('Error Changing Password');
                                                }
                                            });
                                        }

                                    }
                                </script>
                            </div>
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
                            <a href="https://gementar.com"
                                class="btn btn-dark mb-0 me-2" target="_blank">
                                <i class="fab fa-earth-asia me-1" aria-hidden="true"></i> Website
                            </a>
                            <a href="https://github.com/themuhdhilmi/daftartprojekjtmk"
                                class="btn btn-dark mb-0 me-2" target="_blank">
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
