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
                    <h1 class="text-26 fw-600">{{ $plan->name }}</h1>
                </div>
                <div class="col-auto">
                    <div class="row x-gap-10 y-gap-10">
                        <div class="col-auto">
                            <a href="{{route("new.reserve",['plan_id'=>$plan->id])}}" class="button -outline-blue-1 px-30 h-50 text-blue-1">
                                ثبت نام
                            </a>

                        </div>
{{--
                        <div class="col-auto">
                            <button class="button px-15 py-10 -blue-1 bg-light-2">
                                <i class="icon-heart mr-10"></i>
                                Save
                            </button>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </section>


    <section class="pt-40 mb-10">
        <div class="container js-pin-container">
            <div class="row y-gap-30">
                <div class="col-lg-12">
                    <div class="cruiseSlider">
                        <div class="cruiseSlider-slider relative">
                            <div class="d-flex js-cruise-slider">
                                <div class="swiper-wrapper">
                                    @foreach ($plan->images as $img)
                                        <div class="swiper-slide">
                                            <img src="{{ $img->plan_img() }}" alt="image" class="rounded-4">
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
                                    @foreach ($plan->images as $img)
                                        <a href="{{ $img->plan_img() }}" class="js-gallery" data-gallery="gallery2"></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="cruiseSlider-slides row x-gap-10 y-gap-10 pt-10 js-cruise-slides">
                            @foreach ($plan->images as $img)
                                <div class="col-auto w-max-120">
                                    <div class="cruiseSlider-slides__item h-full rounded-4  js-item">
                                        <img src="{{ $img->plan_img() }}" alt="image" class="h-full object-cover">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row x-gap-80 y-gap-40 pt-40">
                        <div class=" x-gap-5  pt-5">
                            <h4 class="alert alert-success">
                                شروع :
                               {{jdate($plan->start)->format("d-m-Y")}}
                            </h4>

                            <h4 class="alert alert-success">
                                پایان :
                               {{jdate($plan->end)->format("d-m-Y")}}
                            </h4>
                        </div>
                    </div>


                    <div class="row x-gap-80 y-gap-40 pt-40">
                        <div class="d-flex x-gap-5 items-center pt-5">
                            <p>
                                {!!$plan->info !!}
                            </p>
                        </div>
                    </div>

                </div>

                <a href="{{route("new.reserve",['plan_id'=>$plan->id])}}" class="button -outline-blue-1 px-30 h-50 text-blue-1 mb-5">
                    ثبت نام
                </a>
                <br>
                <br>
                <br>
                <br>

            </div>
        </div>
    </section>
@endsection
