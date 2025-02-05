@extends('main.manager')
@php
$navbar=true;
$sidebar=true;
@endphp
@section('content')
<div class="nk-block nk-block-middle nk-auth-body wide-xs">
    <div class="brand-logo pb-4 text-center">
        <a href="{{ route("login") }}" class="logo-link">
            <img class=" logo-img logo-img-lg" src="{{asset(" images/lg.png")}}">
        </a>
    </div>

    <div class="card">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">فراموشی رمز </h4>
                    <div class="nk-block-des">
                        <p>
                            بعد از ثبت همراه دکمه ارسال کد رمز عبور را بزنید تا رمز عبور جدید برای شما پیامک شود
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="mobile">
                        همراه
                    </label>
                </div>
                <div class="form-control-wrap">
                    <input type="number" class="form-control form-control-lg" id="mobile" name="mobile"
                        placeholder="  همراه خود را وارد کنید">
                </div>
            </div>

            <div class="form-group">
                <span class="btn btn-lg btn-primary btn-block" id="send_forget">ارسال رمز عبور </span>
            </div>

            {{--  <form action="{{ route("check.login") }}" method="post">
                @csrf
                @method('post')
                <div class="row" >
                    <div class="col-lg-6 mb-3">
                        <div class="form-control-wrap">
                            <label for="">
                                همراه
                            </label>
                            <input type="number" class="form-control form-control-lg" id="" name="mobile"
                                placeholder="  همراه خود را وارد کنید">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-control-wrap">
                            <label for="ssn">
                                کد ملی
                            </label>
                            <input type="number" class="form-control form-control-lg" id="ssn" name="ssn"
                                placeholder="  کد ملی  خود را وارد کنید">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-control-wrap">
                            <label for="NezamCode">
                                نظام پزشکی
                            </label>
                            <input type="number" class="form-control form-control-lg" id="NezamCode" name="NezamCode"
                                placeholder="  نظام پزشکی  خود را وارد کنید">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-control-wrap">
                            <label for="username">
                                نام کاربری
                            </label>
                            <input type="number" class="form-control form-control-lg" id="username" name="username"
                                placeholder="  نام کاربری  خود را وارد کنید">
                        </div>
                    </div>
                </div>

            </form>
            <div class="form-group">
                <span class="btn btn-lg btn-primary btn-block" id="gus_password">تشخیص رمز عبور </span>
            </div>  --}}


            <div class="text-center pt-4 pb-3">
            </div>

        </div>
    </div>

</div>

{{-- <div class="login_box">
    <form action="{{ route("check.login") }}" method="post">
        @csrf
        @method('post')
        <div class="login_forms_box box_shdow">
            <div class="logo_box">
                <figure><img src="/site/images/plogo.png"></figure>
            </div>
            <p>حساب کاربری ندارید ؟ <a class="register_url" href="{{ route("register") }}">ثبت نام </a></p>
            <input type="text" name="mobile" placeholder="تلفن همراه">
            <input type="text" name="password" value="" placeholder="رمز ورود">
            <a class="login_ads_panels" href=""> 🎯ورود به پنل تبلیغ دهنده</a>
            <input type="submit" value="ورود">
            <div class="flex bt_form_txt">
                <p><a href="{{ route("mobile.login") }}"> 🔑ورود بدون رمز</a></p>
                <p class="rember_me_box">
                    <input type="radio" id="remeber_me" name="remeber_me">
                    <label for="remeber_me">مرا به خاطر بسپار</label>
                </p>
            </div>
        </div>
    </form>
</div> --}}
@endsection
