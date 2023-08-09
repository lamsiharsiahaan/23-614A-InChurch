@extends('layouts.app')

@section('head')
<!-- required for emptying and disabling any element -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    /* [COMMISSION] to empty and disable YEAR_TO when IS_CURRENTLY_HERE is checked */
    $(document).ready(function() {
        $('#commission-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#commission-yearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#F2F2F2');

                $('#commission-yearto--empty').css('display', 'none');
                $('#commission-yearto--lessthan').css('display', 'none');
                $('#commission-yearto--not4digits').css('display', 'none');
            } else {
                $('#commission-yearto')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* [MINISTRY] to empty and disable YEAR_TO when IS_CURRENTLY_HERE is checked */
    $(document).ready(function() {
        $('#ministry-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#ministry-yearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#F2F2F2');

                $('#ministry-yearto--empty').css('display', 'none');
                $('#ministry-yearto--not4digits').css('display', 'none');
                $('#ministry-yearto--lessthan').css('display', 'none');
            } else {
                $('#ministry-yearto')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* [EDUCATION] to empty and disable YEAR_TO when IS_CURRENTLY_HERE is checked */
    $(document).ready(function() {
        $('#education-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#education-yearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#F2F2F2');

                $('#education-yearto--empty').css('display', 'none');
                $('#education-yearto--not4digits').css('display', 'none');
                $('#education-yearto--lessthan').css('display', 'none');
            } else {
                $('#education-yearto')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* [OCCUPATION] to empty and disable YEAR_TO when IS_CURRENTLY_HERE is checked */
    $(document).ready(function() {
        $('#occupation-ishere').change(function() {
            if ($(this).is(':checked')) {
                $('#occupation-yearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#F2F2F2');

                $('#occupation-yearto--empty').css('display', 'none');
                $('#occupation-yearto--not4digits').css('display', 'none');
                $('#occupation-yearto--lessthan').css('display', 'none');
            } else {
                $('#occupation-yearto')
                    .prop('disabled', false)
                    .css('background-color', '');
            }
        });
    });

    /* Validation for `Education` */
    function saveeducation() {
        let hasBug = false;

        const yearFrom = $('#education-yearfrom').val();
        const yearTo = $('#education-yearto').val();
        const isHere = $('#education-ishere').is(':checked');

        if ($('#education-id').val() === '1') {
            $("#education-id--empty").css("display", "");
            hasBug = true;
        } else {
            $("#education-id--empty").css("display", "none");
        }

        if (!$('#education-nameuniversity').val()) {
            $("#education-nameuniversity--empty").css("display", "");
            hasBug = true;
        } else {
            $("#education-nameuniversity--empty").css("display", "none");
        }

        if (!$('#education-noteuniversity').val()) {
            $("#education-noteuniversity--empty").css("display", "");
            hasBug = true;
        } else {
            $("#education-noteuniversity--empty").css("display", "none");
        }

        if (!yearFrom) {
            $("#education-yearfrom--empty").css("display", "");
            hasBug = true;
        } else {
            $("#education-yearfrom--empty").css("display", "none");
            if (yearFrom.length != 4) {
                $('#education-yearfrom--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#education-yearfrom--not4digits').css('display', 'none');
            }
        }

        if (!isHere) {
            if (!yearTo) {
                $('#education-yearto--empty').css('display', '');
                hasBug = true;
            } else {
                $('#education-yearto--empty').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#education-yearto--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#education-yearto--not4digits').css('display', 'none');
            }

            if (parseInt(yearTo) < parseInt(yearFrom)) {
                $('#education-yearto--lessthan').css('display', '');
                hasBug = true;
            } else {
                $('#education-yearto--lessthan').css('display', 'none');
            }
        }

        if (!hasBug) {
            $('.toast-save-education').toast('show');
            $(".save").show();
        }
    }

    // VALIDATION OCCUPATION
    function saveoccupation() {
        let hasBug = false;

        const yearFrom = $('#occupation-yearfrom').val();
        const yearTo = $('#occupation-yearto').val();
        const isHere = $('#occupation-ishere').is(':checked');

        if ($('#occupation-id').val() === '1') {
            $("#occupation-id--empty").css("display", "");
            hasBug = true;
        } else {
            $("#occupation-id--empty").css("display", "none");
        }

        if (!$('#occupation-namecompany').val()) {
            $("#occupation-namecompany--empty").css("display", "");
            hasBug = true;
        } else {
            $("#occupation-namecompany--empty").css("display", "none");
        }

        if (!$('#occupation-note').val()) {
            $("#occupation-note--empty").css("display", "");
            hasBug = true;
        } else {
            $("#occupation-note--empty").css("display", "none");
        }

        if (!yearFrom) {
            $("#occupation-yearfrom--empty").css("display", "");
            hasBug = true;
        } else {
            $("#occupation-yearfrom--empty").css("display", "none");
            if (yearFrom.length != 4) {
                $('#occupation-yearfrom--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#occupation-yearfrom--not4digits').css('display', 'none');
            }
        }

        if (!isHere) {
            if (!yearTo) {
                $('#occupation-yearto--empty').css('display', '');
                hasBug = true;
            } else {
                $('#occupation-yearto--empty').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#occupation-yearto--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#occupation-yearto--not4digits').css('display', 'none');
            }

            if (parseInt(yearTo) < parseInt(yearFrom)) {
                $('#occupation-yearto--lessthan').css('display', '');
                hasBug = true;
            } else {
                $('#occupation-yearto--lessthan').css('display', 'none');
            }
        }

        if (!hasBug) {
            $('.toast-save-occupation').toast('show');
            $(".save").show();
        }
    }

    /* Validation for `Ministry` */
    function saveministry() {
        let hasBug = false;

        const yearFrom = $('#ministry-yearfrom').val();
        const yearTo = $('#ministry-yearto').val();
        const isHere = $('#ministry-ishere').is(':checked');

        if ($('#ministry-id').val() === '1') {
            $("#ministry-id--empty").css("display", "");
            hasBug = true;
        } else {
            $("#ministry-id--empty").css("display", "none");
        }

        if (!$('#ministry-notemember').val()) {
            $("#ministry-notemember--empty").css("display", "");
            hasBug = true;
        } else {
            $("#ministry-notemember--empty").css("display", "none");
        }

        if (!yearFrom) {
            $("#ministry-yearfrom--empty").css("display", "");
            hasBug = true;
        } else {
            $("#ministry-yearfrom--empty").css("display", "none");
            if (yearFrom.length != 4) {
                $('#ministry-yearfrom--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#ministry-yearfrom--not4digits').css('display', 'none');
            }
        }

        if (!isHere) {
            if (!yearTo) {
                $('#ministry-yearto--empty').css('display', '');
                hasBug = true;
            } else {
                $('#ministry-yearto--empty').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#ministry-yearto--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#ministry-yearto--not4digits').css('display', 'none');
            }

            if (parseInt(yearTo) < parseInt(yearFrom)) {
                $('#ministry-yearto--lessthan').css('display', '');
                hasBug = true;
            } else {
                $('#ministry-yearto--lessthan').css('display', 'none');
            }
        }

        if (!hasBug) {
            $('.toast-save-ministry').toast('show');
            $(".save").show();
        }
    }

    /* Validation for `Commission` */
    function savecommission() {
        let hasBug = false;

        const yearFrom = $('#commission-yearfrom').val();
        const yearTo = $('#commission-yearto').val();
        const isHere = $('#commission-ishere').is(':checked');

        if ($('#commission-id').val() === '1') {
            $("#commission-id--empty").css("display", "");
            hasBug = true;
        } else {
            $("#commission-id--empty").css("display", "none");
        }

        if (!$('#commission-notemember').val()) {
            $("#commission-notemember--empty").css("display", "");
            hasBug = true;
        } else {
            $("#commission-notemember--empty").css("display", "none");
        }

        if (!yearFrom) {
            $("#commission-yearfrom--empty").css("display", "");
            hasBug = true;
        } else {
            $("#commission-yearfrom--empty").css("display", "none");
            if (yearFrom.length != 4) {
                $('#commission-yearfrom--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#commission-yearfrom--not4digits').css('display', 'none');
            }
        }

        if (!isHere) {
            if (!yearTo) {
                $('#commission-yearto--empty').css('display', '');
                hasBug = true;
            } else {
                $('#commission-yearto--empty').css('display', 'none');
            }

            if (yearTo.length != 4) {
                $('#commission-yearto--not4digits').css('display', '');
                hasBug = true;
            } else {
                $('#commission-yearto--not4digits').css('display', 'none');
            }

            if (parseInt(yearTo) < parseInt(yearFrom)) {
                $('#commission-yearto--lessthan').css('display', '');
                hasBug = true;
            } else {
                $('#commission-yearto--lessthan').css('display', 'none');
            }
        }

        if (!hasBug) {
            $('.toast-save-commission').toast('show');
            $(".save").show();
        }
    }

    // VALIDATION EXPERTISE
    function saveexpertise() {
        let hasBug = false;

        if ($('#expertise-id').val() == 1) {
            $('#expertise-id--empty').css('display', '');
            hasBug = true;
        } else {
            $('#expertise-id--empty').css('display', 'none');
        }

        if (!$('#expertise-note').val()) {
            $('#expertise-note--empty').css('display', '');
            hasBug = true;
        } else {
            $('#expertise-note=-empty').css('display', 'none');
        }

        if (!hasBug) {
            $('.toast-save-expertise').toast('show');
            $(".save").show();
        }
    }
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> -->

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
                        <a href="{{ url('profile/member_change_picture/' . $profile[0]->id_member) }}">
                            <figure class="avatar avatar-60 rounded-10">
                                <img src="{{ '../' . $profile[0]->photomember }}" alt="pict">
                            </figure>
                        </a>
                    </div>
                    <div class="col align-self-center">
                        <a href="{{ url('mymemberprofile/'. $profile[0]->id_member) }}">
                            <h3 class="col px-0 align-self-center text-color-theme">{{ $profile[0]->namemember }}</h3>
                        </a>
                        <p class="text-muted ">{{ $profile[0]->phone1 }} {{ $profile[0]->email }}</p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('memberprint/' . $profile[0]->id_member) }}" target="_blank" class="btn btn-44 btn-default shadow-sm ms-1">
                            <i class="bi bi-arrow-down-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body" id="pageself">
                <p class="text-muted mb-3">
                    {{ $profile[0]->selfdescription }}
                </p>
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/self_desc/' .$get_id) }}" class="btn btn-default btn-lg shadow-sm">#1 - View Self Description</a>
                    </div>
                    <!--
                    <div class="col d-grid">
                        <a href="chat.html" class="btn btn-light btn-lg shadow-sm">Chat</a>
                    </div>
                    -->
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
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->typemember }}" placeholder="Name" id="names">
                    <label for="names">Number Type</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->numberregistermember }}" placeholder="Name" id="names">
                    <label for="names">Number Register</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->numbermember }}" placeholder="Name" id="names">
                    <label for="names">Number Member</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->datechristening }}" placeholder="Tik tok" id="names">
                    <label for="names">Date of Internalization / Ch</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->datebaptize }}" placeholder="Tik tok" id="names">
                    <label for="names">Date of Acceptance / Bap</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="instagram" value="{{ $profile[0]->dateinmembership }}" placeholder="Instagram" id="names">
                    <label for="names">Date in Membership</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ $profile[0]->dateoutmembership }}" placeholder="Tik tok" id="names">
                    <label for="names">Date out Membership</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/member/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#2 - View Membership</a>
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
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->namemember }}" placeholder="Name" id="names">
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
                    <input readonly type="text" class="form-control" value="{{ ($profile[0]->isallowasblooddonor) ? 'YES' : 'No' }}" placeholder="Email or Phone" id="emailphone">
                    <label for="emailphone">Agree as Blood Donor?</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ ($profile[0]->isreborn) ? 'YES' : 'No' }}" placeholder="Name" id="names">
                    <label for="names">Is Reborn?</label>
                </div>
            </div>

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/info/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#3 - View Basic Info</a>
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
                                <h6 class="mb-1">N/A minutes</h6>
                                <p class="text-muted small">N/A kilometers away</p>
                            </div>

                            <div class="col-auto align-self-center">
                                <!-- <button class="btn btn-link p-0">
                                    <i class="bi bi-arrow-up-right-circle fs-2"></i>
                                </button> -->
                                <a onclick="opengmap();" class="btn btn-default btn-sm shadow-sm" target="_blank">Google Map</a>
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
                                    <input readonly type="email" class="form-control" name="email" value="{{ ($profile[0]->isallowasvisitee) ? 'YES' : 'No' }}" placeholder="Email" id="names">
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
                                <a href="{{ url('profile/address/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#4
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
                    <label for="names">Phone1 enabled WA</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->phone2 }}" placeholder="Phone2" id="names">
                    <label for="names">Phone2</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" value="{{ $profile[0]->phone3 }}" placeholder="Phone3" id="names">
                    <label for="names">Phone3</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/contact/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#5 - View Contact</a>
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
                        <a href="{{ url('profile/family/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#6 - View Family</a>
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
                        <a href="{{ url('profile/socialmedia/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#7 - View Social Media</a>
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
                        <button class="btn btn-default btn-lg shadow-sm">#8 - View Institution</button>
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
            <form method="post" action="{{ url('profile/commission/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_commission" id="commission-id" required>
                                @foreach ($listcommission as $item)
                                <option value="{{ $item->id_commission }}">
                                    {{ $item->namecommission }}
                                </option>
                                @endforeach
                            </select>
                            <label for="names">Commission Name</label>
                            <p class="text-danger" id="commission-id--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="notemembercommission" placeholder="Twitter" id="commission-notemember" />
                            <label for="names">Remark</label>
                            <p class="text-danger" id="commission-notemember--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="yearfrom" placeholder="Instagram" id="commission-yearfrom" />
                            <label for="names">From Date</label>
                            <p class="text-danger" id="commission-yearfrom--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="commission-yearfrom--not4digits" style="display: none;">
                                From Date should be 4 digits long
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="yearto" placeholder="Tik tok" id="commission-yearto" />
                            <label for="names">To Date</label>
                            <p class="text-danger" id="commission-yearto--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="commission-yearto--lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                            <p class="text-danger" id="commission-yearto--not4digits" style="display: none;">
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
                                                <label class="form-check-label" for="commission-ishere">
                                                    <h6 class="mb-1">
                                                        Is Currently Here
                                                    </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <input type="hidden" name="get_id" value="{{ Crypt::encrypt($get_id) }}">
                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="savecommission()" class="btn btn-lg btn-default w-100 shadow" type="button">
                                    Save
                                </button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('commissionTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
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
                                    <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- END ADD COMMISSION -->
        </div>
        @foreach($commission as $item)

        <!-- DETAIL MINISTRY -->
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->namecommission }}" placeholder="Facebook" id="names">
                    <label for="names">Commission Name</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->yearfrom }}" placeholder="Instagram" id="names">
                    <label for="names">Year From</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->yearto }}" placeholder="Tik tok" id="names">
                    <label for="names">Year To</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ $item->notemembercommission }}" placeholder="Twitter" id="names">
                    <label for="names">Remark</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ ($item->iscurrentlyhere) ? 'YES' : 'No' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/commission/'. $item->id_member_commission.'/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#9 - View Commission</a>
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
            <form method="post" action="{{ url('profile1/ministry/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_ministry" id="ministry-id" required>
                                @foreach($listministry as $item)
                                <option value="{{ $item->id_ministry }}">
                                    {{ $item->nameministry }}
                                </option>
                                @endforeach
                            </select>
                            <label for="names">Ministry Name</label>
                            <p class="text-danger" id="ministry-id--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="notememberministry" placeholder="Twitter" id="ministry-notemember" />
                            <label for="names">Remark</label>
                            <p class="text-danger" id="ministry-notemember--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="datein" placeholder="Instagram" id="ministry-yearfrom" />
                            <label for="names">From Date</label>
                            <p class="text-danger" id="ministry-yearfrom--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="ministry-yearfrom--not4digits" style="display: none;">
                                From Date should be 4 digits long
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="dateout" placeholder="Tik tok" id="ministry-yearto" />
                            <label for="names">To Date</label>
                            <p class="text-danger" id="ministry-yearto--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="ministry-yearto--lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                            <p class="text-danger" id="ministry-yearto--not4digits" style="display: none;">
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
                                                <input class="form-check-input" name="iscurrentlyhere" value="1" type="checkbox" id="ministry-ishere">
                                                <label class="form-check-label" for="ministry-ishere">
                                                    <h6 class="mb-1">Is Currently Here </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <input type="hidden" name="get_id" value="{{ Crypt::encrypt($get_id) }}">
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
                                    <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END ADD MINISTRY -->
        </div>

        <!-- DETAIL MINISTRY -->
        @foreach($ministry as $item)
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
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ ($item->iscurrentlyhere) ? 'YES' : 'No' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/ministry/'.Crypt::encrypt($item->id_member_ministry)).'/'.$get_id  }}" class="btn btn-default btn-lg shadow-sm">#10 - View Ministry</a>
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
            <form method="post" action="{{ url('profile/education/add') }}" id="educationAdd">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_education" id="education-id" required>
                                @foreach($listedu as $l)
                                <option value="{{ $l->id_education }}">
                                    {{ $l->nameeducation }}
                                </option>
                                @endforeach
                            </select>
                            <label for="education-id">Education Level</label>
                            <p class="text-danger" id="education-id--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="nameuniversity" placeholder="Twitter" id="education-nameuniversity" />
                            <label for="education-nameuniversity">School Name</label>
                            <p class="text-danger" id="education-nameuniversity--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearfrom" placeholder="Instagram" id="education-yearfrom" />
                            <label for="education-yearfrom">From Date</label>
                            <p class="text-danger" id="education-yearfrom--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="education-yearfrom--not4digits" style="display: none;">
                                From Date should be 4 digits long
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="number" class="form-control" name="yearto" placeholder="Tik tok" id="education-yearto" />
                            <label for="education-yearto">To Date</label>
                            <p class="text-danger" id="education-yearto--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="education-yearto--not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                            <p class="text-danger" id="education-yearto--lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="noteuniversity" placeholder="Twitter" id="education-noteuniversity" />
                            <label for="education-noteuniversity">Note School</label>
                            <p class="text-danger" id="education-noteuniversity--empty" style="display: none;">
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
                                                <input class="form-check-input" name="isoverseas" value="1" type="checkbox" id="education-isoverseas" />
                                                <label class="form-check-label" for="education-isoverseas">
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

                    <input type="hidden" name="get_id" value="{{ Crypt::encrypt($get_id) }}">
                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveeducation()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
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

                                    <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>

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
        @foreach($education as $item)

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
                    <input readonly type="number" class="form-control" value="{{ $item->yearfrom  }}" name="yearfrom " placeholder="Instagram" id="names">
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
                    <p class="text-danger" id="noteuniversity" style="display: none;">Please fill in this field</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ ($item->isoverseas) ? 'YES' : 'No' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Overseas</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ ($item->iscurrentlyhere) ? 'YES' : 'No' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>
            <input readonly type="hidden" name="id_education" value="{{ $item->id_education }}">
            <input readonly type="hidden" name="id_member_education" value="{{ $item->id_member_education }}">

            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/education/'.Crypt::encrypt($item->id_member_education)).'/'.$get_id }}" class="btn btn-default btn-lg shadow-sm">#12 - View Education</a>
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
            <form method="post" action="{{ url('profile1/occupation/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_occupation" id="occupation-id" required>
                                @foreach($listoccup as $item)
                                <option value="{{ $item->id_occupation }}">
                                    {{ $item->nameoccupation }}
                                </option>
                                @endforeach
                            </select>
                            <label for="occupation-id">Occupation</label>
                            <p class="text-danger" id="occupation-id--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="namecompany" placeholder="Twitter" id="occupation-namecompany" />
                            <label for="occupation-namecompany">Company Name</label>
                            <p class="text-danger" id="occupation-namecompany--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="yearfrom" placeholder="Instagram" id="occupation-yearfrom" />
                            <label for="occupation-yearfrom">From Date</label>
                            <p class="text-danger" id="occupation-yearfrom--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="occupation-yearfrom--not4digits" style="display: none;">
                                From Date should be 4 digits long
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="yearto" placeholder="Tik tok" id="occupation-yearto" />
                            <label for="occupation-yearto">To Date</label>
                            <p class="text-danger" id="occupation-yearto--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="occupation-yearto--not4digits" style="display: none;">
                                To Date should be 4 digits long
                            </p>
                            <p class="text-danger" id="occupation-yearto--lessthan" style="display: none;">
                                To Date >= From Date
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="noteoccupation" placeholder="Twitter" id="occupation-note" />
                            <label for="occupation-note">Note Occupation</label>
                            <p class="text-danger" id="occupation-note--empty" style="display: none;">
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
                                                    <h6 class="mb-1">
                                                        Is Currently Here
                                                    </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <input type="hidden" name="get_id" value="{{ Crypt::encrypt($get_id) }}">
                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveoccupation()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
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

                                    <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>
            </form>
        </div>

        @foreach($occupation as $item)

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
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input type="text" class="form-control" value="{{ $item->noteoccupation }}" name="noteoccupation" placeholder="Twitter" id="noteoccupation">
                    <label for="names">Note Occupation</label>
                    <p class="text-danger" id="noteoccupation1" style="display: none;">Please fill in this field</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="" value="{{ ($item->iscurrentlyhere) ? 'YES' : 'No' }}" placeholder="Tik tok" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/occupation/'.Crypt::encrypt($item->id_member_occupation)).'/'.$get_id}}" class="btn btn-default btn-lg shadow-sm">#13 - View Occupation</a>
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
            <form method="POST" action="{{ url('profile1/expertise/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_expertise" id="expertise-id" required>
                                @foreach($listexpertise as $item)
                                <option value="{{ $item->id_expertise }}">
                                    {{ $item->nameexpertise }}
                                </option>
                                @endforeach
                            </select>
                            <label for="expertise-id">Expertise Name</label>
                            <p class="text-danger" id="expertise-id--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="noteexpertise" placeholder="Twitter" id="expertise-note" />
                            <label for="expertise-note">Remark</label>
                            <p class="text-danger" id="expertise-note--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <input type="hidden" name="get_id" value="{{ Crypt::encrypt($get_id) }}">
                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button type="submit" onclick="saveexpertise()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('expertiseTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="get_id" value="{{ Crypt::encrypt($get_id) }}">

                </div>

                <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">

                    <div class="toast toast-save-expertise mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">

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

                                    <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>


            </form>
        </div>

        @foreach($expertise as $item)
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
                        <a href="{{ url('profile/expertise/'.Crypt::encrypt($item->id_member_expertise)).'/'.$get_id }}" class="btn btn-default btn-lg shadow-sm">#14 - View Expertise</a>
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
                    <input readonly type="text" class="form-control" name="facebook" value="{{ $profile[0]->codemember  }}" placeholder="Facebook" id="names">
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
                    <input readonly type="text" class="form-control" name="tiktok" value="{{ ($profile[0]->isusercommission) ? 'YES' : 'No' }}" placeholder="Tik tok" id="names">
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
                    <input readonly type="text" class="form-control" name="linkedin" value="{{ ($profile[0]->isactivated) ? 'YES' : 'No' }}" placeholder="Linkedin" id="names">
                    <label for="names">Is Currently Here</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input readonly type="text" class="form-control" name="linkedin" value="{{ ($profile[0]->isdisplayed) ? 'YES' : 'No' }}" placeholder="Linkedin" id="names">
                    <label for="names">Is Default Displayed</label>
                </div>
            </div>
            <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('profile/setting/'.$get_id) }}" class="btn btn-default btn-lg shadow-sm">#15 - View Setting</a>
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