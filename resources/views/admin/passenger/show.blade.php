@extends('main.manager')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title"> پروفایل کاربر
                {{$user->name}}
                {{$user->family}}
                <a target="_blank" href="{{$user->avatar()}}">
                    <img class="avatar" style="width:100px" src="{{$user->avatar()}}" alt="">

                </a>

            </h4>


        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">اطلاعات</span>
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            نام :
                        </span>
                        <span class="content h5">
                            {{ $user->name }}
                            {{ $user->family }}
                        </span>
                    </div>
{{--
                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            محل :
                        </span>
                        <span class="content h5">
                            {{ $user->province->name }}
                            -
                            {{ $user->city->name }}
                        </span>
                    </div>  --}}

                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            همراه :
                        </span>
                        <span class="content h5">
                            {{ $user->mobile }}
                        </span>
                    </div>


                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            تلفن :
                        </span>
                        <span class="content h5">
                            {{ $user->tell }}
                        </span>
                    </div>

                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            نوع کسب  :
                        </span>
                        <span class="content h5">
                            {{ __("arr.".$user->job )}}
                        </span>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            تایید :
                        </span>
                        <span class="content h5">
                            <span class="text text-{{ $user->confirm?"success":"danger" }}">
                                <i class="fas fa-{{ $user->confirm?"fa-check":"times-circle" }}"></i>
                            </span>
                        </span>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            تاریخ :
                        </span>
                        <span class="content h5">
                            {{jdate( $user->created_at )->format('Y-m-d') }}
                        </span>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            قیمت مجموعه :
                        </span>
                        <span class="content h5">
                            {{ number_format($user->price) }}
                            تومان
                        </span>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <span class="title h4 ">
                            ساعات کار :
                        </span>
                        <span class="content h5">
                            {{ $user->visiting_hours }}
                        </span>
                    </div>
                    <div class="col-lg-9 mb-3">
                        <span class="title h4 ">
                            امکانات :
                        </span>
                        <span class="content h5">
                            {{ $user->welfare }}
                        </span>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <span class="title h4 ">
                            تارخچه :
                        </span>
                        <span class="content h5">
                            {{ $user->history }}
                        </span>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <span class="title h4 ">
                            ادرس :
                        </span>
                        <span class="content h5">
                            {{ $user->address }}
                        </span>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <h4 class="title h4  ">
                            مکان در نقشه :
                        </h4>
                        <div id="map" style="height:300px"></div>

                        <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
                        <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>




@php
$lat= old("latitude",$user->latitude);
$lon= old("longitude",$user->longitude);
@endphp


<script type="text/javascript">
    var myMap = null
    var ch = null
    ch = [ {{ $lat }}, {{ $lon }}]

    myMap = new L.Map('map', {
        key: 'web.RGcOLl7H7iw24EcC3dFhkr3QkcbvP0eA6JwqI3SD'
        , maptype: 'neshan'
        , poi: true
        , traffic: false
        , center: ch
        , zoom: 12
    , });
    // L.marker([35.7340453, 51.5374258]).addTo(myMap);

    var marker;
    var array = []
    @if(old("latitude",$user->latitude))
    var old = new L.marker(ch).addTo(myMap);
    array.push(old);
    @endif

    myMap.on('click', function(e) {
        for (i = 0; i < array.length; i++) {
            myMap.removeLayer(array[i]);
        }
        if (marker) {
            myMap.removeLayer(marker)
        }
        // myMap._panes.markerPane.remove();

        // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        // L.marker([e.latlng.lat, e.latlng.lat],{   title:''}).addTo(myMap);




       // var newMarker = new L.marker(e.latlng).addTo(myMap);
      //  array.push(newMarker);

        var latitude = document.getElementById("latitude");
        var longitude = document.getElementById("longitude");
        latitude.setAttribute('value', e.latlng.lat);;
        longitude.setAttribute('value', e.latlng.lng);;


    });
    $(document).on('change', '#city_id', function(event) {
        let el = $(this)
        let city_id = el.val()
        let lat = el.find(':selected').data('lat')
        let lon = el.find(':selected').data('lon')
        if (lon) {
            myMap.panTo(new L.LatLng(lat, lon));
        }
    })

</script>
                    </div>

                    <div class="col-lg-12">
                        <a href="{{ route("user.index") }}" class="btn btn-warning"> برگشت
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




</div>
@endsection
