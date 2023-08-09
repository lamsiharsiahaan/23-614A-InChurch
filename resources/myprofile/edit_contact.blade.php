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
                    <h5>Contact</h5>
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
                    <h6>Contact</h6>
                </div>
            </div>
            <form action="{{ url('myprofile/contact') }}" method="post" id='edit-contact-form'>
                @csrf
                <div class="row h-100 mb-4">
                    <div class="alert alert-danger alert-block" style="display: none;">
                        <strong id="showError"></strong>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="email" value="{{ $data->email }}"
                                placeholder="email" id="email">
                            <label for="email">Email</label>
                            <p class="text-danger" id="email-empty" style="display: none;">Please fill in this field</p>
                            <p class="text-danger" id="email-invalid" style="display: none;">Email is invalid</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" pattern="^\62\d{9,12}$" class="form-control" name="phone1"
                                value="{{ $data->phone1 }}" placeholder="phone1" id="phone_1">
                            <label for="phone_1">Mobile 1 (Enabled WA)</label>
                            <p class="text-danger" id="phone_1-empty" style="display: none;">Please fill in this field</p>
                            <p class="text-danger" id="phone_1-invalid" style="display: none;">
                                Please use 628xxxx format (ex: 628123456789 for 08123456789)
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" pattern="^\62\d{9,12}$"class="form-control" name="phone2"
                                value="{{ $data->phone2 }}" placeholder="phone2" id="phone_2">
                            <label for="phone_2">Mobile 2</label>
                            <p class="text-danger" id="phone_2-empty" style="display: none;">Please fill in this field</p>
                            <p class="text-danger" id="phone_2-invalid" style="display: none;">
                                Please use 628xxxx format (ex: 628123456789 for 08123456789)
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control" name="phone3" value="{{ $data->phone3 }}"
                                placeholder="phone3" id="fixed_line">
                            <label for="phone3">Fixed Line (Home)</label>
                            <p class="text-danger" id="fixed_line-empty" style="display: none;">Please fill in this field
                            </p>
                            <p class="text-danger" id="fixed_line-invalid" style="display: none;">
                                Please use the correct format (ex: 022-3423421)
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
                            <button class="btn btn-lg btn-default w-100 shadow btn-block" onclick="save()"
                                type="button">Save</button>
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
        function validateMobile(number) {
            const cleanedNumber = number.replace(/\D/g, '');
            const pattern = /^62\d{9,11}$/;
            return pattern.test(cleanedNumber)
        }

        function validateTelephone(number) {
            const pattern = /^\d{3,4}-\d{4,10}$/;
            return pattern.test(number);
        }

        function validateEmail(email) {
            const pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
            return pattern.test(email);
        }

        function save() {
            let hasBug = false;

            const phone_1 = $('#phone_1').val();
            const phone_2 = $('#phone_2').val();
            const fixed_line = $('#fixed_line').val();
            const email = $('#email').val();

            if (!phone_1) {
                $('#phone_1-empty').css('display', '');
                hasBug = true;
            } else {
                $('#phone_1-empty').css('display', 'none');
                if (!validateMobile(phone_1) && phone_1 !== '-') {
                    $('#phone_1-invalid').css('display', '');
                    hasBug = true;
                } else {
                    $('#phone_1-invalid').css('display', 'none');
                }
            }

            if (!phone_2) {
                $('#phone_2-empty').css('display', '');
                hasBug = true;
            } else {
                $('#phone_2-empty').css('display', 'none');
                if (!validateMobile(phone_2) && phone_2 !== '-') {
                    $('#phone_2-invalid').css('display', '');
                    hasBug = true;
                } else {
                    $('#phone_2-invalid').css('display', 'none');
                }
            }

            if (!fixed_line) {
                $('#fixed_line-empty').css('display', '');
                hasBug = true;
            } else {
                $('#fixed_line-empty').css('display', 'none');
                if (!validateTelephone(fixed_line) && fixed_line !== '-') {
                    $('#fixed_line-invalid').css('display', '');
                    hasBug = true;
                } else {
                    $('#fixed_line-invalid').css('display', 'none');
                }
            }

            if (!email) {
                $('#email-empty').css('display', '');
                hasBug = true;
            } else {
                $('#email-empty').css('display', 'none');
                if (!validateEmail(email) && email !== '-') {
                    $('#email-invalid').css('display', '');
                    hasBug = true;
                } else {
                    $('#email-invalid').css('display', 'none');
                }
            }

            if (!hasBug) {
                // $("#confirmpassword1").css("display", "none");
                // $('#confirmModal').modal('show');
                $('.toast-save').toast('show');
                $(".btn-save").show();
                $(".save").show();
                $(".btn-delete").hide();
                $(".delete").hide();

                // const form = document.getElementById('edit-contact-form');
                // form.submit();
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
