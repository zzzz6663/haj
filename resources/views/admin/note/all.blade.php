@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">لیست یادداشت</h3>
            <div class="nk-block-des text-soft">

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
                            <a href="{{ route("note.create") }}" class="btn btn-white btn-outline-light"><span>کاربر
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
            <form action="{{ route('note.index') }}" method="get" autocomplete="off">
                @csrf
                @method('get')
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="">
                        <div class="card-tools align-items-center justify-content-between ">
                            <div class="form-inline gx-3">

                                {{-- <div class="form-wrap w-150px">
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


                                {{-- <div class="mt-4 form-control-wrap">
                                    <input form="import_form" type="file" id="import" hidden name="import">
                                    <label for="import" class="btn btn-info">
                                        <em class="icon ni ni-arrow-down-fill-c"></em>
                                    </label>
                                    <button form="import_form" class="btn btn-info pointer"
                                        id="import_file">import</button>
                                </div> --}}

                                <div class="form-wrap ">
                                    <br>
                                    <a href="{{route("note.create")}}" class="btn btn-info">
                                         یادداشت
                                         جدید
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
                                    <th scope="col">تاتیتل </th>
                                    <th scope="col">محتوا </th>
                                    <th scope="col">اقدام</th>
                                </tr>
                                {{-- --}}
                            </thead>
                            <tbody>
                                @foreach ($notes as $note )

                                <tr>
                                    <td scope="row"> {{ $loop->iteration }}</td>

                                    <td>
                                        {{ $note->note }}
                                    </td>

                                    <td>
                                        {{ $note->info }}
                                    </td>
                                    <td>
                                        <div class="d-flex">

                                            <div>
                                                <a href="{{route("note.edit",$note->id)}}" class="btn btn-warning">
                                                    ویرایش
                                                </a>
                                            </div>

                                        </div>

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


@endsection
