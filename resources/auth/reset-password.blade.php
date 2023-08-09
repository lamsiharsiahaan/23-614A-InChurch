<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>FiMobile V2.0 - Mobile HTML template</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100 dark-bg" data-page="signin">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="assets/img/logo.png" alt="Logo">
                </div>
                <p class="mt-4">It's time for track budget<br><strong>Please wait...</strong></p>
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
                            <a href="{{ url('/passwordforgot') }}" target="_self" class="btn btn-light btn-44"><i
                                    class="bi bi-arrow-left"></i></a>
                        </div>
                        <div class="col">
                            <div class="logo-small">
                                <img src="assets/img/logo.png" alt="">
                                <h5>FiMobile</h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="" target="_self" class="btn btn-light btn-44 invisible"></a>
                        </div>
                    </div>
                </header>
            </div>
            <form method="POST" action="{{ url('/passwordreset') }}">
                @csrf
                <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                    <h1 class="mb-4 text-color-theme">Reset Password</h1>
                    <p class="text-muted mb-4">Please create unique password for your account which contains at-least 1
                        capital latter & 1 special character sign</p>

                    <div class="form-group form-floating is-valid mb-3">
                        <input type="password" class="form-control" id="new-password" placeholder="New Password" autofocus required>
                        <label class="form-control-label" for="new-password">New Password</label>
                    </div>

                    <div class="form-group form-floating is-invalid mb-3">
                        <input type="password" class="form-control " id="confirm-password" placeholder="Confirm New Password" name="newpass" required>
                        <label class="form-control-label" for="confirm-password">Confirm New Password</label>
                        <button type="button" class="btn btn-link text-danger tooltip-btn" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Enter valid Password" id="passworderror">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>

                    <input type="hidden" name="id_member" value="{{ $id_member }}" />

                    <!-- <a href="thankyou.html" target="_self" class="btn btn-lg btn-default w-100 shadow">Update</a> -->
                    <button type="button" onclick="resetPassword()" class="btn btn-lg btn-default w-100 shadow">
                        Update Password
                    </button>
                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="invalidasi">
                    <div class="toast toast-data-invalid mb-3 fade hide" role="alert" aria-live="assertive"
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
                            <div class="row px-2">
                                <div class="col">
                                    <div id='new-password--empty' class="row text-dark" style="display: none;">
                                        Tolong isi NEW PASSWORD
                                    </div>
                                    <div id='confirm-password--empty' class="row text-dark" style="display: none;">
                                        Tolong isi CONFIRM PASSWORD
                                    </div>
                                    <div id='data-not-match' class="row text-dark" style="display: none;">
                                        Password harus sama
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-sm btn-default btn-save" data-bs-dismiss="toast">
                                        Mengerti
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                    <div class="toast toast-reset-password mb-3 fade hide" role="alert" aria-live="assertive"
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
                                <div class="col save text-dark">
                                    Apakah Anda yakin?
                                </div>
                                <div class="col-auto align-self-center ps-0">
                                    <button class="btn btn-sm btn-default btn-save" type="submit">Ya, Lanjutkan</button>
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

    <script>
        function resetPassword() {
            let isInvalid = false;
            const password = $('#new-password').val();
            const confirm = $('#confirm-password').val();

            if (!password) {
                $('#new-password--empty').css('display', '');
                isInvalid = true;
            } else {
                $('#new-password--empty').css('display', 'none');
            }

            if (!confirm) {
                $('#confirm-password--empty').css('display', '');
                isInvalid = true;
            } else {
                $('#confirm-password--empty').css('display', 'none');
            }

            if (password && confirm) {
                if (password !== confirm) {
                    $('#data-not-match').css('display', '');
                    isInvalid = true;
                } else {
                    $('#data-not-match').css('display', 'none');
                }
            }

            if (isInvalid) {
                $('.toast-data-invalid').toast('show');
            } else {
                $('.toast-reset-password').toast('show');
                $(".save").show();
            }
        }
    </script>

    <!-- Required jquery and libraries -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- cookie js -->
    <script src="assets/js/jquery.cookie.js"></script>

    <!-- Customized jquery file  -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="assets/js/app.js"></script>

</body>

</html>