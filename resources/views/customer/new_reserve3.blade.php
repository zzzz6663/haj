@extends('main.manager')
@section('content')

@php
$settings=
App\Models\Setting::all();
foreach ($settings as $setting) {
${$setting->name} = $setting;
}
@endphpe

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">ثبت نوبت جدید </h3>

        </div>
        <p class="alert alert-success">
            مرحله سوم
        </p>
        <!-- .nk-block-head-content -->


        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>
<div class="nk-block">
    <div class="card ">
        <div class="card-inner">
            <form class="" autocomplete="off" action="{{route("new.reserve3",$reserve->id)}}" id="reserve_form"
                method="post"
                data-url="{{route("new.reserve3")}}">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        @include('main.error')
                    </div>
                    <div class="col-lg-12 mb-5">
                        @if(!($reserve->type!="single" || $reserve->plan_id) )
                        @include('customer.off_part')
                        <div id="shahid_pr" style="display: none">
                            <div class="form-group">
                                <label class="form-label" for="shahid_name">نام شهید محله </label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="shahid_name" name="shahid_name"
                                        placeholder="نام شهید محله">
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="col-lg-12">

                    @include('customer.food_part')
                    </div>
                    <div class="col-lg-12">
                        <span id="price_food" class="text text-success"></span>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-info">
                            مرحله بعد
                        </button>
                        <a class="btn btn-danger" href="{{route("new.reserve2",$reserve->id)}}">
                            مرحله قبل
                        </a>
                        @role('customer')

                        <a class="btn btn-warning" href="{{route("myreserve")}}">
                            برگشت
                        </a>
                        @endrole

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
