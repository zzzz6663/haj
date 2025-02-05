@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">لیست رزرو ها</h3>
            <div class="nk-block-des text-soft">
                <p>شما در مجموع

                    {{ $reserves->total() }}
                    رزرو دارید.</p>
            </div>
        </div>
        <!-- .nk-block-head-content -->


        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <a href="{{ route("new.reserve") }}" class="btn btn-white btn-outline-light"><span>رزرو
                                    جدید</span></a>
                        </li>
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
            <form action="{{ route('myreserve') }}" method="get" autocomplete="off">
                @csrf
                @method('get')
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="">
                        <div class="card-tools align-items-center justify-content-between ">
                            <div class="form-inline  gx-3">
                                {{-- <div class="form-wrap w-150px">
                                    <label for="search">جستجو</label>
                                    <input type="text" name="search" value="{{ request(" search") }}"
                                        class="form-control ">
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="from">از</label>
                                    <input type="text" name="from" value="{{ request(" from") }}"
                                        class="form-control date-picker">
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="to">تا </label>
                                    <input type="text" name="to" value="{{ request(" to") }}"
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
                                {{-- <div class="form-wrap w-150px">
                                    <label for="vip">نوع کاربر </label>
                                    <select class="form-control" name="role" id="role">
                                        <option value=""> انتخاب کنید </option>
                                        @foreach (__("role") as $ke=>$val )
                                        <option value="{{  $ke}}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}


                                <div class="form-wrap ">
                                    <span class="">
                                        <br>
                                        <a href="{{ route("new.reserve") }}" class="btn btn-white btn-outline-light"><span>رزرو
                                            جدید</span></a>

                                                  <a href="{{ route("home")."#plans" }}" class="btn btn-info "><span>

                                                    طرح ها
                                            </span></a>
                                        {{--  <button class="btn btn-dim btn-outline-light inline-block">
                                            اعمال
                                        </button>  --}}
                                    </span>
                                </div>
                            </div>
                            <!-- .form-inline -->
                            <div>
                                {{-- <a href="{{ route(" user.create") }}" class=" btn btn-success "
                                    data-target="search">کاربر جدید <i class="fas fa-plus"></i></a> --}}
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
                                <th scope="col">نام</th>
                                <th scope="col">پیگری</th>
                                <th scope="col">طرح</th>
                                <th scope="col">تاریخ </th>
                                <th scope="col">تعداد </th>
                                <th scope="col">قیمت </th>
                                <th scope="col">شامل غذا </th>
                                <th scope="col">وضعیت تایید </th>
                                <th scope="col">نوع اتاق </th>
                                <th scope="col">ثبت</th>
                                <th scope="col">اقدام</th>

                            </tr>
                            {{-- --}}
                        </thead>
                        <tbody>
                            @foreach ($reserves as $reserve )

                            <tr>
                                <td scope="row"> {{ $loop->iteration }}</td>
                                <td>
                                    {{ $reserve->user->name }}
                                    {{ $reserve->user->family }}
                                </td>
                                <td>
                                    {{ $reserve->id }}
                                </td>

                                <td>
                                    @if($reserve->plan)
                                    {{ $reserve->plan->name }}
                                    @endif
                                </td>
                                <td>
                                    {{jdate( $reserve->start )->format('Y-m-d') }}-
                                    {{jdate( $reserve->end )->format('Y-m-d') }}
                                    <br>
                                    {{ $reserve->duration }}
                                    روز
                                </td>
                                <td>
                                    {{ $reserve->pepole }}
                                    نفر
                                    <hr>
                                    {{ $reserve->male }}    آقا-    {{ $reserve->female }}  خانم


                                </td>
                                <td>
                                    {{number_format( $reserve->price ) }}
                                    تومان

                                </td>
                                <td>
                                    <span class=" -{{ $reserve->food==1?'success':'danger'}}">
                                        {{ $reserve->food==1?'با غذا':'بدون غذا '}}
                                    </span>
                                </td>

                                <td>
                                    {{ __("arr.".$reserve->status) }}

                                </td>
                                <td>
                                    {{ __("room_type.".$reserve->type) }}
                                    {{ implode( ', ', $reserve->rooms()->pluck('name')->toArray())}}


                                </td>

                                <td>
                                    {{jdate( $reserve->created_at )->format('Y-m-d') }}
                                </td>
                                <td>
                                    @if( in_array($reserve->status,['not_confirm',"pre_register"]))
                                    <a href="{{ route("new.reserve",$reserve->id) }}" class="btn btn-success">
                                        ویرایش
                                    </a>
                                    @endif
                                    {{--  @if($reserve->status=="not_confirm")
                                    <a href="{{ route("reserve.receipt",$reserve->id) }}" class="btn btn-info"> ارسال
                                        رسید پرداختی
                                    </a>
                                    @endif  --}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div>

                    </div>
                </div>



            </form>



        </div>

    </div>
</div>
<!-- .card-inner -->
<div class="card-inner">
    {{ $reserves->appends(Request::all())->links('admin.section.pagination') }}
</div>

@endsection
