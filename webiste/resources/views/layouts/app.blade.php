<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Citarum Water Guardian - @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('logo_card_white.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ ('assets/landing') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ ('assets/landing') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ ('assets/landing') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ ('assets/landing') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ ('assets/landing') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ ('assets/landing') }}/css/main.css" rel="stylesheet">

    @stack('css')

</head>

<body>

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="{{ route('beranda') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('logo_white.png') }}" alt="Logo CWG">
                <h1>CWG</h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('beranda') }}#hero">Home</a></li>
                    <li><a href="{{ route('monitoring') }}" class="{{ request()->is('monitoring') ? 'active' : '' }}">Monitoring</a></li>
                    <li><a href="{{ route('beranda') }}#about">About</a></li>
                    <li><a href="{{ route('beranda') }}#team">Team</a></li>
                    <li><a href="{{ route('beranda') }}#contact">Feedback</a></li>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>

    @yield('hero')

    <main id="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="{{ route('beranda') }}" class="logo d-flex align-items-center">
                        <span>CWG</span>
                    </a>
                    <p>Citarum Water Guardian adalah sebuah sistem inovatif yang telah dirancang dan dikembangkan dengan tujuan utama untuk memantau kualitas air Sungai Citarum secara real-time.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="https://www.instagram.com/citarumwaterguardian/" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="mailto:citarumwaterguardian@gmail.com" class="linkedin"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('beranda') }}#home">Home</a></li>
                        <li><a href="{{ route('monitoring') }}">Monitoring</a></li>
                        <li><a href="{{ route('beranda') }}#about">About</a></li>
                        <li><a href="{{ route('beranda') }}#team">Team</a></li>
                        <li><a href="{{ route('beranda') }}#contact">Feedback</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Office</h4>
                    <p>Jl. Dr. Setiabudi No.229</p>
                    <p>Kec. Sukasari, Kota Bandung</p>
                    <p>Jawa Barat 40154</p>
                    <p>Indonesia</p>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        <strong>Instagram :</strong> citarumwaterguardian
                    </p>
                    <p>
                        <strong>Email :</strong> citarumwaterguardian@gmail.com
                    </p>
                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; {{ date('Y') }} Copyright <strong><span>Citarum Water Guardian</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ ('assets/landing') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ ('assets/landing') }}/vendor/aos/aos.js"></script>
    <script src="{{ ('assets/landing') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ ('assets/landing') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ ('assets/landing') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ ('assets/landing') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ ('assets/landing') }}/js/main.js"></script>

    <!-- Apex Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                confirmButtonColor: '#3085d6',
                html: '{!! Session::get('success') !!}',
            })
        </script>
    @elseif(Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: ' {!! Session::get('error') !!}',
            })
        </script>
    @elseif(Session::has('info'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Info',
                html: ' {!! Session::get('info') !!}',
            })
        </script>
    @elseif(Session::has('warning'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                html: ' {!! Session::get('warning') !!}',
            })
        </script>
    @elseif($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: '@foreach($errors->all() as $error) {!! $error."<br>" !!}@endforeach',
            })
        </script>
    @endif

    @stack('js')

</body>
</html>
