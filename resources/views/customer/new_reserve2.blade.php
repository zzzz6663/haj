@extends('main.manager')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">ثبت نوبت جدید </h3>

        </div>
        <p class="alert alert-success">
            مرحله دوم
        </p>
        <!-- .nk-block-head-content -->


        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>
<div class="nk-block">
    <div class="card ">
        <div class="card-inner">
            <form class="" autocomplete="off" action="{{route("new.reserve2",$reserve->id)}}"  method="post"
            >
                  @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        @include('main.error')

                    </div>
                     <div class="col-lg-12 mb-5">
                        <div class="">
                            <h6 class="d-flex justify-content-between">
                               <div class="text text-success">
                                تاریخ ورود :
                                {{Jdate($reserve->start)->format('%d %B ')}}
                               </div>

                               <div class="text text-danger">
                                تاریخ خروج :
                                {{Jdate(Carbon\Carbon::parse($reserve->end)->addDay())->format('%d %B ')}}
                               </div>
                            </h6>
                            <input type="text" name="male" value="{{$reserve->male}}" hidden>
                            <input type="text" name="female" value="{{$reserve->female}}" hidden>
                            @include('parts.get_reserve')
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-12">
                        <button class="btn btn-info">
                            مرحله بعد
                        </button>
                        @role('admin')

                        @endrole
                        <a class="btn btn-danger" href="{{route("new.reserve",$reserve->id)}}">
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
