@extends('layouts.app')

@section('head')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // $(document).ready(function(){
    // function simpan(){
    //         // Create toast instance
    //         // confirm('Yakin');
    //         // return false;
    //         // // $(document).ready(function(){
    //             $(".toast-save-data").toast();
    //         //     $("#simpanData").on("click", function(){
    //         //         return true;
    //         //     });
    //         // });
    //     // return false;
    // }
    // });

    function saveeducation() {
        // console.log('ok')
        if ($('#nameuniversity').val().length == 0) {
            $("#nameuniversity1").css("display", "");
        } else if ($('#yearfrom').val().length == 0) {
            $("#yearfrom1").css("display", "");
        } else if ($('#yearto').val().length == 0) {
            $("#yearto1").css("display", "");
        } else {
            $('.toast-save-education').toast('show');
            $(".save").show();
        }
    }

    function saveoccupation() {
        console.log($('#yearfromoccup').val().length)
        if ($('#namecompany').val().length == 0) {
            $("#namecompany1").css("display", "");
        } else if ($('#yearfromoccup').val().length == 0) {
            $("#yearfromoccup1").css("display", "");
        } else if ($('#yeartooccup').val().length == 0) {
            $("#yeartooccup1").css("display", "");
        } else if ($('#noteoccupation').val().length == 0) {
            $("#noteoccupation1").css("display", "");
        } else {
            $('.toast-save-occupation').toast('show');
            $(".save").show();
        }
    }

    function saveministry() {
        // console.log('ok')
        if ($('#notememberministry').val().length == 0) {
            $("#notememberministry1").css("display", "");
        } else if ($('#dateinministry').val().length == 0) {
            $("#dateinministry1").css("display", "");
        } else if ($('#dateoutministry').val().length == 0) {
            $("#dateoutministry1").css("display", "");
        } else {
            $('.toast-save-ministry').toast('show');
            $(".save").show();
        }
    }

    function savecommission() {
        // console.log('ok')
        if ($('#notemembercommission').val().length == 0) {
            $("#notemembercommission1").css("display", "");
        } else if ($('#yearfromcommission').val().length == 0) {
            $("#yearfromcommission1").css("display", "");
        } else if ($('#yeartocommission').val().length == 0) {
            $("#yeartocommission1").css("display", "");
        } else {
            $('.toast-save-commission').toast('show');
            $(".save").show();
        }
    }

    function saveexpertise() {
        // console.log('ok')
        if ($('#noteexpertise').val().length == 0) {
            $("#noteexpertise1").css("display", "");
        } else {
            $('.toast-save-expertise').toast('show');
            $(".save").show();
        }
    }
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

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
                <button class="btn btn-light back-btn">
                    <i class="bi bi-arrow-left"> </i>
                </button>
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
                    @foreach($profile as $item)
                    <div class="col-auto">
                        <figure class="avatar avatar-60 rounded-10">
                            <img src="{{ '../' .  $item->photomember }}" alt="pict">
                        </figure>
                    </div>

                    <div class="col align-self-center">
                        <h3 class="col px-0 align-self-center text-color-theme">{{ $item->namemember }}</h3>
                        <p class="text-muted ">{{ $item->phone1 }} {{ $item->email }}<br>
                            <!--
                        {{ $profile[0]->typemember }} / {{ $profile[0]->numbermember }} / {{ $profile[0]->numberregistermember }}
                        -->
                            Reg. {{ $item->numbermember }}
                        </p>

                    </div>
                    @endforeach
                    <div class="col align-self-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group form-floating  mb-6">
                                <h6 class="mb-1">Gender / Blood Type</h6>
                                <p class="text-muted small">{{ $profile[0]->namegender }} / {{ $profile[0]->nameblood }} ({{ ($profile[0]->isallowasblooddonor) ? 'YES' : 'No' }})</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body" id="pageself">
                <p class="text-muted mb-3">
                    {{ $profile[0]->selfdescription }}
                </p>
                <div class="row">
                    <div class="col d-grid">
                        <a href="https://wa.me/{{ $profile[0]->phone1 }}" target="_blank" class="btn btn-default btn-lg shadow-sm">SEND WA</a>
                    </div>

                    <div class="col d-grid">
                        <a href="mailto:{{ $profile[0]->email }}?subject=Salam kenal via inCharge" class="btn btn-default btn-lg shadow-sm">EMAIL</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Membership  -->
        <div class="row mb-3" id="pagemember">
            <div class="col">
                <h6>Address Location</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <!--
                        <figure class="w-100">
                            <img src="../assets/img/map%402x.png" class="mw-100" alt="">
                        </figure>
                        -->
                    <div class="col-12 col-md-12  mb-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div id="map"></div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-floating  mb-3">
                                            <h6 class="mb-1">Home Address / ZIP Code</h6>
                                            <p class="text-muted small">{{ $profile[0]->address }} / Kode Pos: {{ $profile[0]->zipcode }}</p>

                                            <h6 class="mb-1">Google Address</h6>
                                            <p class="text-muted small">{{ $profile[0]->addressgoogle }}<br>Cord: {{ $profile[0]->latitude }},{{ $profile[0]->longitude }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-floating  mb-3">
                                            <h6 class="mb-1">City / Province / Country</h6>
                                            <p class="text-muted small">{{ $profile[0]->namecityaddress }} / {{ $profile[0]->nameprovinceaddress }} / {{ $profile[0]->nameprovinceaddress }}</p>

                                            <h6 class="mb-1">Remark to Reach Location</h6>
                                            <p class="text-muted small">{{ $profile[0]->addressremark }}</p>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="col-auto align-self-center">
                                            <a target="_blank" href="https://maps.google.com/?q={{$profile[0]->latitude}},{{$profile[0]->longitude}}" class="btn btn-link p-0">
                                                <!-- <i class="bi bi-arrow-up-right-circle fs-2"></i> -->
                                                <a onclick="opengmap();" class="btn btn-default btn-sm shadow-sm float-end" target="_blank">Google Map</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>


        <!-- EXPERTISE -->
        <div class="row mb-3" id="pageexpertise">
            <div class="col">
                <h6>Expertise</h6>
            </div>
            <div class="col-auto bg-default">
                <!--
                <a onclick="document.getElementById('commissionTambah').style.display = 'block'" class="small"><span class="badge bg-primary fw-light">Add New</span></a>
                -->
                <!-- <a href="#" class="small">Add New</a> -->
            </div>
        </div>

        <div class="row h-100 mb-4">

            <div class="">
                <div class="col-12">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row">
                                @foreach($expertise as $item)
                                <div class=" col-4 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <h6 class="mb-1">Expertise Name</h6>
                                        <p class="text-muted small">{{ $item->nameexpertise }}</p>
                                    </div>
                                </div>
                                <div class="col-8 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <h6 class="mb-1">Remark</h6>
                                        <p class="text-muted small">{{ $item->noteexpertise }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Commission  -->
        <div class="row mb-3" id="pagecommission">
            <div class="col">
                <h6>Commission</h6>
            </div>
            <div class="col-auto bg-default">
                <!--
                <a onclick="document.getElementById('commissionTambah').style.display = 'block'" class="small"><span class="badge bg-primary fw-light">Add New</span></a>
                -->
                <!-- <a href="#" class="small">Add New</a> -->
            </div>
        </div>
        <div class="card card-body mb-3 card-add" id="commissionTambah" style="display: none;">
            <form method="post" action="{{ url('amember/commission/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_commission" required>
                                @foreach($listcommission as $item)
                                <option value="{{ $item->id_commission }}">{{ $item->namecommission }}</option>
                                @endforeach
                            </select>
                            <label for="names">Commission Name</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="notemembercommission" placeholder="Twitter" id="notemembercommission">
                            <label for="names">Remark</label>
                            <p class="text-danger" id="notemembercommission1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="yearfrom" placeholder="Instagram" id="yearfromcommission">
                            <label for="names">From Date</label>
                            <p class="text-danger" id="yearfromcommission1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="yearto" placeholder="Tik tok" id="yeartocommission">
                            <label for="names">To Date</label>
                            <p class="text-danger" id="yeartocommission1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm mb-4">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="iscurrentlyhere" value="1" type="checkbox" id="isactivated">
                                                <label class="form-check-label" for="iscurrentlyhere">
                                                    <h6 class="mb-1">Is Currently Here </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="savecommission()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
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
        </div>

        @foreach($commission as $item)
        <div class="row h-100 mb-4">

            <div class="">
                <div class="col-12">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            @foreach($commission as $item)
                            <div class="row">
                                <div class="col-4 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <h6 class="mb-1">Commission Name</h6>
                                        <p class="text-muted small">{{ $item->namecommission }}</p>
                                    </div>
                                </div>
                                <div class="col-4 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <h6 class="mb-1">Period / Still Here</h6>
                                        <p class="text-muted small">{{ $item->yearfrom }} - {{ $item->yearto }} / {{ ($item->iscurrentlyhere) ? 'YES' : 'No' }}</p>
                                    </div>
                                </div>
                                <div class="col-4 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <h6 class="mb-1">Remark</h6>
                                        <p class="text-muted small">{{ $item->notemembercommission }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Ministry  -->
        <div class="row mb-3" id="pageministry">
            <div class="col">
                <h6>Ministry</h6>
            </div>
            <div class="col-auto bg-default">
                <!--
                <a onclick="document.getElementById('ministryTambah').style.display = 'block'" class="small"><span class="badge bg-primary fw-light">Add New</span></a>
                -->
                <!-- <a href="#" class="small">Add New</a> -->
            </div>
        </div>

        <!-- <div class="card card-body mb-3 card-add" id="ministryTambah" style="display: none;">
            <form method="post" action="{{ url('amember/ministry/add') }}">
                @csrf -->

    @foreach($ministry as $item)
    <div class="row h-100 mb-2">
      <div class="col-12">
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1">Ministry Name</h6>
                  <p class="text-muted small">{{ $item->nameministry }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1">Period / Still Here</h6>
                  <p class="text-muted small">{{ $item->datein }} - {{ $item->dateout }} / {{ ($item->iscurrentlyhere) ? 'YES' : 'No' }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1">Remark</h6>
                  <p class="text-muted small">{{ $item->notememberministry }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

        <!--    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_ministry" required>
                                @foreach($listministry as $item)
                                <option value="{{ $item->id_ministry }}">{{ $item->nameministry }}</option>
                                @endforeach
                            </select>
                            <label for="names">Ministry Name</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="noteministry" placeholder="Twitter" id="noteministry">
                            <label for="names">Remark</label>
                            <p class="text-danger" id="noteministry1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="datein" placeholder="Instagram" id="dateinministry">
                            <label for="names">From Date</label>
                            <p class="text-danger" id="dateinministry1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="dateout" placeholder="Tik tok" id="dateoutministry">
                            <label for="names">To Date</label>
                            <p class="text-danger" id="dateoutministry1" style="display: none;">Please fill in this field</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm mb-4">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="iscurrentlyhere" value="1" type="checkbox" id="iscurrentlyhere">
                                                <label class="form-check-label" for="iscurrentlyhere">
                                                    <h6 class="mb-1">Is Currently Here </h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> -->

        <!-- <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveministry()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
                            </div> -->
        <!-- <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('ministryTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div> -->

        <!--     <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">

                    <div class="toast toast-save-ministry mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan" data-bs-animation="true">

                        <div class="toast-header">

                            <img src="{{ asset('assets/img/logo_inch.png') }}" width="20px" class="rounded me-2" alt="...">

                            <strong class="me-auto">PERHATIAN!</strong>

                             <small>now</small> 

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
        </div> -->

        <div class="card card-body mb-3 card-add" id="expertiseTambah" style="display: none;">
            <form method="post" action="{{ url('amember/expertise/add') }}">
                @csrf
                <div class="row h-100 mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group form-floating  mb-3">
                            <select class="form-control" name="id_expertise" required>
                                @foreach($listexpertise as $item)
                                <option value="{{ $item->id_expertise }}">{{ $item->nameexpertise }}</option>
                                @endforeach
                            </select>
                            <label for="names">Expertise Name</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="form-group form-floating  mb-3">
                            <input required type="text" class="form-control" name="noteexpertise" placeholder="Twitter" id="noteexpertise">
                            <label for="names">Remark</label>
                        </div>
                        <p class="text-danger" id="noteexpertise1" style="display: none;">Please fill in this field</p>
                    </div>

                    <div class="card-body col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col d-grid">
                                <button onclick="saveexpertise()" class="btn btn-lg btn-default w-100 shadow" type="button">Save</button>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg shadow-sm text-white" type="reset" onclick="document.getElementById('expertiseTambah').style.display = 'none'">Cancel</a>
                            </div>
                        </div>
                    </div>

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


<!-- Education -->
        <div class="row mb-3" id="pageeducation">
            <div class="col">
                <h6>Education</h6>
            </div>
        </div>
        @foreach($education as $item)
        <div class="row h-100 mb-2">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 col-md-6 col-lg-4">
                                <div class="form-group form-floating  mb-3">
                                    <h6 class="mb-1">Education Level</h6>
                                    <p class="text-muted small">{{ $item->nameeducation }}</p>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-4">
                                <div class="form-group form-floating  mb-3">
                                    <h6 class="mb-1">School Name</h6>
                                    <p class="text-muted small">{{ $item->nameuniversity }}</p>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-4">
                                <div class="form-group form-floating  mb-3">
                                    <h6 class="mb-1">Note School</h6>
                                    <p class="text-muted small">{{ $item->noteuniversity }}</p>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-4">
                                <div class="form-group form-floating  mb-3">
                                    <h6 class="mb-1">Year From</h6>
                                    <p class="text-muted small">{{ $item->yearfrom }}</p>
                                </div>
                            </div>
                            <div class="col-8 col-md-6 col-lg-4">
                                <div class="form-group form-floating  mb-3">
                                    <h6 class="mb-1">Year To</h6>
                                    <p class="text-muted small">{{ $item->yearto }}</p>
                                </div>
                            </div>
                            <div class="col-4 col-md-6 col-lg-4">
                                <div class="form-group form-floating  mb-3">
                                    <h6 class="mb-1">Is Overseas</h6>
                                    <p class="text-muted small">{{ $item->isoverseas ? 'YES' : 'NO' }}</p>
                                </div>
                            </div>
                            <div class="col-8 col-md-6 col-lg-4">
                                <div class="form-group form-floating  mb-3">
                                    <h6 class="mb-1">Is Currently Here</h6>
                                    <p class="text-muted small">{{ $item->iscurrentlyhere ? 'YES' : 'NO' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    <!-- Contact -->
    <div class="col">
        <h6>Contact</h6>
    </div>
    @foreach($profile as $item)
    <div class="row h-100 mb-2">
      <div class="col-12">
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Email</h6>
                  <p class="text-muted small">{{ $item->email }}</p>
                </div>
              </div>
              <div class="col-8 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 for="names">Mobile 1 (Enabled WA)</h6>
                  <p class="text-muted small">{{ $item->phone1 }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 for="names">Mobile 2</h6>
                  <p class="text-muted small">{{ $item->phone2 }}</p>
                </div>
              </div>
              <div class="col-8 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 for="names">Fixed Line (Home)</h6>
                  <p class="text-muted small">{{ $item->phone3 }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach


    <!-- Family-->
    <div class="col">
        <h6>Family</h6>
    </div>
    @foreach($profile as $item)
    <div class="row h-100 mb-2">
      <div class="col-12">
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Member Status</h6>
                  <p class="text-muted small">{{ $item->namestatusmember }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Family Status</h6>
                  <p class="text-muted small">{{ $item->namestatusfamily }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Marrital Status</h6>
                  <p class="text-muted small">{{ $item->namestatusmarriage }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Date of Marriage</h6>
                  <p class="text-muted small">{{ $item->datemarriage }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Father's Name</h6>
                  <p class="text-muted small">{{ $item->namefather }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Mother's Name</h6>
                  <p class="text-muted small">{{ $item->namemother }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Spouse's Name</h6>
                  <p class="text-muted small">{{ $item->namespouse }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Old Family Code</h6>
                  <p class="text-muted small">{{ $item->familycodeold }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Current Family Code</h6>
                  <p class="text-muted small">{{ $item->familycodecurrent }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <!-- Social Media -->
    <div class="col">
        <h6>Social Media</h6>
    </div>
    @foreach($profile as $item)
    <div class="row h-100 mb-2">
      <div class="col-12">
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Facebook</h6>
                  <p class="text-muted small">{{ $item->facebook }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Twitter</h6>
                  <p class="text-muted small">{{ $item->twitter }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Instagram</h6>
                  <p class="text-muted small">{{ $item->email }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Tik Tok</h6>
                  <p class="text-muted small">{{ $item->tiktok }}</p>
                </div>
              </div>
              <div class="col-8 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Linkedin</h6>
                  <p class="text-muted small">{{ $item->linkedin }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <!-- Occupation -->
    <div class="col">
        <h6>Occupation</h6>
    </div>
    @foreach($occupation as $item)
    <div class="row h-100 mb-4">
      <div class="col-12">
        <div class="card shadow-sm mb-8">
          <div class="card-body">
            <div class="row">
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Occupation</h6>
                  <p class="text-muted small">{{ $item->nameoccupation }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Company Name</h6>
                  <p class="text-muted small">{{ $item->namecompany }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Note Occupation</h6>
                  <p class="text-muted small">{{ $item->noteoccupation }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Year From</h6>
                  <p class="text-muted small">{{ $item->yearfrom }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Year To</h6>
                  <p class="text-muted small">{{ $item->yearto }}</p>
                </div>
              </div>
              <div class="col-4 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                  <h6 class="mb-1" for="names">Is Currently Here</h6>
                  <p class="text-muted small">{{ $item->iscurrentlyhere ? 'YES' : 'NO' }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach


    <!-- Setting -->
    <div class="col">
        <h6>Setting</h6>
    </div>
    @foreach ($profile as $item)
    <div class="col-12">
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-4 col-md-6 col-lg-4">
              <div class="form-group form-floating  mb-3">
                <h6 class="mb-1" for="names">RFID Code</h6>
                <p class="text-muted small">{{ $item->codemember }}</p>
              </div>
            </div>
            <div class="col-4 col-md-6 col-lg-4">
              <div class="form-group form-floating  mb-3">
                <h6 class="mb-1" for="names">Age Group</h6>
                <p class="text-muted small">{{ $item->namelevel }}</p>
              </div>
            </div>
            <div class="col-4 col-md-6 col-lg-4">
              <div class="form-group form-floating  mb-3">
                <h6 class="mb-1" for="names">Institution Origin</h6>
                <p class="text-muted small">{{ $item->namechurch }}</p>
              </div>
            </div>
            <div class="col-4 col-md-6 col-lg-4">
              <div class="form-group form-floating  mb-3">
                <h6 class="mb-1" for="names">Commission Name</h6>
                <p class="text-muted small">{{ $item->namefield }}</p>
              </div>
            </div>
            <div class="col-8 col-md-6 col-lg-4">
              <div class="form-group form-floating  mb-3">
                <h6 class="mb-1" for="names">Termination Status</h6>
                <p class="text-muted small">{{ $item->nametermination }}</p>
              </div>
            </div>
            <div class="col-4 col-md-6 col-lg-4">
              <div class="form-group form-floating  mb-3">
                <h6 class="mb-1" for="names">Is User Commission</h6>
                <p class="text-muted small">{{ $item->isusercommission ? 'YES' : 'NO'}}</p>
              </div>
            </div>
            <div class="col-8 col-md-6 col-lg-4">
              <div class="form-group form-floating  mb-3">
                <h6 class="mb-1" for="names">Is Currently Here</h6>
                <p class="text-muted small">{{ $item->isactivated ? 'YES' : 'NO' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
        

    <!-- Button Close -->
    <div class="row h-100 mb-4">
        <div class="card-body col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col d-grid">
                        <a href="{{ url('mymember') }}" class="btn btn-default btn-lg shadow-sm">CLOSE</a>
                    </div>
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
        var map = L.map('map').setView([{{ $profile[0]->latitude }}, {{ $profile[0]->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $profile[0]->latitude }}, {{ $profile[0]->longitude }}]).addTo(map)
            .bindPopup('{{ $profile[0]->address }}')
            .openPopup();
    </script>

@endsection