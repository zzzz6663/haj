@extends('main.manager')
@section('content')


<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <h5 class="card-header">

                لطفا تصویر رسید پرداخت را اینجا اپلود نمایید
                <i class="ti ti-user-plus"></i>

            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("reserve.receipt",$reserve->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <h6>
                        مانده نهایی:
                        {{
                            number_format($reserve->price)
                        }}
                        تومان
                    </h6>
                    <p>
                        شماره حساب مجموعه :
                        <h6 class="text text-success copy" data-copy="IR-460570029280000463905001">
                            IR-460570029280000463905001
                        </h6>
                        شماره کارت مجموعه :
                        <h6 class="text text-success copy"  data-copy="5022-2913-0692-6831">
                            5022-2913-0692-6831
                        </h6>
                        <p class="text text-danger">
                    (  روی شماره ها  کلیک کنید کپی میشود )
                        </p>
                    </p>

                    <div class="mb-3">
                        <label class="form-label" for="receipt">تصویر </label>
                        <input name="receipt"  class="form-control" id="receipt" placeholder="مثلا 2323222" type="file" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <a href="{{ route("myreserve") }}" class="btn btn-warning">
                            برگشت
                            <i class="ti ti-arrow-narrow-left"></i>
                        </a>
                        <button class="btn btn-success"> ذخیره
                            <i class="ti ti-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
