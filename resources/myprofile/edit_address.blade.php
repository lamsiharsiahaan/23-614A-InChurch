@extends('layouts.app')
@section('head')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAZQQ-dV3AEVcchaVCGBJ1-osy2hta5NUU&sensor=false" type="text/javascript"></script>
    <style type="text/css">    
      #map {
        margin: 10px;
        width: 100%;
        height: 300px;  
        padding: 10px;
      }
    </style>
    
<script type="text/javascript">
//     function initialize() {
//   var propertiPeta = {
//     center:new google.maps.LatLng(-8.5830695,116.3202515),
//     zoom:9,
//     mapTypeId:google.maps.MapTypeId.ROADMAP
//   };
  
//   var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
//   // membuat Marker
//   var marker=new google.maps.Marker({
//       position: new google.maps.LatLng(-8.5830695,116.3202515),
//       map: peta
//   });
// }
// // event jendela di-load  
// google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection
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
                    <h5>Address</h5>
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
                    <h6>Address</h6>
                </div>
            </div>

            <form action="{{ url('myprofile/address') }}" method="post">
                
            @csrf

            <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h6 class="my-1">Location</h6>
                    </div>
                    
                    <div class="card-body">
                        <div id="map"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="mb-1">N/A minutes</h6>
                                <p class="text-muted small">N/A kilometers away</p>
                            </div>
                            <div class="col-auto align-self-center">
                                <button class="btn btn-sm btn-default p-0 shadow" type="button" onclick="return save()">
                                    <!--
                                     <a href="{{ url('https://www.google.com/maps/search/?api=1&query='.$data->latitude.','.$data->longitude) }}" class="btn btn-default btn-sm shadow-sm" target="_blank">Google Map</a>
                                    -->
                                    <a onclick="opengmap();" class="btn btn-default btn-sm shadow-sm" target="_blank">Google Map</a>
                                   <!--
                                   <button class="btn btn-lg btn-default w-100 shadow" type="button" onclick="return save()">Save</button>
                                   -->
                                </button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group form-floating  mb-3">
                                    <input required readonly type="text" class="form-control" name="addressgoogle" value="{{ $data->addressgoogle }}" placeholder="Addressgoogle" id="addressgoogle">
                                    <label for="addressgoogle">Google Address</label>
                                    <p class="text-danger" id="addressgoogle-empty" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input required readonly type="text" class="form-control" name="latitude" value="{{ $data->latitude }}" placeholder="Latitute" id="latitude">
                                    <label for="latitude">Google Latititude</label>
                                    <p class="text-danger" id="latitude-empty" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input required readonly type="text" class="form-control" name="longitude" value="{{ $data->longitude }}" placeholder="Longitude" id="longitude">
                                    <label for="longitude">Google Longitude</label>
                                    <p class="text-danger" id="longitude-empty" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            
                        </div>
                        
                        <hr>
                        
                        <script>
                            // var msg =  document.getElementById('latitude').value;
                            // var exist = '{{Session::has('alert')}}';
                            // if(true){
                            //    alert(msg);
                            // }
                        </script>
                        
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input required type="text" class="form-control" name="address" value="{{ $data->address }}" placeholder="Email" id="address">
                                    <label for="address">Actual Address</label>
                                    <p class="text-danger" id="address-empty" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <select class="form-control" name="id_country" id="id_country" required>
                            
                                        @foreach($country as $item)
                                            <option value="{{ $item->id_country }}" @if($item->id_country == $data->id_country2) selected @endif>{{ $item->namecountry }}</option>
                                        @endforeach
                                    </select>
                                    <label for="country">Country</label>
                                    <p class="text-danger" id="country1" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <select class="form-control" name="id_province" id="id_province" required>
                            
                                        @foreach($province as $item)
                                            <option value="{{ $item->id_province }}" @if($item->id_province == $data->id_province2) selected @endif>{{ $item->nameprovince }}</option>
                                        @endforeach
                                    </select>
                                    <label for="province">Province</label>
                                    <p class="text-danger" id="province1" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <select class="form-control" name="id_city" id="id_city" required>
                            
                                        @foreach($city as $item)
                                            <option value="{{ $item->id_city }}" @if($item->id_city == $data->idcity2) selected @endif>{{ $item->namecity }}</option>
                                        @endforeach
                                    </select>
                                    <label for="names">City</label>
                                    <p class="text-danger" id="id_city1" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input required type="number" class="form-control" name="zipcode" value="{{ $data->zipcode }}" placeholder="Email" id="zipcode">
                                    <label for="zipcode">Zip Code</label>
                                    <p class="text-danger" id="zipcode-empty" style="display: none;">
                                        Please fill in this field
                                    </p>
                                    <p class="text-danger" id="zipcode-not5digits" style="display: none;">
                                        Zip Code should be 5 digits long
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-9">
                                <div class="form-group form-floating  mb-3">
                                    <input required type="text" class="form-control" name="addressremark" value="{{ $data->addressremark }}" placeholder="Email" id="addressremark">
                                    <label for="addressremark">Remark to Reach Location</label>
                                    <p class="text-danger" id="addressremark-empty" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-3"> 
                                <div class="card shadow-sm mb-4">
                                    <ul class="list-group list-group-flush bg-none">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-auto pr-0">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="isallowasvisitee" value="1" type="checkbox" id="isallowasvisitee" @if($data->isallowasvisitee == '1') checked @endif>
                                                        <label class="form-check-label" for="settingscheck2">
                                                            <h6 class="mb-1">Agree to be Visited?</h6>
                                                        </label>
                                                        <p class="text-danger" id="isallowasvisitee1" style="display: none;">Please fill in this field</p>
                                                    </div>
                                                </div> 
                                            </div>
                                        </li>
                                    </ul> 
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-3">
                                <div class="form-group form-floating  mb-3">
                                    <input required type="text" class="form-control" name="addresscode" value="{{ $data->addresscode }}" placeholder="addresscode" id="addresscode">
                                    <label for="names">Code Address</label>
                                    <p class="text-danger" id="addresscode-empty" style="display: none;">Please fill in this field</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-container container">
                        <div class="row h-100 mb-3">
                            <div class="col-md-6 mb-1">
                                <!-- <button class="btn btn-lg btn-default shadow btn-block" type="submit">Save</button> -->
                                <button class="btn btn-lg btn-default w-100 shadow" type="button" onclick="return save()">Save</button>
                            </div>
                            <div class="col-md-6 mb-1">
                                <button class="btn btn-lg btn-danger w-100 shadow text-white" type="button" onclick="return hapus()" disabled>Delete</button>
                            </div>
                        </div>
                    </div>
            
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
       
            
            </form>
        </div>
        <!-- main page content ends -->
    </main>
    @endsection

    @section('script')
        <script>
            function save(){
                let isInvalid = false;

                const zipcode = $('#zipcode').val();
                if (!zipcode) {
                    $('#zipcode-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#zipcode-empty').css('display', 'none');
                    if (zipcode.length != 5) {
                        $('#zipcode-not5digits').css('display', '');
                        isInvalid = true;
                    } else {
                        $('#zipcode-not5digits').css('display', 'none');
                    }
                }

                if (! $('#addressgoogle').val()) {
                    $('#addressgoogle-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#addressgoogle-empty').css('display', 'none');
                }

                if (! $('#latitude').val()) {
                    $('#latitude-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#latitude-empty').css('display', 'none');
                }

                if (! $('#longitude').val()) {
                    $('#longitude-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#longitude-empty').css('display', 'none');
                }

                if (! $('#address').val()) {
                    $('#address-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#address-empty').css('display', 'none');
                }

                if (! $('#addresscode').val()) {
                    $('#addresscode-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#addresscode-empty').css('display', 'none');
                }

                if (! $('#addressremark').val()) {
                    $('#addressremark-empty').css('display', '');
                    isInvalid = true;
                } else {
                    $('#addressremark-empty').css('display', 'none');
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

            function hapus(){
                $('.toast-save').toast('show');
                $(".btn-save").hide();
                $(".save").hide();
                $(".btn-delete").show();
                $(".delete").show();
            }
            
            function opengmap(){
                //alert ('coook = ' + document.getElementById('latitude').value);
                window.open('https://www.google.com/maps/search/?api=1&query='+document.getElementById('latitude').value+','+document.getElementById('longitude').value, '_blank');
                //url('https://www.google.com/maps/search/');
            }
            
        </script>
        <script type="text/javascript">
        //* Fungsi untuk mendapatkan nilai latitude longitude
        function updateMarkerPosition(latLng) {
            document.getElementById('latitude').value = [latLng.lat()]
            document.getElementById('longitude').value = [latLng.lng()]
        }
               
        let map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        //center: new google.maps.LatLng(-7.781921,110.364678),
        //Default lokasi mengacu ke tabel mst_owner.latitude,mst_owner.longitude
        center: new google.maps.LatLng({{ $data->latitude }},{{ $data->longitude }}),
         mapTypeId: google.maps.MapTypeId.ROADMAP
          });
        
        //posisi awal marker   
        //let latLng = new google.maps.LatLng(-7.781921,110.364678);
        let latLng = new google.maps.LatLng({{ $data->latitude }},{{ $data->longitude }});
         
        /* buat marker yang bisa di drag lalu 
          panggil fungsi updateMarkerPosition(latLng)
         dan letakan posisi terakhir di id=latitude dan id=longitude
         */
        let marker = new google.maps.Marker({
            position : latLng,
            title : 'lokasi',
            map : map,
            draggable : true
          });
           
        updateMarkerPosition(latLng);
        google.maps.event.addListener(marker, 'drag', function() {
         // ketika marker di drag, otomatis nilai latitude dan longitude
         //menyesuaikan dengan posisi marker 
            updateMarkerPosition(marker.getPosition());
          });
        </script>
    @endsection