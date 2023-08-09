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
                    <h5>Expertise</h5>
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
                    <h5>Expertise</h5>
                </div>
            </div>
            <form action="{{ url('myprofile/expertise') }}" method="post">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="alert alert-danger alert-block" style="display: none;">
                        <strong id="showError"></strong>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="hidden" name="id_member_expertise" value="{{ $data->id_member_expertise }}">
                        <input type="hidden" name="id_expertise" value="{{ $data->id_expertise }}">

                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_expertise" id="id_expertise">
                                @foreach ($expertise as $item)
                                    <option value="{{ $item->id_expertise }}"
                                        @if ($data->id_expertise == $item->id_expertise) selected @endif>{{ $item->nameexpertise }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="confirmpassword">Expertise Name</label>
                            <p class="text-danger" id="id_expertise-empty" style="display: none;">Please fill in this field
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group form-floating  mb-3">
                            <input class="form-control" name="noteexpertise" placeholder="Your Query" id="noteexpertise"
                                required value="{{ $data->noteexpertise }}">
                            <label for="confirmpassword">Remark</label>
                            <p class="text-danger" id="noteexpertise-empty" style="display: none;">Please fill in this field
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
                                    <a href="{{ url('myprofile/expertise/delete/' . $data->id_member_expertise) }}"
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
        function save() {
            let isInvalid = false;

            if ($('#id_expertise').val() == 1) {
                $("#id_expertise-empty").css("display", "");
                isInvalid = true
            } else {
                $("#id_expertise-empty").css("display", "none");
            }

            if ($('#noteexpertise').val().length == 0) {
                $("#noteexpertise-empty").css("display", "");
                isInvalid = true
            } else {
                $("#noteexpertise-empty").css("display", "none");
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
