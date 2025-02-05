@extends('main.manager')
@section('content')
<div id="max_day" data-max="{{$max_day->val}}"></div>
<div id="food_price" data-max="{{$food_price}}"></div>
<div id="calandar_ad_day" data-max="{{$calandar_ad_day}}"></div>
@if($plan)
<div id="plan_start" data-start="{{$plan_start}}"></div>
<div id="plan_end" data-end="{{$plan_end}}"></div>
{{--  <div id="plan_end" data-end="{{jdate($plan->end)->format("Y/m/d")}}"></div>  --}}
{{--  <div id="plan_end" data-end="{{jdate($plan->end)->format("Y/m/d")}}"></div>  --}}
@endif
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">
                ثبت نوبت جدید
                @if($plan)
                <span class="text text-success">
                    در طرح
                    {{$plan->name}}
                </span>
                قیمت
                <span class="text text-success">
                    {{number_format($plan->price)}}
                    تومان
                </span>
                @endif
            </h3>

        </div>
        <p class="alert alert-success">
            مرحله اول
        </p>


        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>
<div class="nk-block">
    <div class="card ">
        <div class="card-inner">
            <form class="" autocomplete="off" action="{{route("new.reserve",$reserve->id)}}" id="f1" method="post"
                >
                @csrf
                @method('post')
                <input type="text" hidden value="{{old("plan_id",$reserve->plan_id?$reserve->plan_id:$plan_id)}}" name="plan_id">

                <div class="row">

                    <div class="col-lg-12 mb-1">
                        <div class="">
                            @if(!$plan_id)
                              @if($periods->count())

                            <h5 class="title mb-3">
                                در ایام زیر به علت افزایش برخی هزینه های مجموعه در اسکان افزایش قیمت داریم
                            </h5>
                            <div class="row g-3 mb-3">
                                @foreach ($periods as $period)

                                <div class="col-sm-4">
                                    <div class="form-group border-red">
                                        <h6>
                                            {{$period->name}}
                                            مقدار افزایش قیمت({{$period->percent}})%
                                        </h6>
                                        <p>
                                            {{$period->info}}
                                        </p>
                                        <ul>
                                            @foreach ( $period->days as $day )
                                            <li>
                                                <h6 class="mb-1">
                                                    {{$loop->iteration}}-
                                                    {{jdate($day->day)->format('%d، %B %Y')}}
                                                </h6>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            @else

                            @endif
                            <p class="alert alert-info" id="notes">
                                {{$enter_message}}
                                <br>
                                {{$exist_message}}

                            </p>
                            <p id="notes2">

                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#tuts">
                                آموزش رزرو
                            </button>

                            <div class="modal fade zoom" tabindex="-1" id="tuts">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                              آموزش رزرو

                                            </h5>
                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="بستن">
                                                <em class="icon ni ni-cross"></em>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <video  controls style="width:100%">
                                                <source src="{{asset("video/tut.mp4")}}" type="video/mp4">
                                              </video>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            </p>


                            <h5 class="title mb-3">اطلاعات شخصی</h5>
                        @include('main.error')

                            @role('admin|mate')
                            <div class="row g-3 mb-3">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label" for="male">
                                            نام درخواست کننده
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="name" name="name" value="{{old("
                                                name",$reserve->user?$reserve->user->name:"")}}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label" for="male">
                                            همراه درخواست کننده
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                value="{{old("mobile",$reserve->user?$reserve->user->mobile:"")}}"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endrole
                            <div class="row g-3 mb-3">
                                @if(!$plan_id)
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="enter">لطفا تاریخ ورود
                                            را تعیین کنید
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control  " id="enter" name="start"
                                                value="{{ jdate(old("start",$reserve->start? $reserve->start :  $plan_start )) ->format("Y/m/d") }}"
                                            placeholder=" تاریخ ورود " />
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
                                            <input type="text" class="form-control" id="exit" name="end"
                                            value="{{ jdate(old("end",$reserve->end? $reserve->ends() :  $plan_end )) ->format("Y/m/d") }}"

                                                {{--  value="{{  old("end",$reserve->end?jdate($reserve->end)->addDays(1)->format("Y/m/d"):jdate($plan_end)->format("Y/m/d"))}}"  --}}
                                            placeholder=" تاریخ خروج" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="date-range">
                                            مدت زمان سفر
                                        </label>
                                        <div class="form-control-wrap">
                                            <span id="duration">{{$reserve->id? $reserve->duration." روز ":""}}</span>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-4">
                                    <h6 class="text text-success text-40">
                                        تاریخ شروع طرح:
                                        {{jdate($plan_start)->format('%A, %d %B');}}
                                    </h6>
                                </div>

                                <div class="col-sm-4">
                                    <h6 class="text text-danger">
                                        تاریخ پایان طرح:
                                        {{jdate($plan_end)->format('%A, %d %B');}}
                                    </h6>
                                </div>

                                <div class="col-sm-4">
                                    <h6 class="text text-">
                                        مدت زمان سفر:
                                        {{$duration}}
                                    </h6>
                                </div>
                                @endif




                                <div id="" style="display: ">
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="male">
                                                    تعداد افراد آقا
                                                </label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control sp" id="male" name="male"
                                                        value="{{old("male",$reserve->male??0)}}"
                                                    placeholder=" افراد آقا" pattern="[0-9]*" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="female">
                                                    تعداد افراد خانم
                                                </label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control sp" id="female"
                                                        name="female" value="{{old("female",$reserve->female??0)}}"
                                                    placeholder=" افراد خانم" pattern="[0-9]*" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-label" for="kids">
                                                    تعداد افراد خردسال
                                                    (بالای سه سال)
                                                </label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control sp" id="kids" name="kids"
                                                        value="{{old("kids",$reserve->kids??0)}}"
                                                    placeholder=" افراد خردسال" pattern="[0-9]*" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-label" for="kids">
                                                    جمع افراد همراه
                                                </label>
                                                <div class="form-control-wrap">
                                                    <span class="all_pepole">
                                                        {{$reserve->id? $reserve->pepole."  ":"0"}}
                                                    </span>
                                                    نفر
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div id="all_p" style="display:{{$reserve->id?"":" none"}} ">
                                    <p class=" alert alert-danger">
                                    برای تایید رزرو شما
                                    وارد کردن مشخصات افراد همراه الزامی می باشد

                                    </p>
                                    <div id="all_memebers" style="display: ">
                                        <span class="btn btn-secondary  add_new_c">
                                            <i class="fas fa-plus "></i>
                                            همراه جدید
                                        </span>
                                        <span class="pe_all mr-5 pr-5" >
                                            @if($reserve)
                                            {{$reserve->pepole}}
                                            نفر
                                            @endif

                                        </span>
                                        <ul class="u_p" id="u_p">
                                            @if($reserve->companions)
                                            @foreach (json_decode($reserve->companions)->names as $com=>$val )
                                            @php
                                            $names=json_decode($reserve->companions)->names;
                                            $bdates=json_decode($reserve->companions)->bdates;

                                            @endphp
                                            <li class="li_p">
                                                <span class="r_n">{{$loop->iteration}}-</span>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                نام و نام خانوادگی
                                                                <span class="red">*</span>

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control req"
                                                                    name="names[]" placeholder=" نام و نام خانوادگی"
                                                                    value="{{$names[$com]}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                سال تولد
                                                                <span class="red">*</span>

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="number" id="s{{$loop->iteration}}"
                                                                    class="form-control  " name="bdates[]"
                                                                    placeholder=" سال تولد"
                                                                    value="{{$bdates[$com]}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--  <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                کد ملی
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" id="c" class="form-control "
                                                                    name="code_melli[]" placeholder=" کد ملی"
                                                                    value="{{$code_melli[$com]}}"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                شماره همراه

                                                            <span class="red">*</span>
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control req" name="mobiles[]"
                                                                    placeholder=" شماره همراه "
                                                                    value="{{$mobiles[$com]}}" />
                                                            </div>
                                                        </div>
                                                    </div>  --}}
                                                </div>
                                                <i class="fas fa-trash-alt remvoe_c"></i>
                                            </li>
                                            @endforeach
                                            @else
                                            @role('customer')
                                            <li class="li_p">
                                                <span class="r_n">1-</span>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                نام و نام خانوادگی
                                                                <span class="red">*</span>

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control req"
                                                                    name="names[]" placeholder=" نام و نام خانوادگی"
                                                                    value="{{$user->name}} {{$user->family}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                سال تولد
                                                                <span class="red">*</span>

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="number" id="ss1"
                                                                     class="form-control   " name="bdates[]"
                                                                    placeholder=" سال تولد"
                                                                    value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                کد ملی
                                                                {{--  <span class="red">*</span>  --}}

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" id="c" class="form-control "
                                                                    name="code_melli[]" placeholder=" کد ملی"
                                                                    value="{{$user->melli_code}}" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                شماره همراه

                                                            <span class="red">*</span>
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control req" name="mobiles[]"
                                                                    placeholder=" شماره همراه "
                                                                    value="{{$user->mobile}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--  <i class="fas fa-trash-alt remvoe_c"></i>  --}}
                                            </li>
                                            @endrole

                                            @endif


                                            {{--
                                            <li class="li_p">
                                                1-
                                                <div class="row g-3 mb-3">
                                                    <div class="col-3 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                نام و نام خانوادگی
                                                                <span class="red">*</span>

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control req"
                                                                    name="names[]" placeholder=" نام و نام خانوادگی"
                                                                    required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                تاریخ تولد
                                                                <span class="red">*</span>

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" id="s"
                                                                    class="form-control b_date req" name="bdates[]"
                                                                    placeholder=" تاریخ تولد" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                کد ملی
                                                                <span class="red">*</span>

                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" id="c" class="form-control req"
                                                                    name="code_melli[]" placeholder=" تاریخ تولد"
                                                                    required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="male">
                                                                شماره همراه (اختیاری)
                                                            </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name="mobiles[]"
                                                                    placeholder=" شماره همراه " required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <i class="fas fa-trash-alt remvoe_c"></i>
                                            </li> --}}
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-info" id="nexxt">
                            مرحله بعد
                        </button>
                        <a class="btn btn-warning" href="{{route("myreserve")}}">
                            برگشت
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- کد محتوای مودال -->


@endsection
