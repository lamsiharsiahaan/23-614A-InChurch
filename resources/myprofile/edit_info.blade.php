@extends('layouts.app')
    @section('content')
<main class="h-100 has-header">
        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <button class="btn btn-light back-btn" >
                        <i class="bi bi-arrow-left"> </i>Cancel
                    </button>
                </div>
                <div class="col align-self-center text-center">
                    <h5>Basic Info</h5>
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
                                <img src="{{ '../public/img/profile/'.$data->photomember }}">
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
                    <h6>Basic Info</h6>
                </div>
            </div>
            <form action="{{ url('myprofile/info') }}" method="post">
            @csrf
            <div class="row h-100 mb-4">
                    <div class="alert alert-danger alert-block" style="display: none;"> 
                        <strong id="showError"></strong>
                    </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="namemember" value="{{ $data->name }}" placeholder="namemember" id="namemember">
                        <label for="namemember">Full Name</label>
                        <p class="text-danger" id="namemember1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="nickname" value="{{ $data->nickname }}" placeholder="nickname" id="nickname">
                        <label for="nickname">Nick Name</label>
                        <p class="text-danger" id="nickname1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="birthdate" value="{{ $data->birthdate }}" placeholder="birthdate" id="birthdate">
                        <label for="birthdate">Birth Date</label>
                        <p class="text-danger" id="birthdate1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4"> 
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_city" id="id_city" required>
                            
                            @foreach($city as $item)
                                <option value="{{ $item->id_city }}" @if($item->id_city == $data->idcity1) selected @endif>{{ $item->namecity }}</option>
                            @endforeach
                        </select>
                        <label for="id_city">Birth City</label>
                        <p class="text-danger" id="id_city1" style="display: none;">Please fill in this field</p>
                    </div>                    
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input readonly type="text" class="form-control" name="photomember" value="{{ $data->photomember }}" placeholder="photomember" id="photomember">
                        <label for="photomember">To change click Profile Picture</label>
                        <p class="text-danger" id="photomember1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_gender" id="id_gender" required>
                            
                            @foreach($gender as $item)
                                <option value="{{ $item->id_gender }}" @if($item->id_gender == $data->id_gender) selected @endif>{{ $item->namegender }}</option>
                            @endforeach
                        </select>
                        <label for="id_gender">Gender</label>
                        <p class="text-danger" id="id_gender1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_blood" id="id_blood" required>
                            
                            @foreach($blood as $item)
                                <option value="{{ $item->id_blood }}" @if($item->id_blood == $data->id_blood) selected @endif>{{ $item->nameblood }}</option>
                            @endforeach
                        </select>
                        <label for="id_blood">Blood Type</label>
                        <p class="text-danger" id="id_blood1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">                   
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_ethnic" id="id_ethnic" required>
                            
                            @foreach($ethnic as $item)
                                <option value="{{ $item->id_ethnic }}" @if($item->id_ethnic == $data->id_ethnic) selected @endif>{{ $item->nameethnic }}</option>
                            @endforeach
                        </select>
                        <label for="id_ethnic">Ethnic</label>
                        <p class="text-danger" id="id_ethnic1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_region" id="id_region" required>
                            
                            @foreach($region as $item)
                                <option value="{{ $item->id_region }}" @if($item->id_region == $data->id_region) selected @endif>{{ $item->nameregion }}</option>
                            @endforeach
                        </select>
                        <label for="id_region">Region</label>
                        <p class="text-danger" id="id_region1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_sector" id="id_sector" required>
                            
                            @foreach($sector as $item)
                                <option value="{{ $item->id_sector }}" @if($item->id_sector == $data->id_sector) selected @endif>{{ $item->namesector }}</option>
                            @endforeach
                        </select>
                        <label for="id_sector">Sector</label>
                        <p class="text-danger" id="id_sector1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_pooling" id="id_pooling" required>
                            
                            @foreach($pooling as $item)
                                <option value="{{ $item->id_pooling }}" @if($item->id_pooling == $data->id_pooling) selected @endif>{{ $item->namepooling }}</option>
                            @endforeach
                        </select>
                        <label for="id_pooling">Pooling</label>
                        <p class="text-danger" id="id_pooling1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_wind" id="id_wind" required>
                            
                            @foreach($wind as $item)
                                <option value="{{ $item->id_wind }}" @if($item->id_wind == $data->id_wind) selected @endif>{{ $item->namewind }}</option>
                            @endforeach
                        </select>
                        <label for="id_wind">Compass</label>
                        <p class="text-danger" id="id_wind1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm mb-4">
                        <ul class="list-group list-group-flush bg-none">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto pr-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="isallowasblooddonor" value="1" type="checkbox" id="settingscheck2" @if($data->isallowasblooddonor == '1') checked @endif>
                                            <label class="form-check-label" for="settingscheck2">
                                                <h6 class="mb-1">Agree As Blood Donor </h6>
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm mb-4">
                        <ul class="list-group list-group-flush bg-none">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto pr-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="isreborn" value="1" type="checkbox" id="settingscheck3" @if($data->isreborn == '1') checked @endif>
                                            <label class="form-check-label" for="settingscheck3">
                                                <h6 class="mb-1">Is Reborn </h6>
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10" id="konfirmasi">
                <div class="toast toast-save mb-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true" id="toastSimpan"
                    data-bs-animation="true">
                    <div class="toast-header">
                        <img src="{{ asset('assets/img/logo_inch.png') }}"  width="20px" class="rounded me-2" alt="...">
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
                                <a href="{{ url('profile/member/delete') }}" class="btn btn-sm btn-default btn-delete" >Delete</a>
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
            function save(){
                var gagal = 0;
                // for (var i = 1; i < 10; i++) {
                //     if ($('.validasi'+i)) {
                //         if($('.validasi'+i).val().length == 0){
                //             gagal +=1;
                //         }
                //     }
                // }
                if($('#id_gender').val().length == 0) {
                    $("#id_gender1").css("display", "");
                } else if($('#id_blood').val().length == 0) {
                    $("#id_blood1").css("display", "");
                } else if($('#id_city').val().length == 0) {
                    $("#id_city1").css("display", "");
                } else if($('#id_ethnic').val().length == 0) {
                    $("#id_ethnic1").css("display", "");
                } else if($('#id_region').val().length == 0 ) {
                    $("#id_region1").css("display", "");
                } else if($('#id_sector').val().length == 0 ) {
                    $("#id_sector1").css("display", "");
                } else if($('#id_pooling').val().length == 0 ) {
                    $("#id_pooling1").css("display", "");
                } else if($('#id_wind').val().length == 0 ) {
                    $("#id_wind1").css("display", "");
                } else if($('#namemember').val().length == 0 ) {
                    $("#namemember1").css("display", "");
                }
                 else if($('#nickname').val().length == 0 ) {
                    $("#nickname1").css("display", "");
                }
                 else if($('#birthdate').val().length == 0 ) {
                    $("#birthdate1").css("display", "");
                }
                 else if($('#photomember').val().length == 0 ) {
                    $("#photomember1").css("display", "");
                }else{
                    $("#confirmpassword1").css("display", "none");
                    $('#confirmModal').modal('show');
                    $('.toast-save').toast('show');
                    $(".btn-save").show();
                    $(".save").show();
                    $(".btn-delete").hide();
                    $(".delete").hide();
                }
                
                
            }
            function hapus(){
                $('.toast-save').toast('show');
                $(".btn-save").hide();
                $(".save").hide();
                $(".btn-delete").show();
                $(".delete").show();
            }
        </script>
    @endsection