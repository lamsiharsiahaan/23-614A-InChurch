@extends('layouts.app')
@section('content')
    <main class="h-100 has-header">
        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <button class="btn btn-light back-btn">
                        <i class="bi bi-arrow-left"> </i>Cancel
                    </button>
                </div>
                <div class="col align-self-center text-center">
                    <h5>Social Media</h5>
                </div>
                <div class="col-auto">
                    <a href="notifications.html" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->
        <!-- main page content -->
        <div class="main-container container">
            <!-- user information -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-60 rounded-10">
                                <img src="{{ $data->photomember }}">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <h5>{{ $data->name }}</h5>
                            <p class="text-muted ">{{ $data->phone1 }} {{ $data->email }} </p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- profile information -->
            <div class="row mb-3">
                <div class="col">
                    <h6>Social Media</h6>
                </div>
            </div>
            <form action="{{ url('myprofile/socialmedia') }}" method="post">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="alert alert-danger alert-block" style="display: none;">
                        <strong id="showError"></strong>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="facebook"
                                value="{{ $data->facebook }}" placeholder="facebook" id="facebook">
                            <label for="facebook">Facebook</label>
                            <p class="text-danger" id="facebook-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="facebook-invalid" style="display: none;">
                                Please use the correct format! (ex: facebook.com/john.doe)
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="twitter" value="{{ $data->twitter }}"
                                placeholder="twitter" id="twitter">
                            <label for="twitter">Twiter</label>
                            <p class="text-danger" id="twitter-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="twitter-invalid" style="display: none;">
                                Please use the correct format! (ex: twitter.com/johndoe)
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="instagram" value="{{ $data->instagram }}"
                                placeholder="instagram" id="instagram">
                            <label for="instagram">Instagram</label>
                            <p class="text-danger" id="instagram-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="instagram-invalid" style="display: none;">
                                Please use the correct format! (ex: instagram.com/john.doe)
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="tiktok" value="{{ $data->tiktok }}"
                                placeholder="tiktok" id="tiktok">
                            <label for="tiktok">Tiktok</label>
                            <p class="text-danger" id="tiktok-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="tiktok-invalid" style="display: none;">
                                Please use the correct format! (ex: tiktok.com/@john.doe)
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="linkedin" value="{{ $data->linkedin }}"
                                placeholder="linkedin" id="linkedin">
                            <label for="linkedin">Linkedin</label>
                            <p class="text-danger" id="linkedin-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="linkedin-invalid" style="display: none;">
                                Please use the correct format! (ex: linkedin.com/in/johndoe)
                            </p>
                        </div>
                    </div>

                </div>
                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                    <div class="toast toast-save mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true"
                        id="toastSimpan" data-bs-animation="true">
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
                                    Apakah Anda yakin ingin menyimpan ini?
                                </div>
                                <div class="col delete">
                                    Apakah Anda yakin ingin menghapus ini?
                                </div>
                                <div class="col-auto align-self-center ps-0">
                                    <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>
                                    <a href="{{ url('profile/member/delete') }}"
                                        class="btn btn-sm btn-default btn-delete">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="main-container container">
                    <div class="row h-100 ">
                        <div class="col-md-6 mb-1">
                            <!-- <button class="btn btn-lg btn-default shadow btn-block" type="submit">Save</button> -->
                            <button class="btn btn-lg btn-default w-100 shadow" type="button"
                                onclick="return save()">Save</button>
                        </div>
                        <div class="col-md-6 mb-1">
                            <button class="btn btn-lg btn-danger w-100 shadow text-white disabled" type="button"
                                onclick="return hapus()" disabled>Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- main page content ends -->
    </main>
@endsection
@section('script')
    <script>
        function save() {
            let isInvalid = false;

            const facebookRegex = /^(?:facebook\.com\/)(?:\w+\/)?(?:pages\/)?(?:[^\s/]+\/)?(?:[^\s/]+)$/i;
            const twitterRegex = /^(?:twitter\.com\/)(?:[a-zA-Z0-9_]+)$/i;
            const instagramRegex = /^(?:instagram\.com\/)(?:[a-zA-Z0-9_.]+)$/i;
            const tiktokRegex = /^(?:tiktok\.com\/@)(?:[a-zA-Z0-9_.]+)$/i;
            const linkedinRegex = /^(?:linkedin\.com\/in\/)(?:[a-zA-Z0-9_-]+)$/i;

            const facebook = $('#facebook').val();
            const twitter = $('#twitter').val();
            const instagram = $('#instagram').val();
            const tiktok = $('#tiktok').val();
            const linkedin = $('#linkedin').val();

            if (!facebook) {
                $('#facebook-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#facebook-empty').css('display', 'none');
                if (facebook !== '-' && !facebookRegex.test(facebook)) {
                    $('#facebook-invalid').css('display', '');
                    isInvalid = true;
                } else {
                    $('#facebook-invalid').css('display', 'none');
                }
            }

            if (!twitter) {
                $('#twitter-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#twitter-empty').css('display', 'none');
                if (twitter !== '-' && !twitterRegex.test(twitter)) {
                    $('#twitter-invalid').css('display', '');
                    isInvalid = true;
                } else {
                    $('#twitter-invalid').css('display', 'none');
                }
            }

            if (!instagram) {
                $('#instagram-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#instagram-empty').css('display', 'none');
                if (instagram !== '-' && !instagramRegex.test(instagram)) {
                    $('#instagram-invalid').css('display', '');
                    isInvalid = true;
                } else {
                    $('#instagram-invalid').css('display', 'none');
                }
            }

            if (!tiktok) {
                $('#tiktok-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#tiktok-empty').css('display', 'none');
                if (tiktok !== '-' && !tiktokRegex.test(tiktok)) {
                    $('#tiktok-invalid').css('display', '');
                    isInvalid = true;
                } else {
                    $('#tiktok-invalid').css('display', 'none');
                }
            }

            if (!linkedin) {
                $('#linkedin-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#linkedin-empty').css('display', 'none');
                if (linkedin !== '-' && !linkedinRegex.test(linkedin)) {
                    $('#linkedin-invalid').css('display', '');
                    isInvalid = true;
                } else {
                    $('#linkedin-invalid').css('display', 'none');
                }
            }

            if (!isInvalid) {
                $("#confirmpassword1").css("display", "none");
                $('#confirmModal').modal('show');
                $('.toast-save').toast('show');
                $(".btn-save").show();
                $(".save").show();
                $(".btn-delete").hide();
                $(".delete").hide();
            }


        }

        function hapus() {
            $('.toast-save').toast('show');
            $(".btn-save").hide();
            $(".save").hide();
            $(".btn-delete").show();
            $(".delete").show();
        }
    </script>
@endsection
