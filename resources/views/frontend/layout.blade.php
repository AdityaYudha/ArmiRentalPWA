<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Armi Rental &mdash; Rental Mobil Pontianak</title>
    <meta charset="utf-8" />
    

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap"
      rel="stylesheet"
    />

            <!-- PWA  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
     <!-- Bootstrap icons-->
     <link
       href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
       rel="stylesheet"
     />
     <link
       href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
       rel="stylesheet"
     />
     <!-- Core theme CSS (includes Bootstrap)-->
     <link href="css/styles.css" rel="stylesheet" />
     <link rel="stylesheet" href="css/custom.css" />
  </head>

  <body>
    <div class="site-wrap" id="home-section">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar site-navbar-target" role="banner">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-3">
              <div class="site-logo">
                <a href="{{ url('/') }}"><strong>ArmiRental</strong></a>
              </div>
            </div>

            <div class="col-9 text-right">
              <span class="d-inline-block d-lg-none"
                ><a href="#" class="site-menu-toggle js-menu-toggle py-5"
                  ><span class="icon-menu h3 text-black"></span></a
              ></span>

              <nav
                class="site-navigation text-right ml-auto d-none d-lg-block"
                role="navigation"
              >
                <ul class="site-menu main-menu js-clone-nav ml-auto">
                  <li class="active">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                  </li>
                  <li><a href="{{ url('daftar-mobil') }}" class="nav-link">Daftar Mobil</a></li>
                  </li>
                  <li><a href="{{ url('blog') }}" class="nav-link">Blog</a></li>
                  <li><a href="{{ url('tentang-kami') }}" class="nav-link">Tentang Kami</a></li>
                  <li><a href="{{ url('kontak') }}" class="nav-link">Kontak</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

      @yield('content')

      <div class="site-section bg-primary py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-md-0">
              <h2 class="mb-0 text-white">Apa yang kalian tunggu ?</h2>
              <p class="mb-0 opa-7">
                Buruan sewa mobil sekarang sebelum harga bbm naik
              </p>
            </div>
            <div class="col-lg-5 text-md-right">
              <a href="/daftar-mobil" class="btn btn-primary btn-white">Sewa Sekarang</a>
            </div>
          </div>
        </div>
      </div>

      <footer class="site-footer">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-12">
              <div class="border-top pt-3">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  Armi Rental Pontianak
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
    @stack('script-alt')
  </body>
</html>
