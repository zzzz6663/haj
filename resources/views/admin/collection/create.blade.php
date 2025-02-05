@extends('main.manager')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">تعریف کاربر جدید
                <i class="ti ti-user-plus"></i>
            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("doctor.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label class="form-label" for="name">نام
                                </label>
                                <input name="name" class="form-control" id="name" placeholder="مثلا ناصر" type="text" value="{{ old("name") }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="family">نام خانوادگی
                                </label>
                                <input name="family" class="form-control" id="family" placeholder="مثلا جعفری" type="text" value="{{ old("family") }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="mobile">همراه</label>
                                <input name="mobile" class="form-control" id="mobile" placeholder="مثلا 09373699317" type="text" value="{{ old("mobile") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mobile">استان</label>
                                <select class=" form-control select2" name="province_id" id="province_id" required>
                                    <option value="">انتخاب  کنید </option>
                                    @foreach (App\Models\Province::get() as $province)
                                    <option {{old('province_id')==$province->id?'selected':''}} value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="expert">تخصص</label>
                                <select class=" form-control select2" name="expert" id="expert" >
                                    <option value="">انتخاب  کنید  </option>
                                    @foreach (__("expert_type") as $key=>$val)
                                    <option {{old("expert")==$key?"selected":""}} value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="avatar">تصویر پروفایل </label>
                                <input name="avatar" class="form-control" id="avatar" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="ssn">کد ملی
                                </label>
                                <input name="ssn" class="form-control" id="ssn"  type="text" value="{{ old("ssn") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="NezamCode">شماره نظام پزشکی
                                </label>
                                <input name="NezamCode" class="form-control" id="NezamCode"  type="text" value="{{ old("NezamCode") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="serialno">شماره شناسنامه
                                </label>
                                <input name="serialno" class="form-control" id="serialno"  type="text" value="{{ old("serialno") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="fathername">نام پدر
                                </label>
                                <input name="fathername" class="form-control" id="fathername"  type="text" value="{{ old("fathername") }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="Sex">جنسیت</label>
                                <select class="form-select" id="Sex" name="Sex">
                                    <option value="">انتخاب کنید </option>
                                    <option {{ old("Sex")=="1" ?"selected":"" }} value="1">مرد</option>
                                    <option {{ old("Sex")=="2" ?"selected":"" }} value="2">زن</option>
                                </select>
                            </div>



                        </div>
                    </div>



                    {{-- <div class="mb-3">
                        <label class="form-label" for="region_id">منطقه</label>
                        <select class="form-select" id="region_id" name="region_id">
                            <option value="">انتخاب کنید </option>
                            @foreach (App\Models\Region::withoutTrashed()->get() as $region )
                            <option {{ old("region_id")==$region->id?"selected":"" }} value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                    </select>
            </div> --}}

            <div class="mb-3">
                <a href="{{ route("doctor.index") }}" class="btn btn-warning">
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
