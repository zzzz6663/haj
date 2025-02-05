@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">مشخصات  شما

                {{$user->name}}
                {{$user->family}}-
                {{$user->mobile}}
            </h3>
            <div class="nk-block-des text-soft">

            </div>
        </div>
        <!-- .nk-block-head-content -->


        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>

<div class="nk-block">
    {{--  <div class="card card-stretch">
        <div class="card-inner">
            @include('main.error')
            <form action="{{route("profile")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <h5>
                        مشخصات
                    </h5>
                <div class="col-md-6 mb-1">
                    <div class="form-group">
                        <label class="form-label" for="name">نام</label>
                        <div class="form-control-wrap">
                            <input type="text" data-msg="الزامی"  class="form-control " id="name" name="name" value="{{old("name",$user->name)}}"  />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label" for="family">نام خانوادگی</label>
                        <div class="form-control-wrap">
                            <input type="text" data-msg="الزامی" class="form-control " id="family" name="family" value="{{old("family",$user->family)}}" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="mb-3">
                        <label class="form-label" for="avatar">تصویر  </label>
                        <input name="avatar" multiple class="form-control" id="avatar" placeholder="مثلا 2323222" type="file" accept="image/*" >
                    </div>
                </div>


            </div>
             <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">ذخیره اطلاعات</button>
                </div>
            </form>


        </div>

    </div>  --}}
<div class="row">
    <div class="col-lg-6">

        <div class="card card-stretch">
            <div class="card-inner">
                @include('main.error')
                <form action="{{route("change.password")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <h5>
                        تغییر
                        رمز
                    </h5>
                    <div class="row">


                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label class="form-label" for="old">رمز قدیمی
                                </label>
                                <input name="old" class="form-control" id="old" type="text" value="">
                            </div>
                        </div>

                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label class="form-label" for="password">رمز عبور جدید
                            </label>
                            <input name="password" class="form-control" id="password" type="text" value="">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label class="form-label" for="new_password">تکرار رمز عبور جدید
                            </label>
                            <input name="new_password" class="form-control" id="new_password" type="text" value="">
                        </div>
                    </div>

                </div>
                 <div class="form-group">
                        <button type="submit" class="btn btn-primary">ذخیره اطلاعات</button>
                        <a href="{{route("passenger.index")}}" class="btn btn-danger">
                             برگشت
                        </a>
                    </div>
                </form>


            </div>

        </div>

    </div>
</div>


</div>


@endsection
