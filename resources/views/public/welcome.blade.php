<!doctype html>
<html lang="en">

<head>
<!--TODO replace GA id with variable from ENV -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{env('GOOGLE_ANALYTICS_TRACKING_ID')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
//TODO replace GA id with variable from ENV
  gtag('config', 'UA-134922235-4');
</script>
<!-- Primary Meta Tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{env('APP_NAME')}}</title>
<meta name="robots" content="index, follow">
<meta name="title" content="{{env('APP_NAME')}}">
<meta name="description" content="Find where you can pick up your books and journals with {{ env('APP_NAME') }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{env('APP_URL')}}">
<meta property="og:title" content="{{env('APP_NAME')}}">
<meta property="og:description" content="Find where you can pick up your books and journals with {{ env('APP_NAME') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{env('APP_URL')}}">
<meta property="twitter:title" content="{{env('APP_NAME')}}">
<meta property="twitter:description" content="Find where you can pick up your books and journals with {{ env('APP_NAME') }}">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="194x194" href="/img/favicon-194x194.png">
<link rel="icon" type="image/png" sizes="192x192" href="/img/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/img/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">

  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">{{ env('APP_NAME') }}</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" target="_blank" rel="external" href="https://www.example.com/ask-a-librarian">Ask-a-Librarian</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Find where you can pick up your books</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Confused about where your books in the open-stacks are? Can't find the journal you need? <em>{{ env('APP_NAME') }}</em> shows you exactly where they are and how to reach them!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Start here!</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">Search in the Primo.</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Look out for the "Locate" button in Primo. The button will appear when a book is available in the open-stacks for you to pick up. Click the "Locate" button and it will show you precise directions!</p>
          <!--TODO insert image of locate button-->
          <a class="btn btn-light btn-xl js-scroll-trigger" rel="external" href="https://example.com/">Try now!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Pros Section -->
  <section class="page-section" id="pros">
    <div class="container">
      <h2 class="text-center mt-0">We are here to help!</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Stuck? Something is missing?</h3>
            <p class="text-muted mb-0">Our <a target="_blank" rel="external" href="https://www.example.com/ask-a-librarian">Ask-a-Librarian</a> service is here to assist.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">More information about our Libraries?</h3>
            <p class="text-muted mb-0">The <a target="_blank" rel="external" href="https://www.library.universiteitleiden.nl/">Leiden University Libraries website</a> contains all the information you might need.</p>
          </div>
        </div>
        <!--TODO what do we want to have here? -->
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2"></h3>
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Interested in implementing this tool in your Library?</h3>
            <p class="text-muted mb-0">This tool is developed with an open-source heart. Check the <a target="_blank" rel="external" href="https://github.com/LeidenUniversityLibrary">Leiden University Libraries GitHub page</a> for more information.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Feedback</h2>
      <p class="text-white-50 mb-3">{{ env('APP_NAME') }} is a new tool. We would love to hear your feedback, suggestions, critiques.</p>
      <a class="btn btn-light btn-xl" href="https://example.com">Take the survey!</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted"></div>
    </div>
  </footer>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="{{ asset("/js/jquery.easing.js")}}"></script>
  <script src="{{ asset("/js/jquery.magnific-popup.js")}}"></script>
  <script src="{{ asset("/js/welcome.js")}}"></script>
</body>

</html>
