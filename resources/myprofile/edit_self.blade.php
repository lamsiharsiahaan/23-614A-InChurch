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
                            <img src='{{ $data->photomember }}'>
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
                <h6>Self Description</h6>
            </div>
        </div>
        <form action="{{ url('myprofile/self_desc') }}" method="post">
            @csrf
            <div class="row h-100 mb-4">
                <div class="col-12">
                    <div class="alert alert-danger alert-block" style="display: none;">
                        <strong id="showError"></strong>
                    </div>
                    <div class="form-group form-floating  mb-3">
                        <textarea class="form-control validasi1" name="description" placeholder="Your Query" rows="6" id="confirmpassword" required>{{ $data->selfdescription }}</textarea>
                        <label for="confirmpassword">Description</label>
                        <p class="text-danger" id="confirmpassword1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
            </div>
            <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                <div class="toast toast-save mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">
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
                            <div class="col delete">
                                Apakah Anda yakin ingin menghapus ini?
                            </div>
                            <div class="col-auto align-self-center ps-0">
                                <button class="btn btn-sm btn-default btn-save" type="submit">Save</button>
                                <a href="{{ url('profile/self_desc/delete') }}" class="btn btn-sm btn-default btn-delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="main-container container">
                <div class="row h-100 ">
                    <div class="col-md-6 mb-1">
                        <!-- <button class="btn btn-lg btn-default shadow btn-block" type="submit">Save</button> -->
                        <button class="btn btn-lg btn-default w-100 shadow" type="button" onclick="return save()">Save</button>
                    </div>
                    <div class="col-md-6 mb-1">
                        <button class="btn btn-lg btn-danger w-100 shadow text-white" type="button" onclick="return hapus()" disabled>Delete</button>
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
        var gagal = 0;
        // for (var i = 1; i < 10; i++) {
        //     if ($('.validasi'+i)) {
        //         if($('.validasi'+i).val().length == 0){
        //             gagal +=1;
        //         }
        //     }
        // }
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
@endsection