@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">لیست کاروان</h3>
            <div class="nk-block-des text-soft">
                <p>شما در مجموع

                    {{ $karevans->total() }}
                    کاروان در سیستم دارید.</p>
            </div>
        </div>
        <!-- .nk-block-head-content -->


        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        {{-- <li>
                            <a href="{{ route(" karevan.create") }}" class="btn btn-white btn-outline-light"><span>کاربر
                                    جدید</span></a>
                        </li> --}}
                        {{-- <li class="nk-block-tools-opt">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary"
                                    data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li>
                                            <a href="#"><span>افزودن کاربر</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span>افزودن تیم</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span>وارد کردن کاربر</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <!-- .toggle-wrap -->
        </div>
        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>
<div class="nk-block">
    <div class="card card-stretch">
        <div class="card-inner-group">


            <form action="{{ route('karevan.index') }}" method="get" autocomplete="off">
                @csrf
                @method('get')
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="">
                        <div class="card-tools align-items-center justify-content-between ">
                            <div class="form-inline gx-3">
                                <div class="form-wrap w-150px">
                                    <label for="search">جستجو</label>
                                    <input type="text" name="search" value="{{ request("search") }}"
                                        class="form-control ">
                                </div>
                                {{-- <div class="form-wrap w-150px">
                                    <label for="from">از</label>
                                    <input type="text" name="from" value="{{ request("from") }}"
                                        class="form-control date-picker">
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="to">تا </label>
                                    <input type="text" name="to" value="{{ request("to") }}"
                                        class="form-control date-picker">
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="vip">وضعیت </label>
                                    <select class="form-control" name="confirm" id="confirm">
                                        <option value=""> انتخاب کنید </option>
                                        <option {{ request("confirm")==1?"selected":"" }} value="1"> فعال </option>
                                        <option {{request()->has("confirm")&& request("confirm")===0?"selected":"" }}
                                            value="0"> غیر فعال </option>
                                    </select>
                                </div> --}}
                                <div class="form-wrap ">
                                    <span class="">
                                        <br>
                                        @if(request("_token"))
                                        <a href="{{ route("karevan.index") }}" class="inline-block btn btn-danger"><i
                                                class="fas fa-times-circle"></i>

                                                <span style="padding-right:10px ">
                                                    لغو جستجو
                                                </span></a>
                                        @endif
                                        <button class="inline-block btn btn-dim btn-outline-light">
                                            اعمال
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <!-- .form-inline -->
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .card-inner -->

                <div class="card-inner table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@sortablelink('name',"نام مدیر") </th>
                                <th scope="col">شماره  </th>
                                <th scope="col">تلفن </th>
                                <th scope="col">شهر </th>
                                <th scope="col">پزشک</th>
                                <th scope="col">تعداد عوامل </th>
                                <th scope="col">تعداد زائر </th>
                                <th scope="col">ظرفیت کل </th>
                                <th scope="col">اقدام</th>

                            </tr>
                            {{-- --}}
                        </thead>
                        <tbody>
                            @foreach ($karevans as $karevan )

                            <tr>
                                <td scope="row"> {{ $loop->iteration }}</td>
                                <td>
                                    {{ $karevan->ManagerName }}
                                    {{ $karevan->ManagerFamily }}
                                </td>
                                <td>
                                    {{ $karevan->KarevanNo }}
                                </td>
                                <td>
                                    {{ $karevan->Tel }}
                                </td>
                                <td>
                                @if($karevan->province)
                                {{ $karevan->province->name }}

                                @endif
                                </td>
                                <td>
                                    @if($karevan->doctor_id)
                                    {{ $karevan->doctor->name }}
                                    {{ $karevan->doctor->family }}
                                    @endif
                                </td>

                                <td>
                                    {{ $karevan->AvamelNo }}
                                </td>
                                <td>
                                    {{ $karevan->users_count  }}

                                </td>
                                <td>

                                </td>
                                <td>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#s{{$karevan->id}}">تاریخچه</button>

                                <!-- کد محتوای مودال -->
                                <div class="modal fade" tabindex="-1" id="s{{$karevan->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="بستن">
                                                <em class="icon ni ni-cross"></em>
                                            </a>
                                            {{--  <div class="modal-header">
                                                <h5 class="modal-title">عنوان مودال</h5>
                                            </div>  --}}
                                            <div class="modal-body">
                                                @include("admin.karevan.history_karevan")
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                    @role("admin|manager")
                                    <div class="form-wrap px">
                                        <span class="btn btn-info cha">تغییر پزشک </span>
                                        <div class="par_sel" style="display: none">

                                        <div class="">
                                            <div class="selec d-flex">
                                                <label for="vip">انتحاب پزشک </label>
                                                <select class=" form-control select2 change_doctor" m data-id="{{ $karevan->id}}" name="">
                                                    <option value="">انتخاب کنید </option>
                                                    @foreach ($docors as $doctor )
                                                    <option {{ $karevan->doctor_id==$doctor->id?"selected":""}}
                                                        value="{{$doctor->id}}">
                                                        {{$doctor->name}}
                                                        {{$doctor->family}}-
                                                        {{$doctor->NezamCode}}
                                                        {{$doctor->ssn}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                {{--  <span class="btn btn-success">ذخیره </span>  --}}
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                    @endrole
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalDefault{{$karevan->id}}">تغییر پزشک</button>
                                    <div class="modal fade" tabindex="-1" id="modalDefault{{$karevan->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content par">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">تغییر پزشک
                                                        {{ $karevan->ManagerName }}
                                                        {{ $karevan->ManagerFamily }}

                                                    </h5>
                                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="بستن">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                            <div class="form-wrap px">
                                                                <label for="vip">انتحاب پزشک </label>
                                                                <select class=" form-control select2 sel"
                                                                    name="status">
                                                                    <option value="">انتخاب کنید </option>
                                                                    @foreach ($docors as $doctor )
                                                                    <option {{ $karevan->
                                                                        doctor_id==$doctor->id?"selected":""}}
                                                                        value="{{$doctor->id}}">
                                                                        {{$doctor->name}}
                                                                        {{$doctor->family}}-
                                                                        {{$doctor->NezamCode}}
                                                                        {{$doctor->ssn}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <span class="btn btn-success change_doctor"
                                                                data-id="{{ $karevan->id }}">ذخیره </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="card-inner">
                        {{ $karevans->appends(Request::all())->links('admin.section.pagination') }}
                    </div>

                </div>



            </form>



        </div>

    </div>

</div>
<!-- .card-inner -->

@endsection
