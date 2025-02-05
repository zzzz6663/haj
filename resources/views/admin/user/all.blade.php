@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">لیست کاربران</h3>
            <div class="nk-block-des text-soft">
                <p>شما در مجموع

                    {{ $users->total() }}
                    کاربر دارید.</p>
            </div>
        </div>
        <!-- .nk-block-head-content -->


        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <a href="{{ route("user.create") }}" class="btn btn-white btn-outline-light"><span>کاربر جدید</span></a>
                        </li>
                        {{-- <li class="nk-block-tools-opt">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
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
                        </li>  --}}
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


            <form action="{{ route('user.index') }}" method="get" autocomplete="off">
                @csrf
                @method('get')
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="">
                        <div class="card-tools align-items-center justify-content-between ">
                            <div class="form-inline  gx-3">
                                <div class="form-wrap w-150px">
                                    <label for="search">جستجو</label>
                                    <input type="text" name="search" value="{{ request("search") }}" class="form-control ">
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="from">از</label>
                                    <input type="text" name="from" value="{{ request("from") }}" class="form-control date-picker">
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="to">تا </label>
                                    <input type="text" name="to" value="{{ request("to") }}" class="form-control date-picker">
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="vip">وضعیت </label>
                                    <select class="form-control" name="confirm" id="confirm">
                                        <option value=""> انتخاب کنید </option>
                                        <option {{ request("confirm")==1?"selected":"" }} value="1"> فعال </option>
                                        <option {{request()->has("confirm")&& request("confirm")===0?"selected":"" }} value="0"> غیر فعال </option>
                                    </select>
                                </div>
                                {{--  <div class="form-wrap w-150px">
                                    <label for="vip">نوع کاربر  </label>
                                    <select class="form-control" name="role" id="role">
                                        <option value=""> انتخاب کنید </option>
                                        @foreach (__("role") as $ke=>$val )
                                        <option value="{{  $ke}}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>  --}}


                                <div class="form-wrap ">
                                    <span class="">
                                        <br>
                                        @if(request("_token"))
                                        <a href="{{ route("user.index") }}" class="btn inline-block btn-danger"><i class="fas fa-times-circle"></i></a>
                                        @endif
                                        <button class="btn btn-dim btn-outline-light inline-block">
                                            اعمال
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <!-- .form-inline -->
                            <div>
                                {{--  <a href="{{ route("user.create") }}" class=" btn btn-success " data-target="search">کاربر جدید <i class="fas fa-plus"></i></a>  --}}
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
                                <th scope="col">موبایل </th>
                                <th scope="col">محل </th>
                                <th scope="col">نوع حساب</th>
                                <th scope="col">وضعیت نمایش </th>
                                <th scope="col">وضعیت تایید </th>
                                <th scope="col">تاریخ</th>
                                <th scope="col">اقدام</th>

                            </tr>
                            {{-- --}}
                        </thead>
                        <tbody>
                            @foreach ($users as $user )

                            <tr>
                                <td scope="row"> {{ $loop->iteration }}</td>
                                <td>
                                    {{ $user->name }}
                                    {{ $user->family }}
                                </td>
                                <td>
                                    {{ $user->mobile }}
                                </td>

                                {{--  <td>
                                    <span class="text text-{{ $user->active?"success":"danger" }}">
                                        <i class="fas fa-{{ $user->active?"check":"times-circle" }}"></i>
                                    </span>
                                </td>  --}}


                                <td>
                                    {{jdate( $user->created_at )->format('Y-m-d') }}
                                </td>
                                <td>

                                    @if($user->role=="customer")
{{--
                                    <a href="{{ route("user.edit",$user->id) }}" class="btn btn-info"> ویرایش
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route("user.show",$user->id) }}" class="btn btn-light"> جزئیات
                                        <i class="fas fa-eye"></i>
                                    </a>  --}}

                                    @endif

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
    {{ $users->appends(Request::all())->links('admin.section.pagination') }}
</div>
{{-- <div class="card-inner">
                <ul class="pagination justify-content-center justify-content-md-start">
                    <li class="page-item">
                        <a class="page-link" href="#">قبلی</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <span class="page-link"><em class="icon ni ni-more-h"></em></span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">6</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">7</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">بعدی</a>
                    </li>
                </ul>
                <!-- .pagination -->
            </div>  --}}
<!-- .card-inner -->
</form>
</div>
<!-- .card-inner-group -->
</div>
<!-- .card -->
</div>
@endsection
