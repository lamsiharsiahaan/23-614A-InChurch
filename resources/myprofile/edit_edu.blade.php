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
                    <h5>Education</h5>
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
                            <h5>{{ $data->namemember }}</h5>
                            <p class="text-muted ">{{ $data->phone1 }} {{ $data->email }} </p>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <p class="text-muted ">
                        {{ 'tes' }}
                    </p>
                </div>
            </div>
            <!-- profile information -->
            <div class="row mb-3">
                <div class="col">
                    <h6>Education</h6>
                </div>
            </div>
            <form action="{{ url('myprofile/education/store') }}" method="post">
                @csrf
                <!-- <input type="hidden" name="id_member_education"> -->
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_education" id="id_education">
                                @foreach ($listedu as $l)
                                    <option value="{{ $l->id_education }}"
                                        @if ($data->nameeducation == $l->nameeducation) selected @endif>
                                        {{ $l->nameeducation }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="names">Education Level</label>
                            <p class="text-danger" id="id_education1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" value="{{ $data->nameuniversity }}"
                                name="nameuniversity" placeholder="Twitter" id="nameuniversity">
                            <label for="names">School Name</label>
                            <p class="text-danger" id="nameuniversity-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input type="number" class="form-control" value="{{ $data->yearfrom }}" name="yearfrom"
                                placeholder="Instagram" id="yearfrom">
                            <label for="names">Year From</label>
                            <p class="text-danger mb-0" id="yearfrom-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="yearfrom-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="yearfrom-not4digits" style="display: none;">
                                Year From should be 4 digits long
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group form-floating  mb-3">
                            <input type="number" class="form-control" value="{{ $data->yearto }}" name="yearto"
                                placeholder="Tik tok" id="yearto">
                            <label for="names">Year To</label>
                            <p class="text-danger mb-0" id="yearto-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="yearto-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="yearto-not4digits" style="display: none;">
                                Year To should be 4 digits long
                            </p>
                            <p class="text-danger mb-0" id="yearto-lessthan" style="display: none;">
                                Year To >= Year From
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" value="{{ $data->noteuniversity }}"
                                name="noteuniversity" placeholder="Twitter" id="noteuniversity">
                            <label for="names">Remark</label>
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
                                                <input class="form-check-input" name="isoverseas" value="1"
                                                    type="checkbox" id="isoverseas"
                                                    @if ($data->isoverseas == '1') checked @endif>
                                                <label class="form-check-label" for="isoverseas">
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
                                                <input class="form-check-input" name="iscurrentlyhere" value="1"
                                                    type="checkbox" id="ishere"
                                                    @if ($data->iscurrentlyhere == '1') checked @endif>
                                                <label class="form-check-label" for="ishere">
                                                    <h6 class="mb-1">Is Currently Here </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <input type="hidden" name="id_member_education" value="{{ $data->id_member_education }}">

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
                                    <a href="{{ url('myprofile/education/delete/' . $data->id_member_education) }}"
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
                            <button class="btn btn-lg btn-danger w-100 shadow text-white" type="button"
                                onclick="return hapus()">Delete</button>
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
        $(document).ready(function() {
            // disable year_to when opening page if is_here is checked
            if ($('#ishere').is(':checked')) {
                $('#yearto')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#f2f2f2');
            }

            // handle change on is_here
            $('#ishere').change(function() {
                if ($(this).is(':checked')) {
                    $('#yearto')
                        .prop('disabled', true)
                        .val('')
                        .css('background-color', '#f2f2f2');

                    $('#yearto-empty').css('display', 'none');
                    $('#yearto-not4digits').css('display', 'none');
                    $('#yearto-lessthan').css('display', 'none');
                } else {
                    $('#yearto')
                        .prop('disabled', false)
                        .css('background-color', '');
                }
            });
        });

        function save() {
            let isInvalid = false;

            if ($('#id_education') === '1') {
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

            const dateIn = $('#yearfrom').val();
            const intDateIn = parseInt(dateIn);
            if (!dateIn) {
                $('#yearfrom-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#yearfrom-empty').css('display', 'none');
            }

            if (isNaN(intDateIn)) {
                $('#yearfrom-nan').css('display', '');
                isInvalid = true;
            } else {
                $('#yearfrom-nan').css('display', 'none');
            }

            if (dateIn.length != 4) {
                $('#yearfrom-not4digits').css('display', '');
                isInvalid = true;
            } else {
                $('#yearfrom-not4digits').css('display', 'none');
            }

            const dateOut = $('#yearto').val();
            const intDateOut = parseInt(dateOut);
            if (!$('#ishere').is(':checked')) {
                if (!dateOut) {
                    $('#yearto-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#yearto-empty').css('display', 'none');
                }

                if (isNaN(intDateIn)) {
                    $('#yearto-nan').css('display', '');
                    isInvalid = true;
                } else {
                    $('#yearto-nan').css('display', 'none');
                }

                if (dateOut.length != 4) {
                    $('#yearto-not4digits').css('display', '');
                    isInvalid = true;
                } else {
                    $('#yearto-not4digits').css('display', 'none');
                }

                if (intDateOut < intDateIn) {
                    $('#yearto-lessthan').css('display', '');
                    isInvalid = true;
                } else {
                    $('#yearto-lessthan').css('display', 'none');
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
