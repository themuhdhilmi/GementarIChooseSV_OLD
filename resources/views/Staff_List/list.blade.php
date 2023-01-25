<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @media (-webkit-device-pixel-ratio: 1.25) {
            * {
                zoom: 98%;
            }
        }
    </style>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Staff Directory JTMK!
    </title>
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

<body class="">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
                IChooseSV
            </a>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <div class="page-header align-items-start max-vh-10 pt-5 pb-5 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Staff Directory JTMK!</h1>
                        <p class="text-lead text-white">List of all lecturer in JTMK</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid py-4">
                <div class="row">

                    @foreach ($staffUsers as $user)
                        @foreach ($staffMains as $staff)
                            @if ($staff->email == $user->email)
                                <div class="col-md-2">
                                    <div class="card card-profile h-100">
                                        <img src="../assets/img/bg-profile.jpg" alt="Image placeholder"
                                            class="card-img-top">
                                        <div class="row justify-content-center">
                                            <div class="col-4 col-lg-4 order-lg-2">
                                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                                    <div class="avatar avatar-xl position-relative">
                                                        @if (file_exists(public_path('downloadable/staff_img/' . $user->email . '.jpg')))
                                                            <img src="../downloadable/staff_img/{{ $user->email }}.jpg"
                                                                class="w-90 h-100 border-radius-lg shadow-sm">
                                                        @else
                                                            <img src="{{ asset('downloadable/staff_img/empty_profile.jpg') }}"
                                                                class="w-90 h-100  border-radius-lg shadow-sm">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('staff_list', ['id' => 'profile']) }}?email={{ $user->email }}"
                                                    class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block mx-auto">Profile</a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="text-center mt-4">
                                                <h5>
                                                    {{ $user->name }}<span class="font-weight-light"></span>
                                                </h5>
                                                <div class="h6 font-weight-300">
                                                    @if ($staff->can_supervise == '0')
                                                        <a></a>
                                                    @else
                                                        <a style="color: green">supervisor</a>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>

</html>
