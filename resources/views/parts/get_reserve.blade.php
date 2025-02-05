<h5 class="title mb-3">لطفا نوع اتاق خود را انتخاب کنید </h5>



<div class="row">
    <div class="col-12">
        <div class="nk-stepper-step active">




            <ul class="row g-3">
                <li class="col-6">
                    <div class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                        <input type="radio" class="custom-control-input" name="type" id="single"
                            {{old("type",$reserve->type)=="single"?"checked":""}}
                        value="single">
                        <label class="custom-control-label" for="single">
                            <span class="d-flex flex-column ش‌لایت - داشبورد اپلیکیشtext-center">
                                <span class="icon-wrap xl text-primary">
                                    <i class="fas fa-crown f_s"></i>

                                </span>
                                <h4 class="">اتاق vip </h4>
                                <p>
                                    توضیحات اتاق vip
                                </p>

                                {{-- <a href="{{ $img->room_img() }}" data-lightbox="gallery-1" class="">
                                </a> --}}
                            </span>
                        </label>
                    </div>
                </li>
                <li class="col-6">
                    <div class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                        <input type="radio" class="custom-control-input" name="type" id="together"
                            {{old("type",$reserve->type)=="together"?"checked":""}}
                        value="together">
                        <label class="custom-control-label" for="together">
                            <span class="d-flex flex-column text-center">
                                <span class="icon-wrap xl text-primary">
                                    <i class="fas fa-users f_s"></i>
                                </span>
                                <h4 class="">اسکان حسینه ای </h4>
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
            <div id="single_section" style="display: {{old("type",$reserve->type)=="single"?"":"none"}}">
                <div class="row  mt-4 mb-6">
                    <div class="col-lg-12">
                        <h6 class="mb-3">لطفا اتاق خود را انتخاب کنید
                        </h6>
                        <p class="alert alert-danger mb-2">
                            تعداد افراد گروه شما
                            {{$reserve->pepole}}
                            نفر میباشد .
                            در نظر داشته باشید
                            که مجموع ظرفیت اتاق یا اتاق  های انتخاب شده
                           توسط شما باید بیشتر از افراد گروه باشد
                        </p>
                    </div>
                    @if (!$reserve->plan)
                    <div class="filter-btns">
                        <span class="btn btn-info active" data-filter="*">همه</span>
                        @foreach ($single_units as $unit )
                        <span class="btn btn-info" data-filter=".single{{$unit->id}}">{{$unit->name}}</span>
                        @endforeach

                        <span class="btn btn-danger" data-filter=".single_fill">پر</span>
                        <span class="btn btn-success" data-filter=".single_empty">خالی</span>
                    </div>
                    @endif
                    <br>
                    <br>
                    <div class="grid1">
                        @foreach ($single_units->shuffle() as $unit )
                        <div class="row">
                            @foreach ($unit->rooms()->whereActive(1)->whereType("single")->get()
                            as $room)
                            @php
                            if($reserve->plan && !in_array($room->id,$ids)){
                                continue;

                            }
                            if(!$reserve->plan&& $room->isRoomInCampaign($reserve->start,$reserve->end) ){
                                continue;
                            }
                            $remain=$room->remain_single($start,$end);
                            @endphp
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-3 grid-item1 {{$remain?"
                                single_empty":"single_fill"}} single{{$room->unit->id}}">
                                <div class="par_room">
                                    <div class="product-gallery">
                                        <div class="slider-init" id="sliderFor{{$room->id}}"
                                            data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                            @foreach ($room->images as $img)
                                            <div class="slider-item rounded">
                                                <img src="{{ $img->room_img() }}" class="rounded w-100" alt="" />
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- .slider-init -->
                                        <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor{{$room->id}}", "centerMode":true, "focusOnSelect": true,  "autoplay": true, "autoplaySpeed": 1000,
                                           "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                                            }'>
                                            @foreach ($room->images as $img)
                                            <div class="slider-item">
                                                <div class="thumb">
                                                    <img src="{{ $img->room_img() }}" class="rounded" alt="" />
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- .slider-nav -->
                                    </div>
                                    <h6 class="d-flex">
                                        <div>
                                            {{$room->name}}
                                        </div>
                                        <div class="cal_par">
                                            <button type="button" class="btn btn-primary get_calander"
                                                data-id="{{$room->id}}" data-bs-toggle="modal"
                                                data-bs-target="#modalLarge{{$room->id}}">روزهای
                                                خالی</button>
                                            <!-- Modal Large -->
                                            <div class="modal fade" tabindex="-1" id="modalLarge{{$room->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">مشاهده وضعیت روز ها</h5>
                                                            <a href="#" class="close" data-bs-dismiss="modal"
                                                                aria-label="بستن">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="con_cal">

                                                            </div>
                                                            {{-- @include('admin.room.calandar') --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </h6>
                                    <p>
                                        نوع رزرو:

                                        <span class="text text-warning">
                                            {{__("room_type.".$room->type)}}
                                        </span>

                                    </p>
                                    <p>
                                        قیمت:
                                        <span class="text text-success">
                                            (هر شب )
                                            {{number_format($room->price)}}
                                            دینار
                                            معادل
                                            ( {{number_format($room->price*$dinar_price)}}
                                            تومان)
                                        </span>

                                    </p>
                                    <p>{{$room->info}}</p>
                                    <ul class="alert alert-success">
                                        <li>
                                            امکانات:
                                            {{implode(" , ", $room->options()->pluck('name')->toArray())}}
                                        </li>
                                        <li>
                                            مجموع ظرفیت:
                                            {{$room->capacity}}
                                            نفر
                                        </li>
                                        <li>
                                            ظرفیت تخت:
                                            {{$room->ca_vip}}
                                            نفر
                                        </li>

                                        <li>
                                            ظرفیت کف خواب:
                                            {{$room->ca_normal}}
                                            نفر
                                        </li>
                                        <li>
                                            واقع در طبقه:
                                            {{$room->floor}}
                                        </li>
                                    </ul>
                                    @if($remain)
                                    <div
                                        class="custom-control w-100 custom-control-sm custom-checkbox custom-control-pro ">
                                        <input type="checkbox" data-price="{{$room->price*$dinar_price}}"
                                            value="{{$room->id}}"
                                            {{in_array($room->id,$reserve->rooms()->pluck("id")->toArray())?"checked":""
                                        }}
                                        class="custom-control-input check_room" name="single[]"
                                        id="btnCheckControl{{$room->id}}">
                                        <label class="custom-control-label w-100  res_btn"
                                            for="btnCheckControl{{$room->id}}">
                                            <div class="res_btn">
                                                رزرو
                                            </div>
                                        </label>
                                    </div>
                                    @else
                                    <p class="alert alert-danger">
                                        {{--  از تاریخ
                                        {{Jdate($start)->format('d-m-Y')}} -
                                        تا تاریخ
                                        {{Jdate($end)->format('d-m-Y')}} -
                                        ظرفیت خالی وجود ندارد
                                        <br>  --}}
                                        این اتاق در تاریخ
                                        {{$room->nearest_day_single()}}
                                        خالی می شود
                                    </p>
                                    @endif

                                </div>
                            </div>

                            @endforeach
                        </div>
                        @endforeach

                    </div>


                </div>
            </div>



            <div id="together_section" style="display: {{old("type",$reserve->type)=="together"?"":"none"}}"
                data-price="{{$price_together*$dinar_price}}">
                <h6>

                </h6>
                <div class="row  mt-4 mb-6">
                    <div class="col-lg-12">
                        <h6 class="mb-3">اتاق برای آقایان
                        </h6>
                    </div>
                    @if(!$reserve->male)
                    <p class="alert alert-warning">
                        در این تاریخ فعلا اتاقی برای اقایان وجود ندارد
                    </p>
                    @else
                    @if (!$reserve->plan)

                    <div class="filter-btns">
                        <span class="btn btn-info active" data-filter="*">همه</span>
                        @foreach ($together_units as $unit )
                        <span class="btn btn-info" data-filter=".male_together{{$unit->id}}">{{$unit->name}}</span>
                        @endforeach
                        <span class="btn btn-danger" data-filter=".male_together_fill">پر</span>
                        <span class="btn btn-success" data-filter=".male_together_empty">خالی</span>
                    </div>
                    @endif

                    <br>
                    <br>
                    <div class="grid1">
                        @foreach ($together_units->shuffle() as $unit )
                        @foreach ($unit->rooms()->whereActive(1)->whereType("together")->whereGender("male")->get()
                        as $room_together)
                        @php
                        if($reserve->plan && !in_array($room_together->id,$ids)){
                            continue;
                        }

                        if(!$reserve->plan&& $room_together->isRoomInCampaign($reserve->start,$reserve->end) ){
                            continue;
                        }
                        $remain_male=$room_together->remain_together($start,$end);
                        @endphp
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-3 grid-item1 {{$remain_male?"
                            male_together_empty":"male_together_fill"}} male_together{{$room_together->unit->id}}">
                            <div class="par_room">
                                <div class="product-gallery">
                                    <div class="slider-init" id="sliderFor{{$room_together->id}}"
                                        data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                        @foreach ($room_together->images as $img)
                                        <div class="slider-item rounded">
                                            <img src="{{ $img->room_img() }}" class="rounded w-100" alt="" />
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- .slider-init -->
                                    <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor{{$room_together->id}}", "centerMode":true, "focusOnSelect": true,  "autoplay": true, "autoplaySpeed": 1000,
                                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                                            }'>
                                        @foreach ($room_together->images as $img)
                                        <div class="slider-item">
                                            <div class="thumb">
                                                <img src="{{ $img->room_img() }}" class="rounded" alt="" />
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- .slider-nav -->
                                </div>
                                <h6 class="d-flex">
                                    <div>
                                        {{$room_together->name}}
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalLarge{{$room_together->id}}">روزهای خالی</button>
                                        <!-- Modal Large -->
                                        <div class="modal fade" tabindex="-1" id="modalLarge{{$room_together->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">مشاهده وضعیت روز ها</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal"
                                                            aria-label="بستن">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('admin.room.calandar',['room'=>$room_together])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </h6>
                                <p>
                                    نوع رزرو:

                                    <span class="text text-warning">
                                        {{__("room_type.".$room_together->type)}}
                                    </span>

                                </p>
                                <p>
                                    قیمت:
                                    <span class="text text-success">
                                        (هر شب )
                                        {{number_format($room_together->price)}}
                                        دینار
                                        معادل
                                        ( {{number_format($room_together->price*$dinar_price)}}
                                        تومان)
                                    </span>

                                </p>
                                <p>{{$room_together->info}}</p>
                                <ul class="alert alert-success">
                                    <li>
                                        امکانات:
                                        {{implode(" , ", $room_together->options()->pluck('name')->toArray())}}
                                    </li>
                                    <li>
                                        مجموع ظرفیت:
                                        {{$room_together->capacity}}
                                        نفر
                                    </li>
                                    <li>
                                        ظرفیت تخت:
                                        {{$room_together->ca_vip}}
                                        نفر
                                    </li>

                                    <li>
                                        ظرفیت کف خواب:
                                        {{$room_together->ca_normal}}
                                        نفر
                                    </li>
                                    <li>
                                        واقع در طبقه:
                                        {{$room_together->floor}}
                                    </li>
                                </ul>
                                <p class="alert alert-warning">
                                    ظرفیت باقیمانده در تاریخ
                                    <span class="text text-success">
                                        {{jdate($start)->format('d-m-Y')}}
                                    </span>-
                                    <span class="text text-warning">
                                        {{jdate($end)->format('d-m-Y')}}
                                    </span>
                                    {{$room_together->remain_together($start,$end)}}
                                    نفر
                                </p>
                                @php
                                $remain_male = $room_together->remain_together($start, $end);
                                @endphp

                                @if($remain_male && $remain_male>=$reserve->male)
                                <div class="custom-control w-100 custom-control-sm custom-checkbox custom-control-pro ">
                                    <input type="radio" data-price="{{$price_together*$dinar_price}}"
                                        {{in_array($room_together->id,$reserve->rooms()->pluck("id")->toArray())?"checked":""
                                    }}
                                    class="custom-control-input check_room" name="together_male[]"
                                    value="{{$room_together->id}}" id="btnCheckControl{{$room_together->id}}">
                                    <label class="custom-control-label w-100   "
                                        for="btnCheckControl{{$room_together->id}}">
                                        <div class="res_btn">
                                            رزرو
                                        </div>
                                    </label>
                                </div>
                                @else
                                <p class="alert alert-danger">
                                    از تاریخ
                                    {{Jdate($start)->format('d-m-Y')}} -
                                    تا تاریخ
                                    {{Jdate($end)->format('d-m-Y')}} -
                                    ظرفیت خالی وجود ندارد
                                    <br>
                                    {{--  این اتاق در تاریخ
                                    {{$room_together->nearest_day_together()}}
                                    خالی می شود  --}}
                                </p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                    @endif

                </div>




                <br>

                <div class="row  mt-4 mb-6">
                    <div class="col-lg-12">
                        <h6 class="mb-3">
                            اتاق برای خانم ها
                        </h6>
                    </div>
                    @if(!$reserve->female)
                    <p class="alert alert-warning">
                        در این تاریخ فعلا اتاقی برای خانم ها وجود ندارد
                    </p>
                    @else
                    @if (!$reserve->plan)

                    <div class="filter-btns">
                        <span class="btn btn-info active" data-filter="*">همه</span>
                        @foreach ($together_units as $unit )
                        <span class="btn btn-info" data-filter=".female_together{{$unit->id}}">{{$unit->name}}</span>
                        @endforeach
                        <span class="btn btn-danger" data-filter=".female_together_fill">پر</span>
                        <span class="btn btn-success" data-filter=".female_together_empty">خالی</span>
                    </div>
                    @endif
                    <br>
                    <br>
                    <div class="grid1">
                        @foreach ($together_units as $unit )
                        @foreach ($unit->rooms()->whereActive(1)->whereType("together")->whereGender("female")->get()
                        as $room_together_female)

                            @php
                            if($reserve->plan && !in_array($room_together_female->id,$ids)){
                                continue;
                            }
                            if(!$reserve->plan&& $room_together_female->isRoomInCampaign($reserve->start,$reserve->end) ){
                                continue;
                            }
                        $remain_female=$room_together_female->remain_together($start,$end);
                        @endphp
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-3  grid-item1 {{$remain_female?"female_together_empty":"female_together_fill"}} female_together{{$room_together_female->unit->id}}">
                            <div class="par_room">
                                <div class="product-gallery">
                                    <div class="slider-init" id="sliderFor{{$room_together_female->id}}"
                                        data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                        @foreach ($room_together_female->images as $img)
                                        <div class="slider-item rounded">
                                            <img src="{{ $img->room_img() }}" class="rounded w-100" alt="" />
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- .slider-init -->
                                    <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor{{$room_together_female->id}}", "centerMode":true, "focusOnSelect": true,  "autoplay": true, "autoplaySpeed": 1000,
                                            "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                                        }'>
                                        @foreach ($room_together_female->images as $img)
                                        <div class="slider-item">
                                            <div class="thumb">
                                                <img src="{{ $img->room_img() }}" class="rounded" alt="" />
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- .slider-nav -->
                                </div>
                                <h6 class="d-flex">
                                    <div>
                                        {{$room_together_female->name}}
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalLarge{{$room_together_female->id}}">روزهای خالی</button>
                                        <!-- Modal Large -->
                                        <div class="modal fade" tabindex="-1" id="modalLarge{{$room_together_female->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">مشاهده وضعیت روز ها</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal"
                                                            aria-label="بستن">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('admin.room.calandar',['room'=>$room_together_female])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </h6>
                                <p>
                                    نوع رزرو:
                                    <span class="text text-warning">
                                        {{__("room_type.".$room_together_female->type)}}
                                    </span>
                                </p>
                                <p>
                                    قیمت:
                                    <span class="text text-success">
                                        (هر شب )
                                        {{number_format($room_together_female->price)}}
                                        دینار
                                        معادل
                                        ( {{number_format($room_together_female->price*$dinar_price)}}
                                        تومان)
                                    </span>

                                </p>
                                <p>{{$room_together_female->info}}</p>
                                <ul class="alert alert-success">
                                    <li>
                                        امکانات:
                                        {{implode(" , ", $room_together_female->options()->pluck('name')->toArray())}}
                                    </li>
                                    <li>
                                        مجموع ظرفیت:
                                        {{$room_together_female->capacity}}
                                        نفر
                                    </li>
                                    <li>
                                        ظرفیت تخت:
                                        {{$room_together_female->ca_vip}}
                                        نفر
                                    </li>

                                    <li>
                                        ظرفیت کف خواب:
                                        {{$room_together_female->ca_normal}}
                                        نفر
                                    </li>
                                    <li>
                                        واقع در طبقه:
                                        {{$room_together_female->floor}}
                                    </li>
                                </ul>


                                <p class="alert alert-warning">
                                    ظرفیت باقیمانده در تاریخ
                                    <span class="text text-success">
                                        {{jdate($start)->format('d-m-Y')}}
                                    </span>-
                                    <span class="text text-warning">
                                        {{jdate($end)->format('d-m-Y')}}
                                    </span>
                                    {{$room_together_female->remain_together($start,$end)}}
                                    نفر
                                </p>
                                @php
                                $remain_female = $room_together_female->remain_together($start, $end);
                                @endphp
                                @if($room_together_female->remain_together($start,$end) && $remain_female>=$reserve->female)
                                <div class="custom-control w-100 custom-control-sm custom-checkbox custom-control-pro ">
                                    <input type="radio" data-price="{{$price_together*$dinar_price}}"
                                        {{in_array($room_together_female->id,$reserve->rooms()->pluck("id")->toArray())?"checked":""
                                    }}
                                    class="custom-control-input check_room" name="together_female[]"
                                    value="{{$room_together_female->id}}" id="btnCheckControl{{$room_together_female->id}}">
                                    <label class="custom-control-label w-100   "
                                        for="btnCheckControl{{$room_together_female->id}}">
                                        <div class="res_btn">
                                            رزرو
                                        </div>
                                    </label>
                                </div>
                                @else
                                <p class="alert alert-danger">
                                    از تاریخ
                                    {{Jdate($start)->format('d-m-Y')}} -
                                    تا تاریخ
                                    {{Jdate($end)->format('d-m-Y')}} -
                                    ظرفیت خالی وجود ندارد
                                    <br>
                                    {{--  این اتاق در تاریخ
                                    {{$room_together_female->nearest_day_together()}}
                                    خالی می شود  --}}
                                </p>
                                @endif
                                {{-- <div
                                    class="custom-control w-100 custom-control-sm custom-checkbox custom-control-pro ">
                                    <input type="radio" data-price="{{$price_together*$dinar_price}}"
                                        class="custom-control-input check_room" name="together_female[]"
                                        {{in_array($room_together_female->id,$reserve->rooms()->pluck("id")->toArray())?"checked":""
                                    }}
                                    value="{{$room_together_female->id}}" id="btnCheckControl{{$room_together_female->id}}">
                                    <label class="custom-control-label w-100  "
                                        for="btnCheckControl{{$room_together_female->id}}">
                                        <div class="res_btn">
                                            رزرو
                                        </div>
                                    </label>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>

                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
