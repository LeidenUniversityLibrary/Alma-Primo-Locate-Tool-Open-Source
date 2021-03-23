<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @if(View::hasSection('title'))@yield('title')@else{{ config('app.name', 'App name not defined in .env file') }}@endif
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description"
        content="@if(View::hasSection('description'))@yield('description')@else{{'Lead you patrons to the books they want!'}}@endif">
    <meta property="og:url" content="{{URL::current()}}">
    <link rel="canonical" href={{URL::current()}}>
    <link rel="icon" type="image/png" href="{{{ asset('img/favicon-196x196.png') }}}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{{ asset('img/favicon-96x96.png') }}}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{{ asset('img/favicon-32x32.png') }}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{{ asset('img/favicon-16x16.png') }}}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{{ asset('img/favicon-128.png') }}}" sizes="128x128" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    @yield('css')
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <!--SECTION Page Content  -->
    <div id="content">

        <!-- SECTION Header container -->
        <div class="header-container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light wrapper">
                <div class="container-fluid">
                    <a class="navbar-brand" href="https://www.example.com">
                        <img src="{{{ asset('img/logo.png') }}}" height="64" alt="Logo"
                            id="logo_header">
                    </a>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">

                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('show_all_buildings') }}" rel="noopener">Buildings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('show_all_locations') }}" rel="noopener">Locations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin_alerts') }}" rel="noopener">Alerts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin_options') }}" rel="noopener">Options
                                </a>
                            </li>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
                            @endauth
                    </div>
                </div>
            </nav>
            <div class="border-bottom border-leiden"></div>
        </div>

        <!-- SECTION Main container -->
        <div class="main-container">
            <div class="container shadow-sm p-3 mt-3 rounded">
                <h1 class="text-center mt-4">
                    {{ env('APP_NAME', 'Alma-Primo Locate Tool') }}
                </h1>
                <h6 class="text-muted text-center">{{ env('INST_NAME') }}</h6>
                @auth

                <div class="alert alert-primary text-center" role="alert">
                    <strong>You are logged in as an administrator.</strong>
                </div>
                @endauth
                <div class="container">
                    <!-- SECTION Yield Content -->
                    @yield('content')
                    <!-- SECTION End Yield Content -->
                </div>
            </div>
        </div>

        <!-- SECTION Footer container -->
        <div class="footer-container">
            <div class="container-lg">
                <footer class="mt-5 pt-md-5 border-top col-12">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-5">
                            <a href="https://www.example.com/" class="text-gray-dark">
                                <img src="{{{ asset('img/logo.png') }}}" alt="Logo" id="logo_footer"
                                    style="max-width:50%; display: block; margin:0 auto;"></a>
                        </div>
                        <div class="col-6 col-md">
                            <h5>Leiden University</h5>
                            <ul class="list-unstyled text-small">
                                <li><a href="https://www.universiteitleiden.nl/" target="_blank" rel="noopener">Leiden
                                        University Website</a></li>
                                <li><a href="https://www.library.universiteitleiden.nl/" target="_blank"
                                        rel="noopener">Leiden University Libraries Website</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md">
                            <h5>Social</h5>
                            <ul class="list-unstyled text-small">
                                <li><a href="https://www.facebook.com/ubleiden/" target="_blank" rel="noopener">Leiden
                                        University Libraries
                                        on Facebook</a></li>
                                <li><a href="https://twitter.com/ubleiden" target="_blank" rel="noopener">Leiden
                                        University Libraries
                                        on Twitter</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md">
                            <h5>About</h5>
                            <ul class="list-unstyled text-small">
                                <li>
                                    <p class="text-muted">Designed and developed by <a
                                            href="https://github.com/LeidenUniversityLibrary" target="_blank"
                                            rel="noopener">Leiden University Libraries</a>.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- SECTION additional JS Jquery, popper, bootstrap, sidebar's sidebar -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
        < /scrip <
        script type = "text/javascript"
        src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity = "sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin = "anonymous" >

    </script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script type="text/javascript" async defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js"
        integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous">
    </script>
    @yield('javascript')
</body>

</html>
