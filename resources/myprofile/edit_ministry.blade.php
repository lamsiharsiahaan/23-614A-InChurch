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
                    <h5>Ministry</h5>
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
            </div>
            <!-- user information -->

            <!-- profile information -->
            <div class="row mb-3">
                <div class="col">
                    <h6>Ministry</h6>
                </div>
            </div>

            <form action="{{ url('myprofile/ministry') }}" method="post">
                @csrf
                <!-- <input type="hidden" name="id_member_ministry"> -->
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select name="id_ministry" id="id_ministry" class="form-control" required>
                                @foreach ($ministry as $item)
                                    <option value="{{ $item->id_ministry }}"
                                        @if ($item->id_ministry == $data->id_ministry) selected @endif>{{ $item->nameministry }}</option>
                                @endforeach
                            </select>
                            <label for="id_ministry">Ministry Name</label>
                            <p class="text-danger" id="id_ministry-empty" style="display: none;">
                                Please fill in this field
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="number" maxlength="4" class="form-control" name="datein"
                                value="{{ $data->datein }}" placeholder="Instagram" id="datein">
                            <label for="datein">Year From</label>
                            <p class="text-danger mb-0" id="datein-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="datein-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="datein-not4digits" style="display: none;">
                                Year From should be 4 digits long
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="number" maxlength="4" class="form-control" name="dateout"
                                value="{{ $data->dateout }}" placeholder="Tik tok" id="dateout">
                            <label for="dateout">Year To</label>
                            <p class="text-danger mb-0" id="dateout-empty" style="display: none;">
                                Please fill in this field
                            </p>
                            <p class="text-danger mb-0" id="dateout-nan" style="display: none;">
                                Value should be a number
                            </p>
                            <p class="text-danger mb-0" id="dateout-not4digits" style="display: none;">
                                Year To should be 4 digits long
                            </p>
                            <p class="text-danger mb-0" id="dateout-lessthan" style="display: none;">
                                Year To >= Year From
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="notememberministry"
                                value="{{ $data->notememberministry }}" placeholder="Twitter" id="notememberministry">
                            <label for="notememberministry">Remark</label>
                            <p class="text-danger" id="notememberministry-empty" style="display: none;">
                                Please fill in this field
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
                    <input type="hidden" name="id_member_ministry" value="{{ $data->id_member_ministry }}">

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
                                    <a href="{{ url('myprofile/ministry/delete/' . $data->id_member_ministry) }}"
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
                $('#dateout')
                    .prop('disabled', true)
                    .val('')
                    .css('background-color', '#f2f2f2');
            }

            // handle change on is_here
            $('#ishere').change(function() {
                if ($(this).is(':checked')) {
                    $('#dateout')
                        .prop('disabled', true)
                        .val('')
                        .css('background-color', '#f2f2f2');

                    $('#dateout-empty').css('display', 'none');
                    $('#dateout-not4digits').css('display', 'none');
                    $('#dateout-lessthan').css('display', 'none');
                } else {
                    $('#dateout')
                        .prop('disabled', false)
                        .css('background-color', '');
                }
            });
        });

        function save() {
            let isInvalid = false;

            if ($('#id_ministry') === '1') {
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

            const dateIn = $('#datein').val();
            const intDateIn = parseInt(dateIn);
            if (!dateIn) {
                $('#datein-empty').css('display', '');
                isInvalid = true;
            } else {
                $('#datein-empty').css('display', 'none');
            }

            if (isNaN(intDateIn)) {
                $('#datein-nan').css('display', '');
                isInvalid = true;
            } else {
                $('#datein-nan').css('display', 'none');
            }

            if (dateIn.length != 4) {
                $('#datein-not4digits').css('display', '');
                isInvalid = true;
            } else {
                $('#datein-not4digits').css('display', 'none');
            }

            const dateOut = $('#dateout').val();
            const intDateOut = parseInt(dateOut);
            if (!$('#ishere').is(':checked')) {
                if (!dateOut) {
                    $('#dateout-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#dateout-empty').css('display', 'none');
                }

                if (isNaN(intDateIn)) {
                    $('#dateout-nan').css('display', '');
                    isInvalid = true;
                } else {
                    $('#dateout-nan').css('display', 'none');
                }

                if (dateOut.length != 4) {
                    $('#dateout-not4digits').css('display', '');
                    isInvalid = true;
                } else {
                    $('#dateout-not4digits').css('display', 'none');
                }

                if (intDateOut < intDateIn) {
                    $('#dateout-lessthan').css('display', '');
                    isInvalid = true;
                } else {
                    $('#dateout-lessthan').css('display', 'none');
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
