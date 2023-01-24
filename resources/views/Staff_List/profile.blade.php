@extends('layouts.app')



@section('content')
    <title>IChooseSV | Change Password</title>
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

        <div class="main-content position-relative max-height-vh-100 h-100">

            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-0 shadow-none border-radius-xl  mt-3 mx-3 bg-dark"
                            id="navbarBlur" data-scroll="false">
                            <div class="container-fluid py-1 px-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                                href="{{ route('staff_list', ['id' => 'list']) }}">staff</a></li>
                                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                                            @if (isset($_GET['email']))
                                                {{ $_GET['email'] }}
                                            @endif
                                        </li>
                                    </ol>
                                    <h6 class="font-weight-bolder text-white mb-0">Profile</h6>
                                </nav>
                                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                                    </div>
                                    <ul class="navbar-nav  justify-content-end">
                                        <li class="nav-item px-3 d-flex align-items-center">
                                            <a href="{{ route('staff_page', ['id' => 'change_password']) }}"
                                                class="nav-link text-white p-0">
                                                <i class="fa fa-home fixed-plugin-button-nav cursor-pointer"
                                                    aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <br>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-profile">
                            <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4 order-lg-2">
                                    <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">

                                        @if (file_exists(public_path('downloadable/staff_img/' . $_GET['email'] . '.jpg')))
                                            <img src="../downloadable/staff_img/{{ $_GET['email'] }}.jpg"
                                                class="w-90 h-100 border-radius-lg shadow-sm">
                                        @else
                                            <img src="{{ asset('downloadable/staff_img/empty_profile.jpg') }}"
                                                class="w-90 h-100  border-radius-lg shadow-sm">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                <div class="d-flex justify-content-between">
                                    @if ($staffMain->scopus_id != '')
                                        <a href="https://www.scopus.com/authid/detail.uri?authorId={{ $staffMain->scopus_id }}"
                                            class="btn btn-sm btn-info mb-0 d-none d-lg-block">Scopus ID</a>
                                        <a href="https://www.scopus.com/authid/detail.uri?authorId={{ $staffMain->scopus_id }}"
                                            class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                                class="ni ni-collection"></i></a>
                                    @endif

                                    @if ($staffMain->google_scholar != '')
                                        <a href="{{ $staffMain->google_scholar }}"
                                            class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Google
                                            Scholar</a>
                                        <a href="{{ $staffMain->google_scholar }}"
                                            class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                                class="ni ni-email-83"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            <div class="d-grid text-center">
                                                <span
                                                    class="text-lg font-weight-bolder">{{ $staffInfoResearchCount }}</span>
                                                <span class="text-sm opacity-8">Research</span>
                                            </div>
                                            <div class="d-grid text-center mx-4">
                                                <span
                                                    class="text-lg font-weight-bolder">{{ $staffInfoPublicationCount }}</span>
                                                <span class="text-sm opacity-8">Publication</span>
                                            </div>
                                            <div class="d-grid text-center">
                                                <span class="text-lg font-weight-bolder">{{ $staffInfoTotalAll }}</span>
                                                <span class="text-sm opacity-8">Total</span>
                                            </div>
                                        </div>
                                        @if ($staffMain->consultation_price != '')
                                            <br>
                                            <div class="d-flex justify-content-center">
                                                <div class="d-grid text-center">
                                                    <span class="text-lg font-weight-bolder">RM
                                                        {{ $staffMain->consultation_price }}</span>
                                                    <span class="text-sm opacity-8">Consultation</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <h5>
                                        {{ $staffUser->name }}
                                    </h5>
                                    <div class="h6 font-weight-300">
                                        <div class="alert alert-danger" role="alert">
                                            <a style="color: white">
                                                @if ($staffMain->track == 'programming')
                                                    <i class="ni location_pin mr-2"></i>Software & Application Development
                                                @elseif ($staffMain->track == 'networking')
                                                    <i class="ni location_pin mr-2"></i>Networking System
                                                @elseif ($staffMain->track == 'security')
                                                    <i class="ni location_pin mr-2"></i>Information Security
                                                @endif


                                            </a>
                                        </div>

                                    </div>
                                    <div class="h6 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>Jabatan Teknologi Maklumat &
                                        Komunikasi
                                    </div>
                                    <div>
                                        <i class="ni education_hat mr-2"></i>Politeknik Ungku Omar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <div class="card p-3 bg-dark">
                            <div class="row">
                                <div class="col-md-2 py-2">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                        </div>
                                        <div class="card-body pt-0 p-3">
                                            <h6 class="text-uppercase text-xs font-weight-bolder opacity-6">Citation</h6>
                                            <hr class="horizontal dark my-3">

                                            <button type="button"
                                                class="btn
                                @if (isset($_GET['research'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                                onclick="location.href='{{ route('staff_list', ['id' => 'profile']) }}?research=research&email={{ $email }}'">Research</button>

                                            <button type="button"
                                                class="btn
                                @if (isset($_GET['article'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                                onclick="location.href='{{ route('staff_list', ['id' => 'profile']) }}?article=article&email={{ $email }}'">Article</button>

                                            <button type="button"
                                                class="btn
                                @if (isset($_GET['consultation'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                                onclick="location.href='{{ route('staff_list', ['id' => 'profile']) }}?consultation=consultation&email={{ $email }}'">Consultation</button>
                                            <button type="button"
                                                class="btn
                                @if (isset($_GET['award_recognition'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                                onclick="location.href='{{ route('staff_list', ['id' => 'profile']) }}?award_recognition=award_recognition&email={{ $email }}'">Award/Recognition</button>
                                            <div class="card p-2" style="background-color: rgba(0, 0, 0, 0.1);">
                                                <span class="badge badge-sm bg-dark mx-4 my-2">Publication</span>
                                                <button type="button"
                                                    class="btn
                                @if (isset($_GET['proceeding'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                                    onclick="location.href='{{ route('staff_list', ['id' => 'profile']) }}?proceeding=proceeding&email={{ $email }}'">Proceeding</button>
                                                <button type="button"
                                                    class="btn
                                @if (isset($_GET['others'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                                    onclick="location.href='{{ route('staff_list', ['id' => 'profile']) }}?others=others&email={{ $email }}'">Others</button>
                                                <button type="button"
                                                    class="btn
                                @if (isset($_GET['supervision'])) btn-primary
                                @else
                                btn-secondary @endif

                                w-100"
                                                    onclick="location.href='{{ route('staff_list', ['id' => 'profile']) }}?supervision=supervision&email={{ $email }}'">Supervision</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 py-2">
                                    <div class="card bg-dark">
                                        <div class="card p-4">
                                            @if (isset($_GET['research']))
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Research</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($staffInfoResearch as $research)
                                                            <tr>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-1">
                                                                        {{ $research->tittle }}</p>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-danger">{{ $research->red_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-success">{{ $research->green_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-primary">{{ $research->blue_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-info">{{ $research->light_blue_text }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @elseif(isset($_GET['article']))
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Article</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($staffInfoArticle as $article)
                                                            <tr>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-0">
                                                                        {{ $article->tittle }}</p>
                                                                    <p class="text-sm font-italic mb-1">
                                                                        {{ $article->info }}</p>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-danger">{{ $article->red_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-success">{{ $article->green_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-primary">{{ $article->blue_text }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @elseif(isset($_GET['proceeding']))
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Proceeding</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($staffInfoProceeding as $proceeding)
                                                            <tr>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-0">
                                                                        {{ $proceeding->tittle }}</p>
                                                                    <p class="text-sm font-italic mb-1">
                                                                        {{ $proceeding->info }}</p>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-danger">{{ $proceeding->red_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-success">{{ $proceeding->green_text }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @elseif(isset($_GET['others']))
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Others</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($staffInfoOthers as $others)
                                                            <tr>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-0">
                                                                        {{ $others->tittle }}</p>
                                                                    <p class="text-sm font-italic mb-1">
                                                                        {{ $others->info }}</p>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-danger">{{ $others->red_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-success">{{ $others->green_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-primary">{{ $others->blue_text }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @elseif(isset($_GET['supervision']))
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Supervision</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($staffInfoSupervision as $supervision)
                                                            <tr>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-0">
                                                                        {{ $supervision->tittle }}</p>
                                                                    <p class="text-sm font-italic mb-1">
                                                                        {{ $supervision->info }}</p>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-danger">{{ $supervision->red_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-success">{{ $supervision->green_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-warning">{{ $supervision->yellow_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-primary">{{ $supervision->blue_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-info">{{ $supervision->light_blue_text }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @elseif(isset($_GET['consultation']))
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Consultation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($staffInfoConsultation as $consultation)
                                                            <tr>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-0">
                                                                        {{ $consultation->tittle }}</p>
                                                                    <p class="text-sm font-italic mb-1">
                                                                        {{ $consultation->info }}</p>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-danger">{{ $consultation->red_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-success">{{ $consultation->green_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-warning">{{ $consultation->yellow_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-primary">{{ $consultation->blue_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-info">{{ $consultation->light_blue_text }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @elseif(isset($_GET['award_recognition']))
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Award/Recognition</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($staffInfoAward_Recognition as $award)
                                                            <tr>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-0">
                                                                        {{ $award->tittle }}</p>
                                                                    <p class="text-sm font-italic mb-1">
                                                                        {{ $award->info }}</p>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-danger">{{ $award->red_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-success">{{ $award->green_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-warning">{{ $award->yellow_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-primary">{{ $award->blue_text }}</span>
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-info">{{ $award->light_blue_text }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Staff Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p class="text-sm font-weight-bold mb-1">
                                                    {{ $staffUser->name }} is a

                                                    @if ($staffMain->track == 'programming')
                                                        <i class="ni location_pin mr-2"></i>software & application
                                                        development
                                                    @elseif ($staffMain->track == 'networking')
                                                        <i class="ni location_pin mr-2"></i>networking system
                                                    @elseif ($staffMain->track == 'security')
                                                        <i class="ni location_pin mr-2"></i>information security
                                                    @endif
                                                    lectuer from Department of Information Technology and Communication ,
                                                    Politeknik Ungku Omar (PUO), Jalan Raja Musa Mahadi, 31400 Ipoh, Perak.
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        </div>
    </body>

    </html>
@endsection
