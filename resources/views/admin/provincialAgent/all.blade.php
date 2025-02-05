@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">لیست نماینده استانی</h3>
            <div class="nk-block-des text-soft">
                <p>شما در مجموع

                    {{ $users->total() }}
                    کاربر دارید.</p>
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
                            <a href="{{ route(" user.create") }}" class="btn btn-white btn-outline-light"><span>کاربر
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
            <form action="{{ route('provincialAgent.index') }}" method="get" autocomplete="off">
                @csrf
                @method('get')
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="">
                        <div class="card-tools align-items-center justify-content-between ">
                            <div class="form-inline  gx-3">
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
                                <div class="form-wrap w-200px">
                                    <label class="form-label" for="province_id">استان</label>
                                    <select class=" form-control select2 form_action"  name="province_id"  id="province_id"  >
                                        <option value="">انتخاب  کنید </option>
                                        @foreach (App\Models\Province::get() as $province)
                                        <option {{request("province_id")==$province->id?'selected':''}} value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-wrap ">
                                    <span class="">
                                        <br>
                                        @if(request("_token"))
                                        <a href="{{ route("provincialAgent.index") }}" class="btn inline-block btn-danger"><i
                                                class="fas fa-times-circle"></i></a>
                                        @endif
                                        <button class="btn btn-dim btn-outline-light inline-block">
                                            اعمال
                                        </button>
                                    </span>
                                </div>

                                {{--  <div class="form-control-wrap mt-4">
                                    <input form="import_form" type="file" id="import" hidden name="import">
                                    <label for="import" class="btn btn-info">
                                        <em class="icon ni ni-arrow-down-fill-c"></em>
                                    </label>
                                    <button form="import_form" class="btn btn-info pointer"
                                        id="import_file">import</button>
                                </div>  --}}
                            </div>
                            <!-- .form-inline -->
                            <div>

                                <a href="{{route("provincialAgent.create")}}" class="btn btn-info">
                                    نماینده  جدید
                                </a>
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
                                <th scope="col">@sortablelink('name',"نام") </th>
                                <th scope="col">استان </th>
                                <th scope="col">همراه </th>
                                <th scope="col">نام کاربری </th>
                                <th scope="col">رمز </th>
                                <th scope="col">تصویر</th>
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
                                    {{--  {{implode(", ",$user->provinces()->pluck("name")->toArray()) }}  --}}
                                    @if($user->province)
                                    {{ $user->province->name }}
                                    @endif
                                </td>

                                <td>
                                    {{ $user->mobile }}
                                </td>

                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>
                                    {{ $user->password }}
                                </td>
                                <td>
                                    <a href="{{ $user->avatar() }}" data-lightbox="gallery-{{ $user->id }}" class="">
                                        آواتار
                                    </a>
                                </td>




                                <td>
                                    <a href="{{route("provincialAgent.edit",$user->id)}}" class="btn btn-primary">
                                        ویرایش
                                    </a>

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

@endsection
