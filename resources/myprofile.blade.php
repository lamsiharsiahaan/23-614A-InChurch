@extends('layouts.app')

@section('head')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    /* Toggle `is_currently_here` for `Commission` */
    $(document).ready(function() {
        $('#commission-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#yeartocommission')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#f2f2f2');

                $('#yeartocommission-empty').css('display', 'none');
                $('#yeartocommission-not4digits').css('display', 'none');
                $('#yeartocommission-lessthan').css('display', 'none');
            } else {
                $('#yeartocommission')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* Toggle `is_currently_here` for `Ministry` */
    $(document).ready(function() {
        $('#ministry-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#ministryyearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#f2f2f2');

                $('#ministryyearto-empty').css('display', 'none');
                $('#ministryyearto-not4digits').css('display', 'none');
                $('#ministryyearto-lessthan').css('display', 'none');
            } else {
                $('#ministryyearto')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* Toggle `is_currently_here` for `Education` */
    $(document).ready(function() {
        $('#education-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#educationyearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#f2f2f2');

                $('#educationyearto-empty').css('display', 'none');
                $('#educationyearto-not4digits').css('display', 'none');
                $('#educationyearto-lessthan').css('display', 'none');
            } else {
                $('#educationyearto')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* Toggle `is_currently_here` for `Occupation` */
    $(document).ready(function() {
        $('#occupation-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#occupationyearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#f2f2f2');

                $('#occupationyearto-empty').css('display', 'none');
                $('#occupationyearto-not4digits').css('display', 'none');
                $('#occupationyearto-lessthan').css('display', 'none');
            } else {
                $('#occupationyearto')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* Validation for `Education` */
    function saveeducation() {
        let isInvalid = false;

        if ($('#id_education').val() == 1) {
            $('#id_education-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#id_education-empty').css('display', 'none');
        }

        if (!$('#nameuniversity').val()) {
            $('#nameuniversity-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#nameuniversity-empty').css('display', 'none');
        }

        if (!$('#noteuniversity').val()) {
            $('#noteuniversity-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#noteuniversity-empty').css('display', 'none');
        }

        const yearFrom = $('#educationyearfrom').val();
        const intYearFrom = parseInt(yearFrom);
        if (!yearFrom) {
            $('#educationyearfrom-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#educationyearfrom-empty').css('display', 'none');
        }

        if (isNaN(intYearFrom)) {
            $('#educationyearfrom-nan').css('display', '');
            isInvalid = true;
        } else {
            $('#educationyearfrom-nan').css('display', 'none');
        }

        if (yearFrom.length != 4) {
            $('#educationyearfrom-not4digits').css('display', '');
            isInvalid = true;
        } else {
            $('#educationyearfrom-not4digits').css('display', 'none');
        }

        const yearTo = $('#educationyearto').val();
        const intYearTo = parseInt(yearTo);
        if (!$('#education-ishere').is(':checked')) {
            if (!yearTo) {
                $('#educationyearto-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#educationyearto-empty').css('display', 'none');
            }

            if (isNaN(intYearTo)) {
                $('#educationyearto-nan').css('display', '');
                isInvalid = true;
            } else {
                $('#educationyearto-nan').css('display', 'none');
            }

            if (parseInt(yearTo) < parseInt(yearFrom)) {
                $('#educationyearto-lessthan').css('display', '');
                isInvalid = true;
            } else {
                $('#educationyearto-lessthan').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#educationyearto-not4digits').css('display', '');
                isInvalid = true;
            } else {
                $('#educationyearto-not4digits').css('display', 'none');
            }
        }

        if (!isInvalid) {
            $('.toast-save-education').toast('show');
            $(".save").show();
        }
    }

    /* Validation for `Occupation` */
    function saveoccupation() {
        let isInvalid = false;

        if ($('#id_occupation').val() == 1) {
            $('#id_occupation-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#id_occupation-empty').css('display', 'none');
        }

        if (!$('#namecompany').val()) {
            $('#namecompany-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#namecompany-empty').css('display', 'none');
        }

        if (!$('#noteoccupation').val()) {
            $('#noteoccupation-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#noteoccupation-empty').css('display', 'none');
        }

        const yearFrom = $('#occupationyearfrom').val();
        const intYearFrom = parseInt(yearFrom);
        if (!yearFrom) {
            $('#occupationyearfrom-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#occupationyearfrom-empty').css('display', 'none');
        }

        if (isNaN(intYearFrom)) {
            $('#occupationyearfrom-nan').css('display', '');
            isInvalid = true;
        } else {
            $('#occupationyearfrom-nan').css('display', 'none');
        }

        if (yearFrom.length != 4) {
            $('#occupationyearfrom-not4digits').css('display', '');
            isInvalid = true;
        } else {
            $('#occupationyearfrom-not4digits').css('display', 'none');
        }

        const yearTo = $('#occupationyearto').val();
        const intYearTo = parseInt(yearTo);
        if (!$('#occupation-ishere').is(':checked')) {
            if (!yearTo) {
                $('#occupationyearto-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#occupationyearto-empty').css('display', 'none');
            }

            if (isNaN(intYearTo)) {
                $('#occupationyearto-nan').css('display', '');
                isInvalid = true;
            } else {
                $('#occupationyearto-nan').css('display', 'none');
            }

            if (intYearTo < intYearFrom) {
                $('#occupationyearto-lessthan').css('display', '');
                isInvalid = true;
            } else {
                $('#occupationyearto-lessthan').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#occupationyearto-not4digits').css('display', '');
                isInvalid = true;
            } else {
                $('#occupationyearto-not4digits').css('display', 'none');
            }
        }

        if (!isInvalid) {
            $('.toast-save-occupation').toast('show');
            $(".save").show();
        }
    }

    /* Validation for `Ministry` */
    function saveministry() {
        let isInvalid = false;

        if ($('#id_ministry').val() == 1) {
            $('#id_ministry-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#id_ministry-empty').css('display', 'none');
        }

        if (!$('#notememberministry').val()) {
            $('#notememberministry-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#notememberministry-empty').css('display', 'none');
        }

        const yearFrom = $('#ministryyearfrom').val();
        const intYearFrom = parseInt(yearFrom);
        if (!yearFrom) {
            $('#ministryyearfrom-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#ministryyearfrom-empty').css('display', 'none');
        }

        if (isNaN(intYearFrom)) {
            $('#ministryyearfrom-nan').css('display', '');
            isInvalid = true;
        } else {
            $('#ministryyearfrom-nan').css('display', 'none');
        }

        if (yearFrom.length != 4) {
            $('#ministryyearfrom-not4digits').css('display', '');
            isInvalid = true;
        } else {
            $('#ministryyearfrom-not4digits').css('display', 'none');
        }

        const yearTo = $('#ministryyearto').val();
        const intYearTo = parseInt(yearTo);
        if (!$('#ministry-ishere').is(':checked')) {
            if (!yearTo) {
                $('#ministryyearto-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#ministryyearto-empty').css('display', 'none');
            }

            if (isNaN(intYearTo)) {
                $('#ministryyearto-nan').css('display', '');
                isInvalid = true;
            } else {
                $('#ministryyearto-nan').css('display', 'none');
            }

            if (intYearTo < intYearFrom) {
                $('#ministryyearto-lessthan').css('display', '');
                isInvalid = true;
            } else {
                $('#ministryyearto-lessthan').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#ministryyearto-not4digits').css('display', '');
                isInvalid = true;
            } else {
                $('#ministryyearto-not4digits').css('display', 'none');
            }
        }

        if (!isInvalid) {
            $('.toast-save-ministry').toast('show');
            $(".save").show();
        }
    }

    /* Validation for `Commission` */
    function savecommission() {
        let isInvalid = false;

        if ($('#id_commission').val() == 1) {
            $('#id_commission-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#id_commission-empty').css('display', 'none');
        }

        if (!$('#notemembercommission').val()) {
            $('#notemembercommission-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#notemembercommission-empty').css('display', 'none');
        }

        const yearFrom = $('#yearfromcommission').val();
        const intYearFrom = parseInt(yearFrom);
        if (!yearFrom) {
            $('#yearfromcommission-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#yearfromcommission-empty').css('display', 'none');
        }

        if (isNaN(intYearFrom)) {
            $('#yearfromcommission-nan').css('display', '');
            isInvalid = true;
        } else {
            $('#yearfromcommission-nan').css('display', 'none');
        }

        if (yearFrom.length != 4) {
            $('#yearfromcommission-not4digits').css('display', '');
            isInvalid = true;
        } else {
            $('#yearfromcommission-not4digits').css('display', 'none');
        }

        const yearTo = $('#yeartocommission').val();
        const intYearTo = parseInt(yearTo);
        if (!$('#commission-ishere').is(':checked')) {
            if (!yearTo) {
                $('#yeartocommission-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#yeartocommission-empty').css('display', 'none');
            }

            if (isNaN(intYearFrom)) {
                $('#yeartocommission-nan').css('display', '');
                isInvalid = true;
            } else {
                $('#yeartocommission-nan').css('display', 'none');
            }

            if (intYearTo < intYearFrom) {
                $('#yeartocommission-lessthan').css('display', '');
                isInvalid = true;
            } else {
                $('#yeartocommission-lessthan').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#yeartocommission-not4digits').css('display', '');
                isInvalid = true;
            } else {
                $('#yeartocommission-not4digits').css('display', 'none');
            }
        }

        if (!isInvalid) {
            $('.toast-save-commission').toast('show');
            $(".save").show();
        }
    }

    /* Validation for `Expertise` */
    function saveexpertise() {
        let isInvalid = false;

        if ($('#id_expertise').val() == 1) {
            $('#id_expertise-empty').css('display', '');
            isInvalid = true;
        } else {
            $('#id_expertise-empty').css('display', 'none');
        }

        if (!$('#noteexpertise').val()) {
            $("#noteexpertise-empty").css("display", "");
            isInvalid = true;
        } else {
            $("#noteexpertise-empty").css("display", "none");
        }

        if (!isInvalid) {
            $('.toast-save-expertise').toast('show');
            $(".save").show();
        }
    }
</script>

<style>
    .trigger {
        background-color: #007afa;
        border: none;
        padding: 15px;
        cursor: pointer;
        color: #fff;
        border-radius: 7px;
    }

    .modal {
        width: 100%;
        height: 100%;
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 2000;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        position: relative;
        top: 35%;
        width: 80%;
        text-align: center;
        margin: 30px auto 0;
    }

    .modal-content p {
        font-size: 40px;
        color: #fff;
    }

    .modal .btn-close {
        position: absolute;
        top: 20px;
        right: 45px;
        cursor: pointer;
        color: #fff;
    }

    .modal input[type=text] {
        width: 80%;
        float: left;
        border: none;
        padding: 15px;
        box-sizing: border-box;
    }

    .modal button {
        width: 20%;
        float: left;
        border: none;
        padding: 15px;
        cursor: pointer;
        background-color: #007afa;
        color: #fff;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<style>
    #map {
        width: 100%;
        height: 200px;
    }
</style>
@endsection

@section('content')
<!-- Begin page -->
<main class="h-100">

    <!-- Header -->
    <header class="header position-fixed">
        <div class="row">
            <div class="col-auto">
                <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                    <i class="bi bi-list"></i>
                </a>
            </div>
            <div class="col align-self-center text-center">
                @include('layouts.logo')
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
    <div class="main-container container pt-0">
        <!-- user information -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ url('myprofile/change_picture') }}">
                            <figure class="avatar avatar-60 rounded-10">
                                <img src="{{ './public/img/profile/' . Auth::guard('admin')->user()->photomember }}" alt="">
                            </figure>
                        </a>
                        <!-- modal -->
                        <div class="modal" id="search-modal">
                            <!-- trigger untuk menutup modal -->
                            <span class="btn-close" onclick="document.getElementById('search-modal').style.display = 'none'" title="Close">
                                <i class="fa fa-close"></i></span>
                            <!-- isi modal -->
                            <div class="modal-content">
                                <div class="main-container container">

                                    <!-- profile information -->
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6>Change Profile Picture</h6>
                                        </div>
                                    </div>

                                    <div class="main-container">
                                        <!-- banner -->
                                        <div class="row mb-4">
                                            <div class="col-12 text-center">
                                                <img src="assets/img/user1.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-center mb-4">
                                                <div class="row mt-4">
                                                    <div class="col-md-5 text-center">
                                                        <div id="upload-image"></div>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <button class="btn btn-success cropped_image mt-4">Crop
                                                            Image</button>
                                                    </div>
                                                    <div class="col-md-4 crop_preview mt-4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row h-100 mb-4">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="form-group form-floating">
                                                <input type="file" class="form-control" id="fileupload" />
                                                <label for="fileupload">Uplaod File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row h-100 ">
                                        <div class="col-12 mb-4">
                                            <button class="btn btn-default btn-lg w-100 btn-save" disabled>Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end modal -->

                    </div>
                    <div class="col align-self-center">
                        <h3 class="col px-0 align-self-center text-color-theme">{{ $profile[0]->namemember }}</h3>
                        <p class="text-muted ">{{ $profile[0]->phone1 }} {{ $profile[0]->email }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body" id="pageself">
                <p class="text-muted mb-3">
                    {{ $profile[0]->selfdescription }}
                </p>
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/self_desc') }}" class="btn btn-default btn-lg shadow-sm">#1 - View
                            Self Description</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- followers and connections -->
        <div class="row mb-4 text-center py-4 bg-theme-light">
            <div class="col">
                <h6 class="mb-0">+254</h6>
                <p class="text-muted small">Followers</p>
            </div>
            <div class="col">
                <h6 class="mb-0">+124</h6>
                <p class="text-muted small">Connections</p>
            </div>
            <div class="col">
                <h6 class="mb-0">+1456</h6>
                <p class="text-muted small">Friends</p>
            </div>
        </div>

        <!-- summary -->
        <div class="row mb-3">
            <div class="col-6 col-md-4">
                <div class="card shadow-sm mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto px-0">
                                <div class="avatar avatar-40 bg-warning text-white shadow-sm rounded-10-end">
                                    <i class="bi bi-star"></i>
                                </div>
                            </div>
                            <div class="col">
                                <p class="text-muted size-12 mb-0">Attending Events</p>
                                <p>48546 pts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="card shadow-sm mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto px-0">
                                <div class="avatar avatar-40 bg-success text-white shadow-sm rounded-10-end">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                            </div>
                            <div class="col">
                                <p class="text-muted size-12 mb-0">Cashback</p>
                                <p>15 USD</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Membership  -->
        <div class="row mb-3" id="pagemember">
            <div class="col">
                <h6>Membership Info</h6>
            </div>
        </div>

        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->typemember }}" placeholder="Name" id="names" />
                    <label for="names">Number Type</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->numberregistermember }}" placeholder="Name" id="names" />
                    <label for="names">Number Register</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->numbermember }}" placeholder="Name" id="names" />
                    <label for="names">Number Member</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->datechristening }}" placeholder="Tik tok" id="names" />
                    <label for="names">Date of Internalization / Ch</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->datebaptize }}" placeholder="Tik tok" id="names" />
                    <label for="names">Date of Acceptance / Bap</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="instagram" value="{{ $profile[0]->dateinmembership }}" placeholder="Instagram" id="names" />
                    <label for="names">Date in Membership</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->dateoutmembership }}" placeholder="Tik tok" id="names" />
                    <label for="names">Date out Membership</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/member') }}" class="btn btn-default btn-lg shadow-sm">#2 - View
                            Membership</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- profile information -->
        <div class="row mb-3" id="pageinfo">
            <div class="col">
                <h6>Basic Information</h6>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namemember }}" placeholder="Name" id="names" />
                    <label for="names">Full Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->nickname }}" placeholder="Name" id="names">
                    <label for="names">Nick Name</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->birthdate }}" placeholder="Surname" id="surnames">
                    <label for="surnames">Birth Date</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namecitybirth }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Birth City</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->photomember }}" placeholder="Email or Phone" id="emailphone">
                    <label for="fileupload">Profile Picture</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namegender }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Gender</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->nameblood }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Blood Type</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->nameethnic }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Ethnic</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->nameregion }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Region</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namesector }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Sector</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namepooling }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Pooling</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namewind }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Compass</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->isallowasblooddonor ? 'YES' : 'NO' }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Agree as Blood Donor?</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->isreborn ? 'YES' : 'NO' }}" placeholder="Name" id="names">
                    <label for="names">Is Reborn?</label>
                </div>
            </div>

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/info') }}" class="btn btn-default btn-lg shadow-sm">#3 - View
                            Basic Info</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Address  -->
        <div class="row mb-3" id="pageaddress">
            <div class="col">
                <h6>Address</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h6 class="my-1">Location</h6>
                    </div>
                    <div class="card-body">
                        <div id="map"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="mb-1">N/A minuts</h6>
                                <p class="text-muted small">N/A kilometers away</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <!-- <button class="btn btn-link p-0">
                                                                                <i class="bi bi-arrow-up-right-circle fs-2"></i>
                                                                            </button> -->
                                <a href="https://www.google.com/maps/search/?api=1&query= .$profile[0]->latitude.' , '.$profile[0]->longitude }}" class="btn btn-default btn-sm shadow-sm" target="_blank">Google Map</a>
                                <!-- <a onclick="opengmap();" class="btn btn-default btn-sm shadow-sm" target="_blank">Google Map</a> -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->addressgoogle }}" placeholder="Email" id="names">
                                    <label for="names">Google Address</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->latitude }}" placeholder="Email" id="names">
                                    <label for="names">Google Latititude</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->longitude }}" placeholder="Email" id="names">
                                    <label for="names">Google Longitude</label>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->address }}" placeholder="Email" id="names">
                                    <label for="names">Actual Address</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->namecountryaddress }}" placeholder="Email" id="names">
                                    <label for="names">Country</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->nameprovinceaddress }}" placeholder="Email" id="names">
                                    <label for="names">Province</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->namecityaddress }}" placeholder="Email" id="names">
                                    <label for="names">City</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->zipcode }}" placeholder="Email" id="names">
                                    <label for="names">Zip Code</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-9">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->addressremark }}" placeholder="Email" id="names">
                                    <label for="names">Remark to Reach Location</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="email" class="form-control" name="email" value="{{ $profile[0]->isallowasvisitee ? 'YES' : 'NO' }}" placeholder="Email" id="names">
                                    <label for="names">Agree to be Visited?</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input readonly type="text" class="form-control" name="twitter" value="{{ $profile[0]->addresscode }}" placeholder="Twitter" id="names">
                                    <label for="names">Code Address</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <a href="{{ url('myprofile/address') }}" class="btn btn-default btn-lg shadow-sm">#4
                                    - View Address</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

        <!-- contact information -->
        <div class="row mb-3" id="pagecontact">
            <div class="col">
                <h6>Contact</h6>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="email" class="form-control" value="{{ $profile[0]->email }}" name="email" placeholder="Email" id="names">
                    <label for="names">Email</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->phone1 }}" placeholder="Phone1" id="names">
                    <label for="names">Mobile 1 (Enabled WA)</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->phone2 }}" placeholder="Phone2" id="names">
                    <label for="names">Mobile 2</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->phone3 }}" placeholder="Phone3" id="names">
                    <label for="names">Fixed Line (Home)</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/contact') }}" class="btn btn-default btn-lg shadow-sm">#5 - View
                            Contact</a>
                    </div>
                </div>
            </div>

        </div>


        <!-- FAMILY -->
        <div class="row mb-3" id="pagefamily">
            <div class="col">
                <h6>Family</h6>
            </div>
        </div>

        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namestatusmember }}" name="facebook" placeholder="Facebook" id="names">
                    <label for="names">Member Status</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namestatusfamily }}" name="twitter" placeholder="Twitter" id="names">
                    <label for="names">Family Status</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namestatusmarriage }}" name="instagram" placeholder="Instagram" id="names">
                    <label for="names">Marrital Status</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->datemarriage }}" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Date of Marriage</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namefather }}" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Father's Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namemother }}" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Mother's Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namespouse }}" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Spouse's Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->familycodeold }}" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Old Family Code</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->familycodecurrent }}" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Current Family Code</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/family') }}" class="btn btn-default btn-lg shadow-sm">#6 - View
                            Family</a>
                    </div>
                </div>
            </div>

        </div>


        <!-- SOCIAL MEDIA -->
        <div class="row mb-3" id="pagesocialmedia">
            <div class="col">
                <h6>Social Media</h6>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="facebook" value="{{ $profile[0]->facebook }}" placeholder="Facebook" id="names">
                    <label for="names">Facebook</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="twitter" value="{{ $profile[0]->twitter }}" placeholder="Twitter" id="names">
                    <label for="names">Twitter</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="instagram" value="{{ $profile[0]->instagram }}" placeholder="Instagram" id="names">
                    <label for="names">Instagram</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->tiktok }}" placeholder="Tik tok" id="names">
                    <label for="names">Tik tok</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="linkedin" value="{{ $profile[0]->linkedin }}" placeholder="Linkedin" id="names">
                    <label for="names">Linkedin</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/socialmedia') }}" class="btn btn-default btn-lg shadow-sm">#7 -
                            View Social Media</a>
                    </div>
                </div>
            </div>

        </div>


        <!-- INSTITUTION  -->
        <div class="row mb-3" id="pageinstitution">
            <div class="col">
                <h6>Institution</h6>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="facebook" placeholder="Facebook" id="names">
                    <label for="names">Location</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="twitter" placeholder="Twitter" id="names">
                    <label for="names">Address</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="instagram" placeholder="Instagram" id="names">
                    <label for="names">Schedule</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Is Institution Worker?</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" placeholder="Tik tok" id="names">
                    <label for="names">Work Name</label>
                </div>
            </div>

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a class="btn btn-default btn-lg shadow-sm">
                            #8 - View Institution
                        </a>
                        {{-- <a href="{{ url('myprofile/commission/' . $item->id_member_commission) }}"
                        class="btn btn-default btn-lg shadow-sm">#9 - View Commission</a> --}}
                    </div>
                </div>
            </div>

        </div>

        <!-- COMMISSION  -->
        <div class="row mb-3" id="pagecommission">
            <div class="col">
                <h6>Commission</h6>
            </div>
            <div class="col-auto bg-default">
                <a onclick="document.getElementById('commissionTambah').style.display = 'block'" class="small">
                    <span class="badge bg-primary fw-light">
                        Add Commission
                    </span>
                </a>
            </div>
        </div>
        <div class="card card-body mb-3 card-add" id="commissionTambah" style="display: none;">
            <!-- ADD COMMISSION -->
            <form method="post" action="{{ url('myprofile/commission/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_commission" id="id_commission" required>
                                @foreach ($listcommission as $item)
                                <option value="{{ $item->id_commission }}">
                                    {{ $item->namecommission }}
                                </option>
                                @endforeach
                            </select>
                            <p class="text-danger mb-0" id="id_commission-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <label for="names">Commission Name</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="notemembercommission" placeholder="Twitter" id="notemembercommission">
                            <label for="names">Remark</label>
                            <p class="text-danger mb-0" id="notemembercommission-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearfrom" placeholder="Instagram" id="yearfromcommission">
                            <label for="names">Year From</label>
                            <p class="text-danger mb-0" id="yearfromcommission-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="yearfromcommission-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="yearfromcommission-not4digits" style="display: none;">
                                From Date should be 4 digits long
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearto" placeholder="Tik tok" id="yeartocommission">
                            <label for="names">Year To</label>
                            <p class="text-danger mb-0" id="yeartocommission-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="yeartocommission-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="yeartocommission-lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                            <p class="text-danger mb-0" id="yeartocommission-not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm mb-4">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="iscurrentlyhere" value="1" type="checkbox" id="commission-ishere" />
                                                <label class="form-check-label" for="iscurrentlyhere">
                                                    <h6 class="mb-1">Is Currently Here</h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="savecommission()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('commissionTambah').style.display='none'">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" position-fixed bottom-0 start-50 translate-middle-x z-index-10" id="konfirmasi">
                    <div class="toast toast-save-commission mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">
                        <div class="toast-header">
                            <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="...">
                            <strong class="me-auto">PERHATIAN!</strong>
                            <!-- <small>now</small> -->
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <div class="row">
                                <div class="col save">
                                    Apakah Anda yakin ingin menyimpan ini?
                                </div>
                                <div class="col-auto align-self-center ps-0">
                                    <button class="btn btn-sm btn-default" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- END ADD COMMISSION -->
        </div>
        @foreach ($commission as $item)
        <!-- DETAIL MINISTRY -->
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->namecommission }}" placeholder="Facebook" id="names">
                    <label for="names">Commission Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->yearfrom }}" placeholder="Instagram" id="names">
                    <label for="names">Year From</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->yearto }}" placeholder="Tik tok" id="names">
                    <label for="names">Year To</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="form-group form-floating mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->notemembercommission }}" placeholder="Twitter" id="names">
                    <label for="names">Remark</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->iscurrentlyhere ? 'YES' : 'NO' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/commission/' . $item->id_member_commission) }}" class="btn btn-default btn-lg shadow-sm">#9 - View Commission</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END DETAIL MINISTRY-->
        @endforeach

        <!-- Ministry  -->
        <div class="row mb-3" id="pageministry">
            <div class="col">
                <h6>Ministry</h6>
            </div>
            <div class="col-auto bg-default">
                <a onclick="document.getElementById('ministryTambah').style.display = 'block'" class="small">
                    <span class="badge bg-primary fw-light">
                        Add Ministry
                    </span>
                </a>
            </div>
        </div>

        <div class="card card-body mb-3 card-add" id="ministryTambah" style="display: none;">
            <!-- ADD MINISTRY -->
            <form method="post" action="{{ url('myprofile/ministry/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating mb-3">
                            <select class="form-control" name="id_ministry" id="id_ministry" required>
                                @foreach ($listministry as $item)
                                <option value="{{ $item->id_ministry }}">
                                    {{ $item->nameministry }}
                                </option>
                                @endforeach
                            </select>
                            <label for="names">Ministry Name</label>
                            <p class="text-danger mb-0" id="id_ministry-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating mb-3">
                            <input required type="text" class="form-control" name="notememberministry" placeholder="Twitter" id="notememberministry" />
                            <label for="names">Remark</label>
                            <p class="text-danger mb-0" id="notememberministry-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating mb-3">
                            <input required type="number" class="form-control" name="datein" placeholder="Instagram" id="ministryyearfrom" />
                            <label for="names">Year From</label>
                            <p class="text-danger mb-0" id="ministryyearfrom-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="ministryyearfrom-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="ministryyearfrom-not4digits" style="display: none;">
                                From Date should be 4 digits long
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="dateout" placeholder="Tik tok" id="ministryyearto" />
                            <label for="names">Year To</label>
                            <p class="text-danger mb-0" id="ministryyearto-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="ministryyearto-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="ministryyearto-lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                            <p class="text-danger mb-0" id="ministryyearto-not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm mb-4">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="is_here" value="1" type="checkbox" id="ministry-ishere" />
                                                <label class="form-check-label" for="ministry-ishere">
                                                    <h6 class="mb-1">Is Currently Here</h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveministry()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('ministryTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                    <div class="toast toast-save-ministry mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">
                        <div class="toast-header">
                            <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="..." />
                            <strong class="me-auto">
                                PERHATIAN!
                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                            </button>
                        </div>
                        <div class="toast-body">
                            <div class="row">
                                <div class="col save">
                                    Apakah Anda yakin ingin menyimpan ini?
                                </div>
                                <div class="col-auto align-self-center ps-0">
                                    <button class="btn btn-sm btn-default" type="submit">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END ADD MINISTRY -->
        </div>

        <!-- DETAIL MINISTRY -->
        @foreach ($ministry as $item)
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="facebook" value="{{ $item->nameministry }}" placeholder="Facebook" id="names">
                    <label for="names">Ministry Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="instagram" value="{{ $item->datein }}" placeholder="Instagram" id="names">
                    <label for="names">Year From</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $item->dateout }}" placeholder="Tik tok" id="names">
                    <label for="names">Year To</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="twitter" value="{{ $item->notememberministry }}" placeholder="Twitter" id="names">
                    <label for="names">Remark</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $item->iscurrentlyhere ? 'YES' : 'NO' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/ministry/' . $item->id_member_ministry) }}" class="btn btn-default btn-lg shadow-sm">#10 - View Ministry</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END DETAIL MINISTRY -->
        @endforeach


        <!-- EDUCATION  -->
        <div class="row mb-3" id="pageeducation">
            <div class="col">
                <h6>Education</h6>
            </div>
            <div class="col-auto bg-default">
                <a onclick="document.getElementById('educationTambah').style.display = 'block'" class="small">
                    <span class="badge bg-primary fw-light">
                        Add Education
                    </span>
                </a>
            </div>
        </div>

        <div class="card card-body mb-3 card-add" id="educationTambah" style="display: none;">
            <!-- ADD EDUCATION -->
            <form method="post" action="{{ url('myprofile/education/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_education" id="id_education" required>
                                @foreach ($listedu as $l)
                                <option value="{{ $l->id_education }}">
                                    {{ $l->nameeducation }}
                                </option>
                                @endforeach
                            </select>
                            <label for="names">Education Level</label>
                            <p class="text-danger mb-0" id="id_education-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="nameuniversity" placeholder="Twitter" id="nameuniversity" />
                            <label for="names">School Name</label>
                            <p class="text-danger mb-0" id="nameuniversity-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearfrom" placeholder="Instagram" id="educationyearfrom" />
                            <label for="names">Year From</label>
                            <p class="text-danger mb-0" id="educationyearfrom-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="educationyearfrom-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="educationyearfrom-not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearto" placeholder="Tik tok" id="educationyearto" />
                            <label for="names">Year To</label>
                            <p class="text-danger mb-0" id="educationyearto-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="educationyearto-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="educationyearto-lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                            <p class="text-danger mb-0" id="educationyearto-not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="noteuniversity" placeholder="Twitter" id="noteuniversity" />
                            <label for="names">Note School</label>
                            <p class="text-danger mb-0" id="noteuniversity-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow-sm mb-4">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="isoverseas" value="1" type="checkbox" id="settingscheck3" />
                                                <label class="form-check-label" for="settingscheck3">
                                                    <h6 class="mb-1">Is Overseas </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow-sm mb-4">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="iscurrentlyhere" value="1" type="checkbox" id="education-ishere" />
                                                <label class="form-check-label" for="education-ishere">
                                                    <h6 class="mb-1">Is Currently Here </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveeducation()" type="button" class="btn btn-lg btn-default w-100 shadow">
                                    Save
                                </button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('educationTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                    <div class="toast toast-save-education mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">
                        <div class="toast-header">
                            <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="..." />
                            <strong class="me-auto">PERHATIAN!</strong>

                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>

                        <div class="toast-body">
                            <div class="row">
                                <div class="col save">
                                    Apakah Anda yakin ingin menyimpan ini?
                                </div>

                                <div class="col-auto align-self-center ps-0">
                                    <button class="btn btn-sm btn-default" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @php
        $no = 0;
        @endphp
        @foreach ($education as $item)
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $item->nameeducation }}" name="nameeducation" placeholder="Facebook" id="names">
                    <label for="names">Education Level</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $item->nameuniversity }}" name="nameuniversity" placeholder="Twitter" id="names">
                    <label for="names">School Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="number" class="form-control" value="{{ $item->yearfrom }}" name="yearfrom " placeholder="Instagram" id="names">
                    <label for="names">Year From</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="number" class="form-control" value="{{ $item->yearto }}" name="yearto" placeholder="Tik tok" id="names">
                    <label for="names">Year To</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group form-floating  mb-3">
                    <input type="text" class="form-control" value="{{ $item->noteuniversity }}" name="noteuniversity" placeholder="Twitter" id="noteuniversity">
                    <label for="names">Note School</label>
                    <p class="text-danger" id="noteuniversity" style="display: none;">
                        Please fill in this field
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->isoverseas ? 'YES' : 'NO' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Overseas</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->iscurrentlyhere ? 'YES' : 'NO' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>
            <input readonly type="hidden" name="id_education" value="{{ $item->id_education }}">
            <input readonly type="hidden" name="id_member_education" value="{{ $item->id_member_education }}">

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/education/' . Crypt::encrypt($item->id_member_education)) }}" class="btn btn-default btn-lg shadow-sm">#12 - View Education</a>
                    </div>
                </div>
            </div>

        </div>
        @endforeach




        <!-- occupation -->
        <div class="row mb-3" id="pageoccupation">
            <div class="col">
                <h6>Occupation</h6>
            </div>
            <div class="col-auto bg-default">
                <a onclick="document.getElementById('occupationTambah').style.display = 'block'" class="small">
                    <span class="badge bg-primary fw-light">
                        Add Occupation
                    </span>
                </a>
            </div>
        </div>

        <div class="card card-body mb-3 card-add" id="occupationTambah" style="display: none;">
            <!-- ADD OCCUPATION -->
            <form method="post" action="{{ url('myprofile/occupation/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_occupation" id="id_occupation" required>
                                @foreach ($listoccup as $item)
                                <option value="{{ $item->id_occupation }}">
                                    {{ $item->nameoccupation }}
                                </option>
                                @endforeach
                            </select>
                            <label for="names">Occupation</label>
                            <p class="text-danger mb-0" id="id_occupation-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="namecompany" placeholder="Twitter" id="namecompany" />
                            <label for="names">Company Name</label>
                            <p class="text-danger mb-0" id="namecompany-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearfrom" placeholder="Instagram" id="occupationyearfrom" />
                            <label for="names">Year From</label>
                            <p class="text-danger mb-0" id="occupationyearfrom-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="occupationyearfrom-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="occupationyearfrom-not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearto" placeholder="Tik tok" id="occupationyearto" />
                            <label for="names">Year To</label>
                            <p class="text-danger mb-0" id="occupationyearto-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="occupationyearto-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="occupationyearto-lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                            <p class="text-danger mb-0" id="occupationyearto-not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="noteoccupation" placeholder="Twitter" id="noteoccupation" />
                            <label for="names">Note Occupation</label>
                            <p class="text-danger mb-0" id="noteoccupation-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow-sm mb-4">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="iscurrentlyhere" value="1" type="checkbox" id="occupation-ishere" />
                                                <label class="form-check-label" for="occupation-ishere">
                                                    <h6 class="mb-1">Is Currently Here</h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveoccupation()" class="btn btn-lg btn-default w-100 shadow" type="button">
                                    Save
                                </button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('occupationTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">

                    <div class="toast toast-save-occupation mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">

                        <div class="toast-header">

                            <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="...">

                            <strong class="me-auto">PERHATIAN!</strong>

                            <!-- <small>now</small> -->

                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>

                        </div>

                        <div class="toast-body">

                            <div class="row">

                                <div class="col save">
                                    Apakah Anda yakin ingin menyimpan ini?
                                </div>

                                <div class="col-auto align-self-center ps-0">
                                    <button class="btn btn-sm btn-default" type="submit">Save</button>
                                </div>

                            </div>

                        </div>

                    </div>



                </div>
            </form>
        </div>

        @foreach ($occupation as $item)
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $item->nameoccupation }} " name="facebook" placeholder="Facebook" id="names">
                    <label for="names">Occupation</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $item->namecompany }} " name="twitter" placeholder="Twitter" id="names">
                    <label for="names">Company Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="instagram" value="{{ $item->yearfrom }} " placeholder="Instagram" id="names">
                    <label for="names">Year From</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $item->yearto }} " placeholder="Tik tok" id="names">
                    <label for="names">Year To</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-9">
                <div class="form-group form-floating  mb-3">
                    <input type="text" class="form-control" value="{{ $item->noteoccupation }}" name="noteoccupation" placeholder="Twitter" id="noteoccupation">
                    <label for="names">Note Occupation</label>
                    <p class="text-danger" id="noteoccupation1" style="display: none;">Please fill in this
                        field</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->iscurrentlyhere ? 'YES' : 'NO' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/occupation/' . $item->id_member_occupation) }}" class="btn btn-default btn-lg shadow-sm">#13 - View Occupation</a>
                    </div>
                </div>
            </div>

        </div>
        @endforeach


        <!-- expertise -->
        <div class="row mb-3" id="pageexpertise">
            <div class="col">
                <h6>Expertise</h6>
            </div>
            <div class="col-auto bg-default">
                <a onclick="document.getElementById('expertiseTambah').style.display = 'block'" class="small">
                    <span class="badge bg-primary fw-light">
                        Add Expertise
                    </span>
                </a>
            </div>
        </div>

        <div class="card card-body mb-3 card-add" id="expertiseTambah" style="display: none;">
            <form method="post" action="{{ url('myprofile/expertise/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_expertise" id="id_expertise" required>
                                @foreach ($listexpertise as $item)
                                <option value="{{ $item->id_expertise }}">
                                    {{ $item->nameexpertise }}
                                </option>
                                @endforeach
                            </select>
                            <label for="names">Expertise Name</label>
                            <p class="text-danger mb-0" id="id_expertise-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="noteexpertise" placeholder="Twitter" id="noteexpertise" />
                            <label for="names">Remark</label>
                            <p class="text-danger mb-0" id="noteexpertise-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveexpertise()" class="btn btn-lg btn-default w-100 shadow" type="button">
                                    Save
                                </button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('expertiseTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                    <div class="toast toast-save-expertise mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">
                        <div class="toast-header">

                            <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="..." />

                            <strong class="me-auto">PERHATIAN!</strong>

                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                            </button>
                        </div>

                        <div class="toast-body">

                            <div class="row">

                                <div class="col save">

                                    Apakah Anda yakin ingin menyimpan ini?

                                </div>

                                <div class="col-auto align-self-center ps-0">

                                    <button class="btn btn-sm btn-default" type="submit">Save</button>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>


            </form>
        </div>

        @foreach ($expertise as $item)
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $item->nameexpertise }}" name="facebook" placeholder="Facebook" id="names">
                    <label for="names">Expertise Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $item->noteexpertise }}" name="twitter" placeholder="Twitter" id="names">
                    <label for="names">Remark</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-6 col-lg-3">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/expertise/' . $item->id_member_expertise) }}" class="btn btn-default btn-lg shadow-sm">#14 - View Expertise</a>
                    </div>
                </div>
            </div>


        </div>
        @endforeach


        <!-- Setting -->
        <div class="row mb-3" id="pagesetting">
            <div class="col">
                <h6>Setting</h6>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="facebook" value="{{ $profile[0]->codemember }}" placeholder="Facebook" id="names">
                    <label for="names">RFID Code</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="instagram" value="{{ $profile[0]->namelevel }}" placeholder="Instagram" id="names">
                    <label for="names">Age Group</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->namechurch }}" placeholder="Tik tok" id="names">
                    <label for="names">Institution Origin</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->isusercommission ? 'YES' : 'NO' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is User Commission</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->namefield }}" placeholder="Tik tok" id="names">
                    <label for="names">Commission Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="linkedin" value="{{ $profile[0]->nametermination }}" placeholder="Linkedin" id="names">
                    <label for="names">Termination Status</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="linkedin" value="{{ $profile[0]->isactivated ? 'YES' : 'NO' }}" placeholder="Linkedin" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('myprofile/setting') }}" class="btn btn-default btn-lg shadow-sm">#15 -
                            View Setting</a>
                    </div>
                </div>
            </div>

        </div>




        <!-- summary swiper carousel -->
        <div class="row">
            <div class="col-12 px-0">
                <div class="swiper-container summayswiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card shadow-sm mb-4 alert-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 bg-primary text-white rounded-circle">
                                                <i class="bi bi-clock"></i>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <h6 class="mb-0">+155</h6>
                                            <p class="text-muted small">Hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm mb-4 alert-warning">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 bg-warning text-white rounded-circle">
                                                <i class="bi bi-cpu"></i>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <h6 class="mb-0">+365</h6>
                                            <p class="text-muted small">Processing</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm mb-4 alert-success">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 bg-success text-white rounded-circle">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <h6 class="mb-0">+658</h6>
                                            <p class="text-muted small">Pojects</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm mb-4 alert-danger">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 bg-danger text-white rounded-circle">
                                                <i class="bi bi-bar-chart"></i>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <h6 class="mb-0">+248</h6>
                                            <p class="text-muted small">Complete</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Connections -->
        <div class="row mb-3">
            <div class="col">
                <h6>Friends </h6>
            </div>
            <div class="col-auto align-self-center">
                <a class="small" href="userlist.html">View all</a>
            </div>
        </div>
        <div class="row">
            <div class="col-auto mb-4">
                <div class="avatar avatar-50 rounded-circle">
                    <img src="assets/img/user1.jpg" alt="">
                </div>
            </div>
            <div class="col-auto mb-4 ps-0">
                <div class="avatar avatar-50 rounded-circle">
                    <img src="assets/img/user2.jpg" alt="">
                </div>
            </div>
            <div class="col-auto mb-4 ps-0">
                <div class="avatar avatar-50 rounded-circle">
                    <img src="assets/img/user3.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- main page content ends -->

</main>
<!-- Page ends-->
@endsection

@section('script')
<script src="https://coderszine.com/demo/crop-image-and-upload-using-jquery-and-php/croppie/croppie.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ url('/get-image') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data) {
                $("#profilmember").attr("src", data.photomember);
            }
        });

        $image_crop = $('#upload-image').croppie({
            enableExif: true,

            // Size image yang akan dicrop
            viewport: {
                width: 250,
                height: 250,
                type: 'square'
            },

            // Size layar utk crop
            boundary: {
                width: 300,
                height: 300
            }
        });
        $('#fileupload').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $image_crop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.cropped_image').on('click', function(ev) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $(".btn-save").prop("disabled", false)
                html = '<img id="croppedimg" src="' + response + '" />';
                $(".crop_preview").html(html);
            });
        });

        $('.btn-save').on('click', function() {
            $.ajax({
                url: "{{ url('/save-image') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    urldir: "{{ URL::to('/images/') }}",
                    image: $('#croppedimg').attr('src')
                },
                dataType: 'json',
                beforeSend: function() {
                    $(".btn-save").prop("disabled", true)
                    $(".btn-save").html("Mohon Menunggu!");
                },
                success: function(data) {
                    alert(data.message)
                    $(".btn-save").prop("disabled", false)
                    $(".btn-save").html("Save");
                    $.ajax({
                        url: "{{ url('/get-image') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#profilmember").attr("src", data.photomember);
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    var map = L.map('map').setView([{
        {
            $profile[0] - > latitude
        }
    }, {
        {
            $profile[0] - > longitude
        }
    }], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{
            {
                $profile[0] - > latitude
            }
        }, {
            {
                $profile[0] - > longitude
            }
        }]).addTo(map)
        .bindPopup('{{ $profile[0]->address }}')
        .openPopup();
</script>
@endsection