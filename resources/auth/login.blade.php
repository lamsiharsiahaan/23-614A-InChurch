<!DOCTYPE html>

<html lang="en" class="h-100">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <meta name="generator" content="">

    <title>{{ config('app.title') }}</title>



    <!-- manifest meta -->

    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="manifest" href="manifest.json" />



    <!-- Favicons -->

    <link rel="apple-touch-icon" href="{{ url('assets/img/logo_inch.png') }}" sizes="180x180">

    <link rel="icon" href="{{ url('assets/img/logo_inch.png') }}" sizes="32x32" type="image/png">

    <link rel="icon" href="{{ url('assets/img/logo_inch.png') }}" sizes="16x16" type="image/png">



    <!-- Google fonts-->



    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">



    <!-- bootstrap icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">



    <!-- style css for this template -->

    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" id="style">

</head>



<body class="body-scroll d-flex flex-column h-100" data-page="signin">



    <!-- loader section -->

    <div class="container-fluid loader-wrap">

        <div class="row h-100">

            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">

                <div class="loader-cube-wrap loader-cube-animate mx-auto">

                    <img src="{{ url('assets/img/logo_inch.png') }}" alt="Logo">

                </div>

                <p class="mt-4">{{ config('app.loading') }}<br><strong>Please wait...</strong></p>

            </div>

        </div>

    </div>

    <!-- loader section ends -->



    <!-- Begin page content -->

    <main class="container-fluid h-100">

        <div class="row h-100 overflow-auto">

            <div class="col-12 text-center mb-auto px-0">

                <header class="header">

                    <div class="row">

                        <div class="col-auto"></div>

                        <div class="col">

                            @include('layouts.logo')

                        </div>

                        <div class="col-auto"></div>

                    </div>

                </header>

            </div>



            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">

                <div class="card mb-4 overflow-hidden shadow-sm bg-primary text-white">
                    <div class="overlay"></div>
                    <div class="coverimg h-100 w-100 position-absolute opacity-5">
                        <img src="assets/img/news1.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-auto">
                                <span class="tag">Today Devotional</span>
                            </div>

                            <div class="col-auto" style="position: absolute; top: 10px; right: 0;">
                                <!-- Button Share -->
                                <button id="whatsappShareBtn"
                                    class="btn btn-danger text-white btn-44 rounded-circle shadow-sm"
                                    onclick="shareLinkViaWhatsApp()">
                                    <i class="bi bi-share"></i>
                                </button>

                                <!-- Button Bookmark -->
                                <button class="btn btn-success text-white btn-44 rounded-circle shadow-sm"
                                    onclick="bookmark()">
                                    <i class=" bi bi-bookmark" type="button"></i>
                                </button>
                            </div>
                        </div>
                        <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10">
                            <div class="toast toast-submit mb-3 fade hide" role="alert" aria-live="assertive"
                                aria-atomic="true" id="bookmark" data-bs-animation="true">
                                <div class="toast-header">
                                    <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px"
                                        class="rounded me-2" alt="...">
                                    <strong class="me-auto">PERHATIAN!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>

                                <div class="toast-body">
                                    <div class="row">
                                        <div class="col save" style="color: black;">
                                            Silahkan login terlebih dahulu
                                        </div>
                                        <div class="col-auto align-self-center ps-0">
                                            <button class="btn btn-sm btn-default btn-submit"
                                                type="submit">Oke</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="{{ url('/guestdevotional/' . $devotional[0]->id_devotional) }}"
                            style="margin-top:-30px;"
                            class="h5 text-normal d-block text-white mb-2">{{ $devotional[0]->namedevotional }}</a>
                        <p>Hii!!</p>
                        <a href="{{ url('/guestdevotional/' . $devotional[0]->id_devotional) }}"
                            class="h7 text-normal d-block text-white mb-2">{{ $devotional[0]->versecontent }}
                            &mdash;{{ $devotional[0]->verse }}</a>
                        <div class="small">
                            <figure class="avatar avatar-20 rounded mx-1">
                                <img src="{{ $devotional[0]->authorpicture }}" alt="">
                            </figure>
                            {{ $devotional[0]->author }}
                        </div>
                    </div>
                    <!--
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col align-self-center">
                                <span class="tag">Trending</span>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-danger text-white btn-44 rounded-circle shadow-sm">
                                    <i class="bi bi-share"></i>
                                </button>
                                <button class="btn btn-success text-white btn-44 rounded-circle shadow-sm">
                                    <i class="bi bi-bookmark"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <a href="blog-details.html" class="h4 text-normal d-block text-white mb-2">Best Discovery
                            ever in UX</a>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consect etur adipiscing elit. Sndisse
                            conv allis.</p>
                        <div class="small">
                            <figure class="avatar avatar-20 rounded mx-1">
                                <img src="assets/img/user2.jpg" alt="">
                            </figure>
                            Alessia Monks
                        </div>
                    </div>
                    -->
                </div>


                <!-- <h1 class="mb-4 text-color-theme">Sign in</h1> -->
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <form class="was-validated needs-validation" novalidate method="POST"
                    action="{{ route('login.admin') }}" aria-label="{{ __('Login') }}">

                    @csrf

                    <div class="form-group form-floating mb-3 is-valid @error('password') is-invalid @enderror">

                        <input type="text" class="form-control" value="mzfa" name="username" id="username"
                            placeholder="Username">

                        <label class="form-control-label" for="username">Login With Username</label>

                        @error('username')
                            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="{{ $message }}" id="passworderror">

                                <i class="bi bi-info-circle"></i>

                            </button>
                        @enderror
                    </div>


                    <div class="form-group form-floating is-valid @error('password') is-invalid @enderror mb-3">

                        <input type="password" class="form-control " value="mzfamzfa" name="password"
                            id="password" placeholder="Password">

                        <label class="form-control-label" for="password">Password</label>

                        @error('password')
                            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="{{ $message }}" id="passworderror">

                                <i class="bi bi-info-circle"></i>

                            </button>
                        @enderror


                    </div>

                    <p class="mb-3 text-center">

                        <a href="{{ url('passwordforgot') }}" class="">

                            Forgot your password?

                        </a>

                    </p>



                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow" id="sign-in">Sign in</button>
                    <button type="button" class="btn btn-lg btn-default w-100 mb-4 shadow" id="contact-admin" onclick="contactAdmin()">Contact Admin</button>


                </form>

                <p class="mb-2 text-muted">Or you can continue with</p>
                <a href="{{ url('login/google') }}" target="_self" class="">
                    Google <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <!-- <div class="col-12 text-center mt-auto">
                <div class="row justify-content-center footer-info">
                    <div class="col-auto">
                        <p class="text-muted">Or you can continue with </p>
                    </div>
                    <div class="col-auto ps-0">
                        <a href="#" class="p-1"><i class="bi bi-twitter"></i></a>
                        <a href="{{ url('login/google') }}" class="p-1"><i class="bi bi-google"></i></a>
                        <a href="#" class="p-1"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>
            </div> -->
        </div>

    </main>

    <!-- Required jquery and libraries -->

    <script src="{{ url('assets/js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ url('assets/js/popper.min.js') }}"></script>

    <script src="{{ url('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>

    <!-- cookie js -->

    <script src="{{ url('assets/js/jquery.cookie.js') }}"></script>



    <!-- Customized jquery file  -->

    <script src="{{ url('assets/js/main.js') }}"></script>

    <script src="{{ url('assets/js/color-scheme.js') }}"></script>



    <!-- PWA app service registration and works -->

    <script src="{{ url('assets/js/pwa-services.js') }}"></script>



    <!-- page level custom script -->

    <script src="{{ url('assets/js/app.js') }}"></script>



</body>

<script>
    // Fungsi untuk berbagi tautan melalui WhatsApp
    function shareLinkViaWhatsApp() {
        var shareURL =
            'http://integrated.church/develop/v5/integrated/guestdevotional'; // Ganti dengan URL yang ingin Anda bagikan
        var textToShare = 'Selamat datang di Integrated Church! Silakan kunjungi devotional kami: ' + shareURL;

        // Membuka aplikasi WhatsApp dengan tautan yang telah diformat
        window.location.href = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(textToShare);
    }

    // Mendengarkan tombol saat diklik dan menjalankan fungsi berbagi
    document.getElementById('whatsappShareBtn').addEventListener('click', shareLinkViaWhatsApp);

    function bookmark() {

        $('.toast-submit').toast('show');
        $('.toast-alert').toast('show');
        $('.toast-body').toast('show');
        $(".btn-submit").show();
        $(".submit").show();

    }

    // Fungsi untuk menyembunyikan pop-up saat tombol "Oke" diklik
    function hideToast() {
        var toast = document.getElementById('bookmark');
        var bsToast = new bootstrap.Toast(toast);
        bsToast.hide();
    }

    // Menambahkan peristiwa klik ke tombol "Oke"
    var okeButton = document.querySelector('.btn-submit');
    okeButton.addEventListener('click', hideToast);
</script>

<script>
    function contactAdmin() {
        var phoneNumber = "081809456734";
        var message = "Halo, saya ingin menghubungi admin. Mohon bantuannya.";
        var whatsappURL = "https://api.whatsapp.com/send?phone=" + phoneNumber + "&text=" + encodeURIComponent(message);
        window.open(whatsappURL, '_blank');
    }
</script>


</html>
