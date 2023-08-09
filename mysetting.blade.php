@extends('layouts.app')

@section('content')

<!-- Begin page -->
<main class="h-100 has-header">

    <!-- Header -->
    <header class="header position-fixed">
        <div class="row">
            <div class="col-auto">
                <button class="btn btn-light btn-44 back-btn" onclick="goToHomePage()">
                    <i class="bi bi-arrow-left"></i>
                </button>
            </div>
            <div class="col align-self-center text-center">
                <h5>Settings</h5>
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
        <!--
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-60 rounded-10">
                                <img src="assets/img/user1.jpg" alt="">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <h3 class="mb-0 text-color-theme">Maxartkiller</h3>
                            <p class="text-muted ">New York City, US</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted ">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin dignissim
                        nisi, eget malesuada ligula ultricies sit amet. Suspendisse efficitur ex eu est placerat mattis.
                    </p>
                </div>
            </div>
            -->

        <!-- profile information -->
        <!--
            <div class="row mb-3">
                <div class="col">
                    <h6>Basic Information</h6>
                </div>
            </div>
            <div class="row h-100 mb-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-floating mb-3">
                        <select class="form-control" id="country">
                            <option selected>United States (+1)</option>
                            <option>United Kingdoms (+44)</option>
                        </select>
                        <label for="country">Contry</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" value="Maxartkiller" placeholder="Name" id="names">
                        <label for="names">Name</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" value="Doe" placeholder="Surname" id="surnames">
                        <label for="surnames">Surname</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" value="info@maxartkiller.com"
                            placeholder="Email or Phone" id="emailphone">
                        <label for="emailphone">Email or Phone</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating">
                        <input type="file" class="form-control" id="fileupload">
                        <label for="fileupload">Uplaod File</label>
                    </div>
                </div>
            </div>
            -->

        <!-- Email Notifications settings -->
        <div class="row mb-3">
            <div class="col">
                <h6>Customize Your Prefereble Setting</h6>
            </div>
        </div>
        <form method="POST" action="{{ url('/mysetting') }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm mb-4">
                        <ul class="list-group list-group-flush bg-none">
                            <li class="list-group-item">
                                <!-- darkmodeswitch -->
                                <div class="row">
                                    <div class="col-auto pr-0 align-self-center text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="configisdarkmode" type="checkbox" id="darkmodeswitch" value="1" onclick="cek()" @if($setting[0]->configisdarkmode == '1') checked @endif>
                                            <label class="form-check-label" for="darkmodeswitch"></label>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <h6 class="mb-1">Activate Dark Mode</h6>
                                        <p class="text-muted small">Default will be in dark mode as for night vision</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto pr-0 align-self-center text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="configisprofilepublic" type="checkbox" id="configisprofilepublic" value="1" onclick="cek()" @if($setting[0]->configisprofilepublic == '1') checked @endif>
                                            <label class="form-check-label" for="configisprofilepublic"></label>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <h6 class="mb-1">Profile Avaialability</h6>
                                        <p class="text-muted small">Everyone can see my full profile in search. Allthough full profile, it shows only name, phone, address and map, email, gender, blood type. Other confidential data will not be shown.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto pr-0 align-self-center text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="configisnotifdevotional" type="checkbox" id="configisnotifdevotional" value="1" onclick="cek()" @if($setting[0]->configisnotifdevotional == '1') checked @endif>
                                            <label class="form-check-label" for="configisnotifdevotional"></label>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <h6 class="mb-1">Devotional Notification</h6>
                                        <p class="text-muted small">Receive devotinal notification to my email.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto pr-0 align-self-center text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="configisusherenabled" type="checkbox" id="configisusherenabled" value="1" onclick="cek()" @if($setting[0]->configisusherenabled == '1') checked @endif>
                                            <label class="form-check-label" for="configisusherenabled"></label>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <h6 class="mb-1">User Enabled</h6>
                                        <p class="text-muted small">Activate my features as user.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row h-100 ">
                    <div class="col-12 mb-4">
                        <button type="button" onclick="return save()" class="btn btn-lg w-100 btn-default btn-save">update</button>
                        <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">

                            <div class="toast toast-save mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">

                                <div class="toast-header">

                                    <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="...">

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
                                            <a href="" class="btn btn-sm btn-default btn-delete">Delete</a>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- main page content ends -->

</main>
<!-- Page ends-->

@endsection

@section('script')
<script>
    function save() {
        $('.toast-save').toast('show');
        $(".btn-save").show();
        $(".save").show();
        $(".btn-delete").hide();
        $(".delete").hide();
    }

    function hapus() {
        $('.toast-save').toast('show');
        $(".btn-save").hide();
        $(".save").hide();
        $(".btn-delete").show();
        $(".delete").show();
    }
</script>
<!-- <script>
    // Function to save the checkbox state to localStorage
    function save() {
        const checkbox = document.getElementById('configisdarkmode');
        const isChecked = checkbox.checked;
        localStorage.setItem('checkboxState', isChecked);
    }

    // Function to load the checkbox state from localStorage
    function loadCheckboxState() {
        const checkbox = document.getElementById('configisdarkmode');
        const savedState = localStorage.getItem('checkboxState');
        if (savedState === 'true') {
            checkbox.checked = true;
        } else {
            checkbox.checked = false;
        }
    }

    // Load the checkbox state when the page is loaded
    document.addEventListener('DOMContentLoaded', loadCheckboxState);
</script> -->
@endsection