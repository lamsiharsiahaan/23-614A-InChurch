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
                    <h5>Family</h5>
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
                    <h6>Family</h6>
                </div>
            </div>
            <form action="{{ url('myprofile/family') }}" method="post">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="alert alert-danger alert-block" style="display: none;">
                        <strong id="showError"></strong>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <select name="id_statusmember" id="id_statusmember" class="form-control" required>
                                @foreach ($member as $item)
                                    <option value="{{ $item->id_statusmember }}"
                                        @if ($item->id_statusmember == $data->id_statusmember) selected @endif>
                                        {{ $item->namestatusmember }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="memberstatus">Member Status</label>
                            <p class="text-danger" id="memberstatus1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <select name="id_statusmarriage" id="id_statusmarriage" class="form-control" required>
                                @foreach ($marriage as $item)
                                    <option value="{{ $item->id_statusmarriage }}"
                                        @if ($item->id_statusmarriage == $data->id_statusmarriage) selected @endif>
                                        {{ $item->namestatusmarriage }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="id_statusmarriage">Member Status</label>
                            <p class="text-danger" id="id_statusmarriage--empty" style="display: none;">Please fill in this
                                field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <select name="id_statusfamily" id="id_statusfamily" class="form-control" required>
                                @foreach ($family as $item)
                                    <option value="{{ $item->id_statusfamily }}"
                                        @if ($item->id_statusfamily == $data->id_statusfamily) selected @endif>{{ $item->namestatusfamily }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="familycodecurrent">Family Status</label>
                            <p class="text-danger" id="id_statusfamily--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="datemarriage"
                                value="{{ $data->datemarriage }}" placeholder="datemarriage" id="datemarriage">
                            <label for="datemarriage">Date Of Marriage</label>
                            <p class="text-danger" id="datemarriage--empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger" id="datemarriage--invalid" style="display: none;">
                                Date is invalid
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="namefather" value="{{ $data->namefather }}"
                                placeholder="namefather" id="namefather">
                            <label for="namefather">Father's Name</label>
                            <p class="text-danger" id="namefather--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="namemother" value="{{ $data->namemother }}"
                                placeholder="namemother" id="namemother">
                            <label for="namemother">Mother's Name</label>
                            <p class="text-danger" id="namemother--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="namespouse" value="{{ $data->namespouse }}"
                                placeholder="namespouse" id="namespouse">
                            <label for="namespouse">Spouse Name</label>
                            <p class="text-danger" id="namespouse--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="familycodeold"
                                value="{{ $data->familycodeold }}" placeholder="familycodeold" id="familycodeold">
                            <label for="familycodeold">Family code old</label>
                            <p class="text-danger" id="familycodeold--empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="familycodecurrent"
                                value="{{ $data->familycodecurrent }}" placeholder="familycodecurrent"
                                id="familycodecurrent">
                            <label for="familycodecurrent">Current Family Code</label>
                            <p class="text-danger" id="familycodecurrent--empty" style="display: none;">
                                Please fill in this field
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
                            <button class="btn btn-lg btn-danger w-100 shadow text-white" type="button"
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
        function validateDate(input) {
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

            const marriage = $('#datemarriage').val();
            if (!marriage) {
                $("#datemarriage--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#datemarriage--empty").css("display", "none");
                if (!validateDate(marriage) && marriage !== '-') {
                    $("#datemarriage--invalid").css("display", "");
                    isInvalid = true;
                } else {
                    $("#datemarriage--invalid").css("display", "none");
                }
            }

            if (!$('#familycodeold').val()) {
                $("#familycodeold--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#familycodeold--empty").css("display", "none");
            }

            if (!$('#familycodecurrent').val()) {
                $("#familycodecurrent--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#familycodecurrent--empty").css("display", "none");
            }

            if (!$('#id_statusfamily').val()) {
                $("#id_statusfamily--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#id_statusfamily--empty").css("display", "none");
            }

            if (!$('#id_statusmarriage').val()) {
                $("#id_statusmarriage--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#id_statusmarriage--empty").css("display", "none");
            }

            if (!$('#namespouse').val()) {
                $("#namespouse--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#namespouse--empty").css("display", "none");
            }

            if (!$('#namefather').val()) {
                $("#namefather--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#namefather--empty").css("display", "none");
            }

            if (!$('#namemother').val()) {
                $("#namemother--empty").css("display", "");
                isInvalid = true;
            } else {
                $("#namemother--empty").css("display", "none");
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
