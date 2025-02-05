@extends('main.manager')
@php
$navbar=true;
$sidebar=true;
@endphp
@section('empty')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="content-page mt-5  wide-md mx-auto ">

                <div class="components-previewmt-5">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">ثبت نام در سفر

                            {{ $tour->title }}
                        </h2>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">
                                    راهنما <strong class="text-primary small">
                                        {{ $tour->user->name }}
                                        {{ $tour->user->family }}
                                    </strong>
                                </h3>
                                {{-- <div class="nk-block-des text-soft">
                                    <ul class="list-inline">
                                        <li>
                                            ایجاد شده در:
                                            <span class="text-base">21 آبان 1402 01:02 بعد از ظهر</span>
                                        </li>
                                    </ul>
                                </div>  --}}
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ route("home") }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>بازگشت</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="invoice">
                            <div class="invoice-action">

                            </div>
                            <!-- .invoice-actions -->
                            <div class="invoice-wrap">

                                <div class="">
                                    <h5>
                                        مشخصات سفر
                                    </h5>

                                    <div class="invoice-contact">
                                        <ul class="nk-top-products row">
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">عنوان </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->title}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">نوع </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->type}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">ظرفیت </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->capacity}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">مبدا </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->origin}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-12 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">توضیحات </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->info}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">مقصد </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->destination}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">وضعیت </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->balad}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">راهنمای مسیر </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{__("tour_status.".$tour->status)}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">قیمت </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{number_format($tour->price)}}
                                                            تومان
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">تایید توسط ادمین </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount    text text-{{$tour->confirm?'success ':"danger "}}">
                                                            {{$tour->confirm?'تاییده شده ':"تاییده نشده "}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title"> سفر با هدیه </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount    text text-{{$tour->gift?'success ':"danger "}}">
                                                            {{$tour->gift?'تاییده شده ':"تاییده نشده "}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">عنوان </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{$tour->start}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">شروع </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{ jdate($tour->start)->format("Y-m-d") }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">فرصت ثبت نام </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{ jdate($tour->register_deadline)->format("Y-m-d") }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item col-3 ">
                                                <div>
                                                    <div class="info">
                                                        <div class="title">پایان </div>
                                                    </div>
                                                    <div class="total">
                                                        <div class="amount">
                                                            {{ jdate($tour->end)->format("Y-m-d") }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>



                                <div class="">
                                    @include('master.error')
                                    <form action="{{ route("send.pay") }}" method="post" autocomplete="off">
                                        @csrf
                                        @method('post')

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="companions">تعداد همراهان
                                                    </label>
                                                    <input name="companions" class="form-control" id="companions"  value="0" data-max="{{  $tour->capacity }}" data-price="{{  $tour->price }}" placeholder=" " type="text" value="{{ old("companions") }}">
                                                </div>
                                            </div>
                                            <div class="col-3">

                                                <h6 class="mt-4">
                                                    قیمت سفر
                                                    {{ number_format( $tour->price)}}
                                                    تومان
                                                </h6>
                                            </div>
                                            <div class="col-3">
                                                <h6 class="mt-4">
                                                    قیمت نهایی
                                                    <span class="total" id="total">
                                                        {{ number_format( $tour->price)}}
                                                    </span>
                                                    تومان
                                                </h6>

                                            </div>
                                            <div class="col-3">
                                               <input type="text"  name="tour_id" id="tour_id" hidden value="{{ $tour->id }}" class="btn btn-success">
                                               <input type="text"  name="type" id="type" hidden value="tour_pay" class="btn btn-success">
                                               <input type="submit" value="پرداخت"  id="tour_pay" class="btn btn-success">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                <!-- .invoice-head -->
                                <div class="invoice-bills">

                                </div>
                                <!-- .invoice-bills -->
                            </div>
                            <!-- .invoice-wrap -->
                        </div>
                        <!-- .invoice -->
                    </div>
                    <!-- .nk-block -->
                </div>
                <!-- .nk-block -->
            </div>
            <!-- .content-page -->
        </div>
    </div>
</div>
@endsection
