@extends('main.manager')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">ویرایش مدیر
                <i class="ti ti-user-plus"></i>
            {{$user->name}}
            {{$user->family}}
            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("manager.update",$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">نام
                                </label>
                                <input name="name" class="form-control" id="name" placeholder="مثلا ناصر" type="text" value="{{ old("name",$user->name) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="family">نام خانوادگی
                                </label>
                                <input name="family" class="form-control" id="family" placeholder="مثلا جعفری" type="text" value="{{ old("family",$user->family) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="avatar">تصویر پروفایل </label>
                                <input name="avatar" class="form-control" id="avatar" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="mobile">همراه
                                </label>
                                <input name="mobile" class="form-control" id="mobile"  type="text" value="{{ old("mobile",$user->mobile) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="username">نام کاربری
                                </label>
                                <input name="username" class="form-control" id="username"  type="text" value="{{ old("username",$user->username) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">رمز عبور
                                </label>
                                <input name="password" class="form-control" id="password"  type="password" value="{{ old("password",$user->password) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">تکرار رمز عبور
                                </label>
                                <input name="password" class="form-control" id="password_confirmation"  type="password_confirmation" value="{{ old("password_confirmation") }}">
                            </div>
                        </div>
                    </div>

            <div class="mb-3">
                <a href="{{ route("manager.index") }}" class="btn btn-warning">
                    برگشت
                    <i class="fas fa-long-arrow-alt-left"></i>
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
