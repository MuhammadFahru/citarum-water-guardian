<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Water Guardian - Login</title>

    <link rel="shortcut icon" href="{{ asset('logo_card_white.png') }}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url("{{ asset('bg_login.jpg') }}");
            background-size: cover;
        }
    </style>

</head>

<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 bg-primary d-flex align-items-center justify-content-center">
                            <img src="{{ asset('logo_white.png') }}" alt="Logo" width="80%">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-2">Welcome Back!</h1>
                                    <img src="{{ asset('logo_black.png') }}" alt="Logo" width="40%">
                                    <h1 class="h5 text-gray-900 mb-5">Citarum Water Guardian</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="username"
                                               name="username"
                                               placeholder="Masukan username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="password" name="password" placeholder="Masukan password...">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>

<script src="{{ asset('assets') }}/vendor/sweetalert2/sweetalert2.all.min.js"></script>

@if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
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

</body>

</html>
