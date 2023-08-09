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
                <h5>Membership Info</h5>
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
                <h6>Membership Info</h6>
            </div>
        </div>
        <form action="{{ url('myprofile/member') }}" method="post">
            @csrf
            <div class="row h-100 mb-4">
                <div class="alert alert-danger alert-block" style="display: none;">
                    <strong id="showError"></strong>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select id='membertype-id' name="id_membertype" class="form-control">
                            @foreach ($membertype as $item)
                            <option value="{{ $item->id_membertype }}" @if ($item->id_membertype == $data->id_membertype) selected @endif>
                                {{ $item->namemembertype }}
                            </option>
                            @endforeach
                        </select>
                        <label for="membertype-id">Member Type</label>
                        <p class="text-danger" id="membertype-id--empty" style="display: none;">
                            Please fill in this field
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="numberregistermember" value="{{ $data->numberregistermember }}" placeholder="numberregistermember" id="numberregistermember" />
                        <label for="numberregistermember">Number Register Member</label>
                        <p class="text-danger" id="numberregistermember--empty" style="display: none;">
                            Please fill in this field
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="numbermember" value="{{ $data->numbermember }}" placeholder="numbermember" id="numbermember" />
                        <label for="numbermember">Number Member</label>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="datechristening" value="{{ $data->datechristening }}" placeholder="datechristening" id="datechristening" />
                        <label for="datechristening">Date of Internalization / Ch</label>
                        <p class="text-danger" id="datechristening--invalid" style="display: none;">
                            Date is invalid
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="datebaptize" value="{{ $data->datebaptize }}" placeholder="datebaptize" id="datebaptize" />
                        <label for="datebaptize">Date of Acceptance / Bap</label>
                        <p class="text-danger" id="datebaptize--invalid" style="display: none;">
                            Date is invalid
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="dateinmembership" value="{{ $data->dateinmembership }}" placeholder="dateinmembership" id="dateinmembership" />
                        <label for="dateinmembership">Date In Membership</label>
                        <p class="text-danger" id="dateinmembership--invalid" style="display: none;">
                            Date is invalid
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="dateoutmembership" value="{{ $data->dateoutmembership }}" placeholder="dateoutmembership" id="dateoutmembership" />
                        <label for="dateoutmembership">Date Out Membership</label>
                        <p class="text-danger" id="dateoutmembership--invalid" style="display: none;">
                            Date is invalid
                        </p>
                    </div>
                </div>
            </div>

            <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                <div class="toast toast-save mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">
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
                            <div class="col delete">
                                Apakah Anda yakin ingin menghapus ini?
                            </div>
                            <div class="col-auto align-self-center ps-0">
                                <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>
                                <a href="{{ url('profile/member/delete/' . $data->id_membertype) }}" class="btn btn-sm btn-default btn-delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="main-container container">
                <div class="row h-100 ">
                    <div class="col-md-6 mb-1">
                        <button class="btn btn-lg btn-default w-100 shadow" type="button" onclick="return save()">Save</button>
                    </div>
                    <div class="col-md-6 mb-1">
                        <button class="btn btn-lg btn-danger w-100 shadow text-white" type="button" disabled onclick="return hapus()" disabled>Delete</button>
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
    function validateDateFormat(input) {
        const pattern = /^\d{4}-\d{2}-\d{2}$/;
        if (!pattern.test(input)) {
            return false;
        }

        const date = new Date(input);
        if (isNaN(date.getTime())) {
            return false;
        }

        return true;
    }

    function save() {
        let isInvalid = false;

        if ($('#membertype-id').val() === '1') {
            $('#membertype-id--empty').css('display', '');
            isInvalid = true;
        } else {
            $('#membertype-id--empty').css('display', 'none');
        }

        if (!$('#numberregistermember').val()) {
            $("#numberregistermember--empty").css("display", "");
            isInvalid = true;
        } else {
            $("#numberregistermember--empty").css("display", "none");
        }

        const christening = $('#datechristening').val();
        if (christening && !validateDateFormat(christening)) {
            $("#datechristening--invalid").css("display", "");
            isInvalid = true;
        } else {
            $("#datechristening--invalid").css("display", "none");
        }

        const baptize = $('#datebaptize').val();
        if (baptize && !validateDateFormat(baptize)) {
            $('#datebaptize--invalid').css('display', '');
            isInvalid = true;
        } else {
            $('#datebaptize--invalid').css('display', 'none');
        }

        const dateIn = $('#dateinmembership').val();
        if (dateIn && !validateDateFormat(dateIn)) {
            $('#dateinmembership--invalid').css('display', '');
            isInvalid = true;
        } else {
            $('#dateinmembership--invalid').css('display', 'none');
        }

        const dateOut = $('#dateoutmembership').val();
        if (dateOut && !validateDateFormat(dateOut)) {
            $('#dateoutmembership--invalid').css('display', '');
            isInvalid = true;
        } else {
            $('#dateoutmembership--invalid').css('display', 'none');
        }

        if (!isInvalid) {
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