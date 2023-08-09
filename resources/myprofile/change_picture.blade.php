@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="https://coderszine.com/demo/crop-image-and-upload-using-jquery-and-php/croppie/croppie.css">
@endsection
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
                <h5>Self Description</h5>
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
                            <img id="profilmember" src="{{ $data->photomember }}">
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
                <h6>Profile Picture</h6>
            </div>
        </div>

        <div class="main-container container">
            <!-- banner -->
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <img src="{{ asset('public/img/profile/'.$data->photomember) }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <!-- <button class="btn btn-default btn-lg mb-3 px-4 shadow-sm" data-bs-target="#cammodal"
                            data-bs-toggle="modal">
                            <i class="bi bi-camera mx-2"></i> Enable Camera
                        </button> -->
                    <div class="row mt-4 text-center">
                        <div class="col-md-12 text-center">
                            <div id="upload-image"></div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success cropped_image mt-4">Crop Image</button>
                        </div>
                        <div class="col-md-12 crop_preview mt-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="form-group form-floating">
                    <input type="file" class="form-control" id="fileupload">
                    <label for="fileupload">Uplaod File</label>
                </div>
            </div>
        </div>
        <div class="row h-100 ">
            <div class="col-6 mb-4">
                <button class="btn btn-default btn-lg w-100 btn-save" disabled>Save</button>
            </div>
            <div class="col-6 mb-4">
                <button class="btn btn-default btn-lg w-100 btn-reset" onclick="return document.getElementById('fileupload').reset()">Reset</button>
            </div>
        </div>

        <!--  -->
        <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
            <div class="toast toast-success mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">
                <div class="toast-header">
                    <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="..." />
                    <strong class="me-auto">PERHATIAN!</strong>

                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>

                <div class="toast-body">
                    <div class="row">
                        <div class="col save">
                            Foto berhasil diubah!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

    </div>
    <!-- main page content ends -->
</main>
@endsection
@section('script')
<script>
    function save() {
        if ($('#confirmpassword').val().length == 0) {
            $("#confirmpassword1").css("display", "");
        } else {
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
                // alert(data.photomember)
                $("#profilmember").attr("src", data.photomember);
            }
        });
        $image_crop = $('#upload-image').croppie({
            enableExif: true,
            viewport: { //Size image yang akan dicrop
                width: 250,
                height: 250,
                type: 'square'
            },
            boundary: { //Size layar utk crop
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
            if ($('#fileupload').val()) {
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    // alert(response)
                    $(".btn-save").prop("disabled", false)
                    html = '<img id="croppedimg" src="' + response + '" />';
                    $(".crop_preview").html(html);
                });
            }
        });
        $('.btn-save').on('click', function() {
            $.ajax({
                url: "{{ url('myprofile/change_picture') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    urldir: "{{ URL::to('/images/') }}",
                    image: $('#croppedimg').attr('src')
                },
                dataType: 'json',
                beforeSend: function() {
                    $(".btn-save").prop("disabled", true)
                    $(".btn-save").html("Mohon Tunggu!");
                },
                success: function(data) {
                    $('.toast-success').toast('show');
                    $(".btn-save").prop("disabled", false)
                    $(".btn-save").html("Save");
                    $("#profilmember").attr("src", $('#croppedimg').attr('src'));
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
@endsection