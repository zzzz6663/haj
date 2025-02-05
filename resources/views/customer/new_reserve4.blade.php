@extends('main.manager')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">ثبت نوبت جدید </h3>

        </div>
        <p class="alert alert-success">
            مرحله چهارم
        </p>
        <!-- .nk-block-head-content -->


        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>
<div class="nk-block">
    <div class="card ">
        <div class="card-inner">
            <form class="" autocomplete="off" action="{{route("new.reserve4",$reserve->id)}}" id="reserve_form"
                method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        @include('main.error')

                    </div>
                    @include('customer.invoice_part')

                    <dive class="col-lg-12">
                        <div class="more_in" style="display: none">
                            <div class="row" id="pay_s" >
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="receipt">
                                            تصویر
                                            فیش پرداختی
                                        </label>
                                        <input name="receipt" class="form-control" id="receipt"
                                            placeholder="مثلا 2323222" type="file" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <br>
                                    <button class="btn btn-info">
                                        ارسال فیش
                                    </button>
                                    <a class="btn btn-warning" href="{{route("new.reserve3",$reserve->id)}}">
                                        مرحله قبل
                                    </a>
                                    <span class="btn btn-danger" id="get_pdf">
                                        دانلود صورتحساب
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
