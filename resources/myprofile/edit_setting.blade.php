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
                    <h5>Setting</h5>
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
                    <h6>Setting</h6>
                </div>
            </div>
            <form action="{{ url('myprofile/setting') }}" method="post">
            @csrf
            <div class="row h-100 mb-4">
                    <div class="alert alert-danger alert-block" style="display: none;"> 
                        <strong id="showError"></strong>
                    </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" name="codemember" value="{{ $data->codemember }}" placeholder="codemember" id="codemember">
                        <label for="codemember">RFID Code</label>
                        <p class="text-danger" id="codemember1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_level" id="id_level" required>
                            
                            @foreach($level as $item)
                                <option value="{{ $item->id_level }}" @if($item->id_level == $data->id_level) selected @endif>{{ $item->namelevel }}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" class="form-control" name="id_level" value="{{ $data->id_level }}" placeholder="id_level" id="id_level"> -->
                        <label for="id_level">Age Group</label>
                        <p class="text-danger" id="agegroup1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_church" id="id_church" required>
                            
                            @foreach($church as $item)
                                <option value="{{ $item->id_church }}" @if($item->id_church == $data->agegroup) selected @endif>{{ $item->namechurch }}</option>
                            @endforeach
                        </select>
                        <label for="id_church">Institution Origin</label>
                        <p class="text-danger" id="namechurch1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm mb-4">
                        <ul class="list-group list-group-flush bg-none">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto pr-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="isusercommission" value="1" type="checkbox" id="isusercommission" @if($data->isusercommission == '1') checked @endif>
                                            <label class="form-check-label" for="isusercommission">
                                                <h6 class="mb-1">Is User Commission </h6>
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_field" id="id_field" required>
                            
                            @foreach($field as $item)
                                <option value="{{ $item->id_field }}" @if($item->id_field == $data->id_field3) selected @endif>{{ $item->namefield }}</option>
                            @endforeach
                        </select>
                        <label for="namefield">Commission Name</label>
                        <p class="text-danger" id="namefield1" style="display: none;">Please fill in this field</p>
                    </div>
                </div>
                <div class="col-12 col-md-4"> 
                    <div class="form-group form-floating  mb-3">
                        <select class="form-control" name="id_termination" id="id_termination" required>
                            
                            @foreach($termination as $item)
                                <option value="{{ $item->id_termination }}" @if($item->id_termination == $data->id_termination) selected @endif>{{ $item->nametermination }}</option>
                            @endforeach
                        </select>
                        <label for="id_termination">Termination Status</label>
                        <p class="text-danger" id="id_termination1" style="display: none;">Please fill in this field</p>
                    </div>                    
                </div>
                
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm mb-4">
                        <ul class="list-group list-group-flush bg-none">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto pr-0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="isactivated" value="1" type="checkbox" id="settingscheck3" @if($data->isactivated == '1') checked @endif>
                                            <label class="form-check-label" for="settingscheck3">
                                                <h6 class="mb-1">Is Activated </h6>
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
                        <button class="btn btn-lg btn-danger w-100 shadow text-white disabled" type="button" onclick="return hapus()" disabled>Delete</button>
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
                if($('#codemember').val().length == 0) {
                    $("#codemember1").css("display", "");
                } else if($('#id_level').val().length == 0) {
                    $("#id_level1").css("display", "");
                } else if($('#id_church').val().length == 0) {
                    $("#id_church1").css("display", "");
                }else if($('#isusercommission').val().length == 0) {
                    $("#isusercommission1").css("display", "");
                }else if($('#id_field').val().length == 0) {
                    $("#id_field1").css("display", "");
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