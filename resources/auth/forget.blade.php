<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>inChurch - Smart Solution for Church</title>

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

<body class="body-scroll d-flex flex-column h-100">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="{{ url('assets/img/logo_inch.png') }}" alt="Logo">
                </div>
                <p class="mt-4">Smart Solution for Church<br><strong>Please wait...</strong></p>
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
                        <div class="col-auto">
                            <a href="{{ url('login') }}" target="_self" class="btn btn-light btn-44"><i
                                    class="bi bi-arrow-left"></i></a>
                        </div>
                        <div class="col">
                            <div class="logo-small">
                                <img src="{{ url('assets/img/logo_inch.png') }}" alt="">
                                <h5 style="font-family: 'Roboto';font-weight: normal;"><b>in</b>Church</h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="" target="_self" class="btn btn-light btn-44 invisible"></a>
                        </div>
                    </div>
                </header>
            </div>

            <form method="POST" action="{{ url('/passwordforgot') }}">
                @csrf
                <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                    <h1 class="mb-4 text-color-theme">Right here you can reset it back</h1>
                    <p class="text-muted mb-4">Provide your registered email ID or phone number to reset your password
                    </p>

                    <div class="form-floating is-valid mb-3">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Email ID"
                            id="emails"
                            name="emails"
                        />
                        <label for="emails">Email ID</label>
                    </div>
                    <p class="text-danger" id="emails-empty" style="display: none;">Please fill in this field</p>
                    <p class="text-danger" id="emails-invalid" style="display: none;">Email is invalid</p>
                    {{-- <a onclick="return goreset()" href="reset-password.html" target="_self"
                        class="btn btn-lg btn-default w-100  shadow">
                        Reset Password
                    </a> --}}
                    <button onclick="resetpassword()" type="button" class="btn btn-lg btn-default w-100 shadow">
                        RESET PASSWORD
                    </button>
                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                    <div class="toast toast-forgot-password mb-3 fade hide" role="alert" aria-live="assertive"
                        aria-atomic="true" id="toastSimpan" data-bs-animation="true">
                        <div class="toast-header">
                            <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2"
                                alt="...">
                            <strong class="me-auto">PERHATIAN!</strong>
                            <!-- <small>now</small> -->
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <div class="row">
                                <div class="col save">
                                    Apakah Anda yakin?
                                </div>
                                <div class="col-auto align-self-center ps-0">
                                    <button class="btn btn-sm btn-default btn-save" type="submit">Ya</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-12 text-center mt-auto">
                <div class="row justify-content-center footer-info">
                    <div class="col-auto">

                    </div>
                </div>
            </div>
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

    <script>
        function validateEmail(email) {
            const pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
            return pattern.test(email);
        }

        function resetpassword() {
            let isInvalid = false;
            const email = $('#emails').val();

            if (!email) {
                $('#emails-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#emails-empty').css('display', 'none');
                if (!validateEmail(email)) {
                    $('#emails-invalid').css('display', '');
                    isInvalid = true;
                } else {
                    $('#emails-invalid').css('display', 'none');
                }
            }

            if (!isInvalid) {
                $('.toast-forgot-password').toast('show');
                $(".save").show();
            }
        }
    </script>
</body>

</html>
