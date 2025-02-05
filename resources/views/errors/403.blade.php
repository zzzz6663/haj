@extends('main.manager')
@php
$navbar=true;
$sidebar=true;
@endphp
@section('content')
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content">
                <div class="nk-block nk-block-middle wide-xs mx-auto">
                    <div class="nk-block-content nk-error-ld text-center">
                        <h1 class="nk-error-head">403</h1>
                        <h3 class="nk-error-title">اوه! چرا اینجا هستید؟</h3>
                        <p class="nk-error-text">
شما به این مسیر دسترسی ندارید
لطفا با مدیر وب سایت تماس بگیرید
                        </p>
                        @php
                        $previousUrl = url()->previous();
                    @endphp

                    @if (str_contains($previousUrl, url('/')))
                        <a   class="btn btn-lg btn-primary mt-2" href="{{ $previousUrl }}">بازگشت به صفحه قبلی</a>
                    @else
                        <a   class="btn btn-lg btn-primary mt-2" href="{{ route('home') }}">بازگشت به صفحه اصلی</a>
                    @endif



                    </div>
                </div>
                <!-- .nk-block -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
@endsection
