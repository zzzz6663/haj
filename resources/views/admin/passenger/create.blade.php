@extends('main.manager')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">تعریف کاربر جدید
                <i class="ti ti-user-plus"></i>
            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("user.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="title">عنوان فروشگاه
                                </label>
                                <input name="title" class="form-control" id="title" placeholder="مثلا صنایع دستی" type="text" value="{{ old("title") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name">نام
                                </label>
                                <input name="name" class="form-control" id="name" placeholder="مثلا ناصر" type="text" value="{{ old("name") }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="family">نام خانوادگی
                                </label>
                                <input name="family" class="form-control" id="family" placeholder="مثلا جعفری" type="text" value="{{ old("family") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="admin_name">نام مدیر مجموعه
                                </label>
                                <input name="admin_name" class="form-control" id="admin_name" placeholder="مثلا حمید رضایی" type="text" value="{{ old("admin_name") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mobile">همراه</label>
                                <input name="mobile" class="form-control" id="mobile" placeholder="مثلا 09373699317" type="text" value="{{ old("mobile") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mobile">استان</label>
                                <select class=" form-control " name="province_id" id="province_id" required>
                                    <option value="">استان </option>
                                    @foreach (App\Models\Province::whereActive(1)->get() as $province)
                                    <option {{old('province_id')==$province->id?'selected':''}} value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="mobile">شهر</label>
                                <select class=" form-control " name="city_id" id="city_id" required>
                                    <option value="">شهر </option>
                                    @foreach (App\Models\City::where('province_id', old('province_id'))->whereActive(1)->get() as $city)
                                    <option {{ old('city_id') == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <h4>
                                    نوع مجموعه
                                </h4>
                                <ul class="custom-control-group">
                                    <li>
                                        <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                            <input type="radio" class="custom-control-input" name="job" {{ old("job")=="restaurant"?"checked":"" }} id="restaurant" value="restaurant">
                                            <label class="custom-control-label" for="restaurant"><i class="fas fa-utensils"></i><span>
                                                رستوران و مراکز تفریحی و پذیرایی

                                            </span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="job" {{ old("job")=="museum"?"checked":"" }} id="museum_id" value="museum">
                                            <label class="custom-control-label" for="museum_id"><i class="fas fa-landmark"></i><span>
                                                موزه ها و مکان های تاریخی
                                            </span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="job" {{ old("job")=="store"?"checked":"" }} id="store_id" value="store">
                                            <label class="custom-control-label" for="store_id"><i class="fas fa-store"></i><span>
                                                فروشگاه های محلی


                                            </span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="job" {{ old("job")=="boom"?"checked":"" }} id="boom_id" value="boom">
                                            <label class="custom-control-label" for="boom_id"><i class="fas fa-hotel"></i></em><span>مراکز  اقامتی</span></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="tell">تلفن </label>
                                <input name="tell" class="form-control" id="tell" type="text" value="{{ old("tell") }}">
                            </div>



                            <div class="mb-3">
                                <label class="form-label" for="price">قیمت مجموعه</label>
                                <input name="price" class="form-control number_format" id="price" type="number" value="{{ old("price") }}">
                                <span></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="visiting_hours">ساعت کاری</label>
                                <input name="visiting_hours" class="form-control" id="visiting_hours" type="text" value="{{ old("visiting_hours") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="confirm">تایید حساب</label>
                                <select class="form-select" id="confirm" name="confirm">
                                    <option value="">انتخاب کنید </option>
                                    <option {{ old("confirm")=="1" ?"selected":"" }} value="1">فعال</option>
                                    <option {{ old("confirm")=="0" ?"selected":"" }} value="0">غیر فعال</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="avatar">تصویر پروفایل </label>
                                <input name="avatar" class="form-control" id="avatar" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h4>
                                    موقعیت مجموعه
                                </h4>
                                <div id="map" style="height:300px"></div>
                                <input name="latitude" class="form-control" id="latitude" hidden type="text" value="{{ old("latitude") }}">
                                <input name="longitude" class="form-control" id="longitude" hidden type="text" value="{{ old("longitude") }}">
                                <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
                                <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>

                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="welfare">امکانات مجموعه</label>
                                <textarea class="form-control no-resize" name="welfare" id="welfare">{{ old("welfare") }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address"> آدرس</label>
                                <textarea class="form-control no-resize" name="address" id="address">{{ old("address") }}</textarea>
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="history"> تاریخچه</label>
                                <textarea class="form-control no-resize" name="history" id="history">{{ old("history") }}</textarea>
                            </div>


                        </div>
                    </div>



                    {{-- <div class="mb-3">
                        <label class="form-label" for="region_id">منطقه</label>
                        <select class="form-select" id="region_id" name="region_id">
                            <option value="">انتخاب کنید </option>
                            @foreach (App\Models\Region::withoutTrashed()->get() as $region )
                            <option {{ old("region_id")==$region->id?"selected":"" }} value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                    </select>
            </div> --}}

            <div class="mb-3">
                <a href="{{ route("user.index") }}" class="btn btn-warning">
                    برگشت
                    <i class="fas fa-long-arrow-alt-left"></i>
                    <i class="ti ti-arrow-narrow-left"></i>
                </a>
                <button class="btn btn-success"> ذخیره
                    <i class="ti ti-plus"></i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



@php
$lat= 29.490232;
$lon=60.872739;
@endphp


<script type="text/javascript">
    var myMap = null
    var ch = null
    ch = [ {{ $lat }}, {{ $lon }}]

    myMap = new L.Map('map', {
        key: 'web.RGcOLl7H7iw24EcC3dFhkr3QkcbvP0eA6JwqI3SD'
        , maptype: 'dreamy'
        , poi: true
        , traffic: false
        , center: ch
        , zoom: 12
    , });
    // L.marker([35.7340453, 51.5374258]).addTo(myMap);

    var marker;
    var array = []
    //   var old = new L.marker(ch).addTo(myMap);
    //  array.push(old);
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




        var newMarker = new L.marker(e.latlng).addTo(myMap);
        array.push(newMarker);

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

@endsection
