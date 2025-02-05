@php

$settings=
App\Models\Setting::whereIn("name",["bg_site","site_name","site_info","deactive_warning","turn_off_treserve","call1","call2","address1"])->get();
foreach ($settings as $setting) {
${$setting->name} = $setting->val;
}
$lan="32.6194323";
$lat="44.0339704";
@endphpe

@extends('main.mainsite')

@section('site')


<header class="header has-header-main-s1 bg-grad-a mb-5 mb-sm-6 mb-md-7" id="home">
    @include('site.header')
    <!-- .header-main-->
    <div class="header-content my-auto py-5 is-dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-7 col-md-10">
                    <div class="header-caption">
                        <h1 class="header-title text text-white">
                            {!!$site_name!!}

                        </h1>
                        <div class="header-text">
                            <p>
                                {!!$site_info!!}
                            </p>
                        </div>
                        <ul class="header-action btns-inline">
                            <li>

                                @if($turn_off_treserve)
                                <div class="d-inline-block mt-15">
                                    <a href="{{route("login")}}" class="btn btn-primary btn-lg"><span>رزرو </span></a>
                                </div> 
                                @else
                                <p
                                    class="alert alert-danger button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white">
                                    {{$deactive_warning}}
                                </p>
                                @endif


                            </li>
                            <li>
                                {{-- <a href="#plans" class="btn btn-danger btn-lg"><span>طرحهای مسافرتی مجموعه
                                    </span></a> --}}
                            </li>
                        </ul>
                    </div>
                    <!-- .header-caption -->
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .header-content -->
    <div class="header-image mb-n5 mb-sm-n6 mb-md-n7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card overflow-hidden p-2 bg-light">
                        <img src="/media/bg//{{$bg_site}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="section section-facts  hass-ovm" id="facts">
    <div class="container">
        <div class="row g-gs align-items-center">
            <div class="col-lg-3">
                <div class="text-block  pe-xl-5">
                    <h2 class="title text-dark">زیارتی ارزان و با کیفیت </h2>
                    <p class="lead">
                        مجموعه های شهید همت
                        با پشتیبانی 24 ساعته
                        سفری خاطر انگیز را برای شما رقم خواهد زد


                    </p>
                </div>
                <!-- .text-block -->
            </div>
            <!-- .col -->
            <div class="col-lg-9">
                <div class="row text-center g-gs">
                    <div class="col-sm-3 col-6">
                        <div class="card card-full round-xl">
                            <div class="card-inner card-inner-md">
                                <div class="h1 fw-bold text-purple">
                                    {{App\Models\Reserve::whereIn("status",["confirmed"])->count()}}</div>
                                <div class="h6 text-base">

                                    رزرو های موفق
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col -->
                    <div class="col-sm-3 col-6">
                        <div class="card card-full round-xl">
                            <div class="card-inner card-inner-md">
                                <div class="h1 fw-bold text-success">
                                    {{App\Models\Reserve::whereIn("status",["confirmed"])->sum("pepole")}}</div>
                                <div class="h6 text-base">
                                    <br>
                                    زائر
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col -->
                    <div class="col-sm-3">
                        <div class="card card-full round-xl">
                            <div class="card-inner card-inner-md">
                                <div class="h1 fw-bold text-pink">{{App\Models\Unit::count()}}</div>
                                <div class="h6 text-base">
                                    مجموعه ها <br>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .col -->
                    <!-- .col -->
                    <div class="col-sm-3">
                        <div class="card card-full round-xl">
                            <div class="card-inner card-inner-md">
                                <div class="h1 fw-bold text-info">{{App\Models\Room::count()}}</div>
                                <div class="h6 text-base">
                                    اتاق ها <br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .col -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
    <!-- <div class="nk-ovm shape-b shape-cover shape-top"></div> -->
    <div class="nk-ovm shape-b shape-cover"></div>
</section>
    @if($plans->count())

<section class="section section-testimonial pb-0  pb-5" id="reviews">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-7 col-md-8 col-10">
                <div class="section-head">
                    <h2 class="title"> طرح های ویژه مجموعه همت </h2>
                </div>
            </div>
            <!-- .col -->
        </div>
        <!-- .row -->

        <div class="row g-gs justify-content-center">
            @foreach ($plans as $plan )

            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="gallery card ">
                    <a class="gallery-image popup-image" href="./images/stock/b.jpg">
                        <img class="w-100 rounded-top" src="{{$plan->image()}}" alt="">
                    </a>
                    <div class="gallery-body card-inner  part_box g-2">
                        <div class="user-card ">
                            <div class="user-info">
                                <span class="lead-text">{{ $plan->name}}</span>
                            </div>
                            <h6>
                                <span class="text text-success">
                                    {{number_format($plan->price)}}
                                    تومان
                                </span>
                            </h6>

                        </div>
                        <p>
                            {!! $plan->info!!}
                        </p>
                        <h5 class="alert alert-success">
                            شروع :
                           {{jdate($plan->start)->format("d-m-Y")}}
                        </h5>

                        <h5 class="alert alert-warning">
                            پایان :
                           {{jdate($plan->end)->format("d-m-Y")}}
                        </h5>
                    </div>

                    <div class="y card-inner align-center justify-between flex-wrap g-2">
                        <a href="{{route("new.reserve",['plan_id'=>$plan->id])}}" class="btn btn-primary" tabindex="0">ثبت نام </a>
                        <a href="{{route("single.plan",$plan->id)}}" class="btn btn-info" tabindex="0">اطلاعات بیشتر </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</section>
@endif

<section class="section section-testimonial pb-0 bg-dark is-dark pb-5" id="reviews">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-7 col-md-8 col-10">
                <div class="section-head">
                    <h2 class="title"> موقعیت ما درنقشه</h2>
                </div>
            </div>
            <!-- .col -->
        </div>
        <!-- .row -->
        <div class="row g-gs justify-content-center">
            <div class="col-lg-12">
                <div class="card card-shadow round-xl">
                    <div class="card-inner card-inner-lg">
                        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
                        <div>

                            <div id="map" style="width: 100%; height: 300px; background: #eee; border: 2px solid #aaa;">
                            </div>

                            <script>
                                var map = L.map('map').setView([{{ $lan }}, {{ $lat }}], 16);

                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);

                            L.marker([{{ $lan }}, {{ $lat }}]).addTo(map)
                                .bindPopup("مجموعه های شهید همت")
                                .openPopup();
                            </script>

                        </div>
                    </div>
                    <!-- .testimonial-block -->
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
</section>


@endsection
