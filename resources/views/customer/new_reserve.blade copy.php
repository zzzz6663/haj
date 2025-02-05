@extends('main.manager')
@section('content')
<div id="max_day" data-max="{{$max_day->val}}"></div>
<div id="food_price" data-max="{{$food_price}}"></div>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">لیست رزرو ها</h3>
            <div class="nk-block-des text-soft">
                <p>شما در مجموع

                    رزرو دارید.</p>

            </div>
        </div>
        <!-- .nk-block-head-content -->


        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>
<div class="nk-block">
    <div class="card card-stretch">
        <div class="card-inner">
            <ul>
                <li>
                    مدت زمان سفر شما :
                    <span class="duration_sum"></span>
                    روز
                </li>
                <li>
                    تعداد افراد گروه
                    <span class="pepole_sum"></span>
                    نفر
                </li>
                <li>
                    هزینه غذا
                    <span class="food_sum"></span>
                    نفر
                </li>
                <li>
                    مبلغ
                    <span class="final_sum"></span>
                    تومان
                </li>
            </ul>
            <form class="nk-stepper stepper-init is-alter" autocomplete="off" action="#" id="reserve_form"
                data-url="{{route("new.reserve")}}">
                <div class="nk-stepper-content">
                    <div class="nk-stepper-progress stepper-progress mb-4">
                        <div class="stepper-progress-count mb-2"></div>
                        <div class="progress progress-md">
                            <div class="progress-bar stepper-progress-bar"></div>
                        </div>
                    </div>
                    <div class="nk-stepper-steps stepper-steps">
                        <div class="nk-stepper-step">
                            <h5 class="title mb-3">
                                در ایام زیر به علت افزایش برخی هزینه های مجموعه در اسکان  افزایش قیمت داریم
                            </h5>
                            <div class="row g-3 mb-3">
                                @foreach ($periods as $period)

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6>
                                            {{$period->name}}
                                            مقدار افزایش قیمت({{$period->percent}})%
                                        </h6>
                                        <p>
                                            {{$period->info}}
                                        </p>
                                        <ul>
                                            @foreach ( $period->days as  $day )
                                            <li>
                                               <h6 class="mb-1">
                                                {{$loop->iteration}}-
                                                {{jdate($day->day)->format('%d، %B  %Y')}}
                                               </h6>
                                            </li>
                                            @endforeach

                                        </ul>

                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <h5 class="title mb-3">اطلاعات شخصی</h5>
                            <div class="row g-3 mb-3">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="enter">لطفا تاریخ ورود
                                            را تعیین کنید
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="enter" name="enter"
                                                placeholder=" تاریخ ورود    " required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="exit">لطفا تاریخ
                                            خروج
                                            را تعیین کنید
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="exit" name="exit"
                                                placeholder=" تاریخ     خروج" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="date-range">
                                            مدت زمان سفر
                                        </label>
                                        <div class="form-control-wrap">
                                            <span id="duration"></span>
                                        </div>
                                    </div>
                                </div>

                                <div id="" style="display: ">
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="male">
                                                    تعداد افراد آقا
                                                </label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="male" name="male"
                                                        placeholder=" افراد آقا" required pattern="[0-9]*" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="female">
                                                    تعداد افراد خانم
                                                </label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="female" name="female"
                                                        placeholder=" افراد خانم" required pattern="[0-9]*" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                        </div>
                        <div class="nk-stepper-step">
                            <h5 class="title mb-3">
                                در صورت داشتن همراه

                                لطفا مشخصات همراهان خود را بنویسید



                            </h5>
                            <div id="pepole_names" style="display: none">

                                <ul id="all_memebers">

                                </ul>

                            </div>
                        </div>
                        <div class="nk-stepper-step" id="reserve_parts">
                            <h5 class="title mb-3">لطفا نوع اتاق خود را انتخاب کنید </h5>
                            {{--  <div class="row">
                                <div class="col-12">
                                    <div class="nk-stepper-step active">
                                        <ul class="row g-3">
                                            <li class="col-6">
                                                <div
                                                    class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                    <input type="radio" class="custom-control-input" name="type"
                                                        id="single" required="" value="single">
                                                    <label class="custom-control-label" for="single">
                                                        <span
                                                            class="d-flex flex-column ش‌لایت - داشبورد اپلیکیشtext-center">
                                                            <span class="icon-wrap xl text-primary">
                                                                <i class="fas fa-crown f_s"></i>

                                                            </span>
                                                            <h4 class="">اتاق vip </h4>
                                                            <p>
                                                                توضیحات اتاق vip
                                                            </p>


                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="col-6">
                                                <div
                                                    class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                    <input type="radio" class="custom-control-input" name="type"
                                                        id="together" required="" value="together">
                                                    <label class="custom-control-label" for="together">
                                                        <span class="d-flex flex-column text-center">
                                                            <span class="icon-wrap xl text-primary">
                                                                <i class="fas fa-users f_s"></i>
                                                            </span>
                                                            <h4 class="">اسکان حسینه ایی </h4>
                                                            <p>
                                                                خانم و اقا در طبقات مجزا میباشد
                                                            </p>
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <div id="single_section" style="display: none">
                                            <div class="row  mt-4 mb-6">
                                                <div class="col-lg-12">
                                                    <h6 class="mb-3">لطفا اتاق خود را انتخاب کنید
                                                    </h6>
                                                </div>
                                                @foreach ( App\Models\Room::whereActive("1")->whereType("single")->get()
                                                as $room)
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="par_room">
                                                        <div class="product-gallery">
                                                            <div class="slider-init" id="sliderFor{{$room->id}}"
                                                                data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                                @foreach ($room->images as $img)
                                                                <div class="slider-item rounded">
                                                                    <img src="{{ $img->room_img() }}"
                                                                        class="rounded w-100" alt="" />
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <!-- .slider-init -->
                                                            <div class="slider-init slider-nav" id="sliderNav"
                                                                data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor{{$room->id}}", "centerMode":true, "focusOnSelect": true,  "autoplay": true, "autoplaySpeed": 1000,
                                                            "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                                                        }'>
                                                                @foreach ($room->images as $img)
                                                                <div class="slider-item">
                                                                    <div class="thumb">
                                                                        <img src="{{ $img->room_img() }}"
                                                                            class="rounded" alt="" />
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <!-- .slider-nav -->
                                                        </div>
                                                        <h6>
                                                            {{$room->name}}
                                                        </h6>
                                                        <p>{{$room->info}}</p>
                                                        <div class="device-status-group">
                                                            <div class="device-status-data">
                                                                <em data-color="#798bff" class="icon ni ni-monitor"
                                                                    style="color: rgb(121, 139, 255);"></em>
                                                                <div class="title">نوع رزرو</div>
                                                                <div class="amount">
                                                                    {{__("room_type.".$room->type)}}
                                                                </div>
                                                            </div>

                                                            <div class="device-status-data">
                                                                <em data-color="#7de1f8" class="icon ni ni-tablet"
                                                                    style="color: rgb(125, 225, 248);"></em>
                                                                <div class="title">قیمت </div>
                                                                <div class="amount">
                                                                    (هر شب )
                                                                    {{number_format($room->price)}}
                                                                    دینار
                                                                    معادل
                                                                    ( {{number_format($room->price*$dinar_price)}}
                                                                    تومان)

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="custom-control w-100 custom-control-sm custom-checkbox custom-control-pro ">
                                                            <input type="checkbox"
                                                                data-price="{{$room->price*$dinar_price}}"
                                                                value="{{$room->id}}"
                                                                class="custom-control-input check_room" name="single[]"
                                                                id="btnCheckControl{{$room->id}}">
                                                            <label class="custom-control-label w-100"
                                                                for="btnCheckControl{{$room->id}}">رزرو </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>



                                        <div id="together_section" style="display: none"
                                            data-price="{{$price_together*$dinar_price}}">
                                            <div class="row  mt-4 mb-6">
                                                <div class="col-lg-12">
                                                    <h6 class="mb-3">اتاق توسط سیستم انتخاب میگردد
                                                    </h6>
                                                </div>
                                                @foreach (
                                                App\Models\Room::whereActive("1")->whereType("together")->get()
                                                as $room_together)
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="par_room">
                                                        <div class="product-gallery">
                                                            <div class="slider-init"
                                                                id="sliderFor{{$room_together->id}}"
                                                                data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                                @foreach ($room_together->images as $img)
                                                                <div class="slider-item rounded">
                                                                    <img src="{{ $img->room_img() }}"
                                                                        class="rounded w-100" alt="" />
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <!-- .slider-init -->
                                                            <div class="slider-init slider-nav" id="sliderNav"
                                                                data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor{{$room_together->id}}", "centerMode":true, "focusOnSelect": true,  "autoplay": true, "autoplaySpeed": 1000,
                                                            "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                                                        }'>
                                                                @foreach ($room_together->images as $img)
                                                                <div class="slider-item">
                                                                    <div class="thumb">
                                                                        <img src="{{ $img->room_img() }}"
                                                                            class="rounded" alt="" />
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <!-- .slider-nav -->
                                                        </div>
                                                        <h6>
                                                            {{$room_together->name}}
                                                        </h6>
                                                        <p>{{$room_together->info}}</p>
                                                        <div class="device-status-group">
                                                            <div class="device-status-data">
                                                                <em data-color="#798bff" class="icon ni ni-monitor"
                                                                    style="color: rgb(121, 139, 255);"></em>
                                                                <div class="title">نوع رزرو</div>
                                                                <div class="amount">
                                                                    {{__("room_type.".$room_together->type)}}
                                                                </div>
                                                            </div>

                                                            <div class="device-status-data">
                                                                <em data-color="#7de1f8" class="icon ni ni-tablet"
                                                                    style="color: rgb(125, 225, 248);"></em>
                                                                <div class="title">قیمت </div>
                                                                <div class="amount">
                                                                    (هر شب )
                                                                    {{number_format($room_together->price)}}
                                                                    دینار
                                                                    معادل
                                                                    (
                                                                    {{number_format($room_together->price*$dinar_price)}}
                                                                    تومان)

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>  --}}
                        </div>
                        <div class="nk-stepper-step">
                            <h5 class="title mb-4">
                                لیست تخفیف ها
                            </h5>
                            <div class="col-lg-12 mt-3">
                                <ul class="">
                                    @foreach ( App\Models\Off::whereActive("1")->get() as $off)
                                    <li class="mb-3">
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio" class="custom-control-input" name="off"
                                                data-p="{{ $off->price}}" id="btnRadio{{$off->id}}"
                                                value="{{$off->id}}">
                                            <label class="custom-control-label off_sec" for="btnRadio{{$off->id}}">
                                                {{ $off->name}}
                                                <p>
                                                    {{ $off->info}} ---({{number_format( $off->price)}}) درصد
                                                </p>
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>

                                <h6>
                                    مدت سفر شما
                                    <span class="duration_sum"></span>
                                    روز میباشد
                                    آیا مایل به دریافت غذادر این مدت هستید؟
                                    <br> <br>
                                    هزینه سه وعده غذا برای هر نفر در شبانه روز
                                    <span class="text text-success" id="food_td">
                                        {{$food_price}}
                                        دینار
                                        معادل
                                        {{number_format($food_price*$dinar_price)}}
                                        تومان
                                    </span>
                                    می باشد
                                </h6>
                                <ul class="">
                                    <li class="mb-3">
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio" class="custom-control-input" name="food"
                                                data-p="{{$food_price*$dinar_price}}" required value="1" id="food1">
                                            <label class="custom-control-label " for="food1">
                                                غذا رو به سفارش اضافه میکنم
                                                <i class="fas fa-utensils"></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio" class="custom-control-input" name="food" data-p="0"
                                                required value="0" id="food2">
                                            <label class="custom-control-label " for="food2">
                                                غذا نمیخوام
                                                <span class="icon-stack">
                                                    {{-- <i class="fas fa-utensils"></i> --}}
                                                    <i class="fas fa-ban overlay"></i>
                                                </span>

                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                 

                    </div>
                    <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                        <li class="step-prev"><button class="btn btn-dim btn-primary" id="back_on">بازگشت</button></li>
                        <li class="step-next"><button class="btn btn-primary" id="go_on">ادامه</button></li>
                        <li class="step-submit"><span class="btn btn-primary" id="send_info">ثبت</button></li>
                    </ul>

                </div>
            </form>







        </div>

    </div>
</div>


@endsection
