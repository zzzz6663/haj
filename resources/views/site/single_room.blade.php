@extends('main.site')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>


    <section class="pt-40">
        <div class="container">
            <div class="row justify-between items-end">
                <div class="col-auto">
                    <h1 class="text-26 fw-600">{{ $unit->name }}</h1>
                </div>
                <div class="col-auto">
                    <div class="row x-gap-10 y-gap-10">
                        <div class="col-auto">
                            <button class="button px-15 py-10 -blue-1">
                                <i class="icon-share mr-10"></i>
                                Share
                            </button>
                        </div>

                        <div class="col-auto">
                            <button class="button px-15 py-10 -blue-1 bg-light-2">
                                <i class="icon-heart mr-10"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pt-40">
        <div class="container js-pin-container">
            <div class="row y-gap-30">
                <div class="col-lg-12">
                    <div class="cruiseSlider">
                        <div class="cruiseSlider-slider relative">
                            <div class="d-flex js-cruise-slider">
                                <div class="swiper-wrapper">
                                    @foreach ($unit->images as $img)
                                        <div class="swiper-slide">
                                            <img src="{{ $img->unit_img() }}" alt="image" class="rounded-4">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="cruiseSlider__nav -prev js-prev">
                                    <button class="button -outline-white size-50 flex-center text-white rounded-full">
                                        <i class="icon-arrow-left"></i>
                                    </button>
                                </div>
                                <div class="cruiseSlider__nav -next js-next">
                                    <button class="button -outline-white size-50 flex-center text-white rounded-full">
                                        <i class="icon-arrow-right"></i>
                                    </button>
                                </div>
                                <div class="absolutt Cruise te h-full col-12 px-20 py-20 d-flex justify-end items-end">
                                    @foreach ($unit->images as $img)
                                        <a href="{{ $img->unit_img() }}" class="js-gallery" data-gallery="gallery2"></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="cruiseSlider-slides row x-gap-10 y-gap-10 pt-10 js-cruise-slides">
                            @foreach ($unit->images as $img)
                                <div class="col-auto w-max-120">
                                    <div class="cruiseSlider-slides__item h-full rounded-4  js-item">
                                        <img src="{{ $img->unit_img() }}" alt="image" class="h-full object-cover">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row x-gap-80 y-gap-40 pt-40">
                        <div class="d-flex x-gap-5 items-center pt-5">
                            <p>
                                {{ $unit->info }}
                            </p>
                        </div>
                    </div>
                    <div class="row  pt-40">

                        <div class="col-lg-3">
                            <div class="">
                                <h5 class="">اطلاعات مجموعه</h5>

                                <ul class="list-disc text-15 mt-10">
                                    <li>
                                       <h6>
                                        ظرفیت مجموعه:
                                        {{$unit->capacity}}
                                       </h6>
                                    </li>
                                    <li>
                                        <h6>
                                         ظرفیت مجموعه:
                                         {{$unit->capacity}}
                                        </h6>
                                     </li>
                                     <li>
                                        <h6>
                                         تعداد اتاق ها:
                                         {{$unit->room}}
                                        </h6>
                                     </li>
                                     <li>
                                        <h6>
                                         تعداد طبقات:
                                         {{$unit->floor}}
                                        </h6>
                                     </li>
                                     <li>
                                        <h6>
                                         تلفن تماس :
                                        0999999999999
                                        </h6>
                                     </li>

                                </ul>
                            </div>

                        </div>

                        <div class="col-lg-9">
                            <h5>
                                موقعیت ما درنقشه
                            </h5>
                            <br>
                            <br>

                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                                integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
                            <div>

                                <div id="map"
                                    style="width: 100%; height: 300px; background: #eee; border: 2px solid #aaa;">
                                </div>

                                <script>
                                    var map = L.map('map').setView([{{ $unit->lan }}, {{ $unit->lat }}], 12);

                                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                    }).addTo(map);

                                    L.marker([{{ $unit->lan }}, {{ $unit->lat }}]).addTo(map)
                                        .bindPopup("{{ $unit->name }}")
                                        .openPopup();
                                </script>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
