@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">لیست زائرین</h3>
            <div class="nk-block-des text-soft">
                <p>شما در مجموع

                    {{ $users->total() }}
                    زائر دارید.</p>
            </div>
        </div>
        <!-- .nk-block-head-content -->


        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        {{-- <li>
                            <a href="{{ route("user.create") }}" class="btn btn-white btn-outline-light"><span>کاربر
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
            <div class="card-inner position-relative card-tools-toggle">
                @include("main.error")
                <form action="{{ route('passenger.index') }}" method="get" autocomplete="off">
                    @csrf
                    @method('get')
                    <div class="">
                        <div class="card-tools align-items-center justify-content-between ">
                            <div class="form-inline  gx-3">

                                <div class="form-wrap w-250px">


                                    <label class="form-label" for="select_passenger">زائر </label>
                                    <select class=" form-control select2 " name="passenger_id" id="select_passenger">
                                        <option value="">همه موارد </option>

                                    </select>
                                </div>

                                <div class="form-wrap w-150px">
                                    <label for="vip">وضعیت </label>
                                    <select class=" form-control select2 form_action" name="status" id="status">
                                        <option value="">همه موارد </option>
                                        @foreach (__("status") as $key=>$val)
                                        @if(!$key)
                                        @continue
                                        @endif
                                        <option {{request("status")==$key?"selected":""}} value="{{$key}}">{{$val}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-wrap w-200px">
                                    <label class="form-label" for="province_id">استان</label>
                                    <select class=" form-control select2 form_action" name="province_id" id="province_id">
                                        <option value="">همه موارد </option>
                                        @if($user->role=="admin" || $user->role=="manager" )
                                        @foreach (App\Models\Province::get() as $province)
                                        <option {{request("province_id")==$province->id?'selected':''}} value="{{
                                            $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                        @endif




                                        @if($user->role=="provincialSupervisor" )
                                        @foreach (App\Models\Province::get() as $province)
                                        @if(in_array($province->id,$user->provinces()->pluck("id")->toArray()))
                                        <option {{request("province_id")==$province->id?'selected':''}} value="{{
                                            $province->id }}">{{ $province->name }}</option>
                                        @endif
                                        @endforeach
                                        @endif

                                        @if($user->role=="provincialAgent" )
                                        @foreach (App\Models\Province::get() as $province)
                                        @if($province->id==$user->province_id)
                                        <option {{request("province_id")==$province->id?'selected':''}} value="{{
                                            $province->id }}">{{ $province->name }}</option>
                                        @endif
                                        @endforeach
                                        @endif




                                        {{-- @foreach ($user->karevans as $karevan)
                                        @if($karevan->province)
                                        <option {{request("province_id")==$karevan->province->id?'selected':''}} value="{{
                                            $karevan->province->id }}">{{ $karevan->province->name }}</option>
                                        @endif
                                        @endforeach --}}
                                    </select>
                                </div>
                                {{-- @dd(request("karevan_id"))  --}}

                                <div class="form-wrap w-200px">
                                    <label class="form-label" for="karevan_id">کاروان </label>
                                    <select class=" form-control select2 form_action" name="karevan_id" id="karevan_id">
                                        <option value="">همه موارد </option>


                                        @if($user->role=="admin" || $user->role=="manager" )
                                        @foreach (App\Models\Karevan::get() as $karevan)
                                        <option {{request("karevan_id")==$karevan->IDS?'selected':''}} value="{{$karevan->IDS }}">{{ $karevan->IDS }}</option>
                                        @endforeach
                                        @endif

                                        @if($user->role=="doctor" )
                                        @foreach ($user->karevans as $karevan)
                                        <option {{request("karevan_id")==$karevan->IDS?'selected':''}} value="{{$karevan->IDS }}">{{ $karevan->IDS }}</option>
                                        @endforeach
                                        @endif


                                        @if($user->role=="provincialSupervisor" )
                                        @foreach (App\Models\Karevan::whereIn("ProvinceID",$user->provinces()->pluck("id")->toArray() )->get() as $karevan)
                                        <option {{request("karevan_id")==$karevan->IDS?'selected':''}} value="{{$karevan->IDS }}">{{ $karevan->IDS }}</option>
                                        @endforeach
                                        @endif

                                        @if($user->role=="provincialAgent" )
                                        @foreach (App\Models\Karevan::where("ProvinceID",$user->province_id )->get() as $karevan)
                                        <option {{request("karevan_id")==$karevan->IDS?'selected':''}} value="{{$karevan->IDS }}">{{ $karevan->IDS }}</option>
                                        @endforeach
                                        @endif

                                    </select>
                                </div>



                                <div class="form-wrap w-250px">
                                    <br>
                                    <input type="submit" name='pdf' value="Pdf" class=" inline-block">
                                    <input type="submit" name='Excel' value="Excel" class=" inline-block">
                                    <button class="btn btn-secondary">
                                        جستجو
                                    </button>
                                </div>
                                <div class="form-wrap w-200px">
                                    <br>

                                    @if(request("_token"))
                                    <a href="{{ route("passenger.index") }}" class="btn inline-block btn-danger"><i class="fas fa-times-circle"></i>

                                        <span style="padding-right:10px ">
                                            لغو جستجو
                                        </span>
                                    </a>
                                    @endif
                                </div>
                            </div>



                        </div>

                    </div>
                </form>

            </div>

        </div>
        <!-- .card-inner -->

        <div class="card-inner table-responsive">
            <table class="table ts_c">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">کدزائر </th>
                        <th scope="col">شماره کاروان
                            /استان
                        </th>
                        <th scope="col">@sortablelink('name',"نام") </th>
                        <th scope="col">کد ملی </th>
                        <th scope="col">سن </th>
                        <th scope="col">وضعیت </th>
                        <th scope="col">اقدام</th>

                    </tr>
                    {{-- --}}
                </thead>
                <tbody>
                    @foreach ($users as $passenger )

                    <tr>
                        <td scope="row"> {{ $loop->iteration }}</td>
                        <td>
                            {{ $passenger->PassengerCode }}

                        </td>
                        <td>
                            {{ $passenger->KarevanID}}
                            @if($passenger->karevan)
                            -
                            {{$passenger->karevan->province->name}}
                            @endif
                        </td>
                        <td>
                            <a href="{{ URL::signedRoute('passenger.info',$passenger->id)}}">
                                {{ $passenger->name }}
                                {{ $passenger->family }}
                            </a>

                        </td>

                        <td>
                            {{ $passenger->ssn }}
                        </td>
                        <td>
                            {{ $passenger->BirthDate() }}
                            <br>
                            {{-- {{ $passenger->BirthDate}} --}}
                        </td>
                        <td>
                            <span class="text text-{{$passenger->status_color()}}">
                                {{__("status.". $passenger->status) }}
                            </span>
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{route("exam.user",$passenger->id)}}">
                                @role("doctor|admin|manager")
                                معاینه
                                @endrole
                                @role("provincialAgent|provincialSupervisor")
                                سوابق
                                @endrole

                            </a>
                            {{-- <a class="btn btn-primary" href="{{route("history.user",$passenger->id)}}">
                            تاریخچه
                            </a> --}}

                            <!-- کد راه انداز مودال -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#s{{$passenger->id}}">تاریخچه</button>

                            <!-- کد محتوای مودال -->
                            <div class="modal fade" tabindex="-1" id="s{{$passenger->id}}">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="بستن">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                        {{-- <div class="modal-header">
                                            <h5 class="modal-title">عنوان مودال</h5>
                                        </div>  --}}
                                        <div class="modal-body">
                                            @include("admin.passenger.history_user")
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @role("admin")
                            @if($passenger->status != "un_review" || $passenger->status != "un_review")
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#chnage_status{{$passenger->id}}">تغییر وضعیت </button>
                            <!-- کد محتوای مودال -->
                            <div class="modal fade" tabindex="-1" style="text-align:right" id="chnage_status{{$passenger->id}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="بستن">
                                            <em class="icon ni ni-cross"></em>
                                        </a>

                                        <br>
                                        <div class="modal-body cha_s">
                                            <form action="{{route("reset.user",$passenger->id)}}" method="post">
                                                @csrf
                                                @method("post")
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="reset_reason">لطفا دلیل تغییر وضعیت را بنویسید </label>
                                                        <textarea name="reset_reason" class="form-control count_ch" id="" cols="30" rows="5">{{(isset($reset_reason) )?$reset_reason:""}}</textarea>
                                                        <div id="charCount">0 / 150</div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="">
                                                            تغییر وضعیت
                                                            {{ $passenger->name }}
                                                            {{ $passenger->family }}
                                                        </label>
                                                        <select name="status" id="" class="form-control">
                                                            <option value="">انتخاب کنید </option>
                                                            @if($passenger->status == "medical_commission" )
                                                            <option {{$passenger->status=="under_review"?"selected":""}} value="under_review">{{__("status.under_review")}} </option>
                                                            @endif
                                                            @if($passenger->status == "result_commission" )
                                                            <option {{$passenger->status=="medical_commission"?"selected":""}} value="medical_commission">{{__("status.medical_commission")}} </option>
                                                            @endif
                                                            @if($passenger->status == "rejected" )
                                                            @if($passenger->commission_in)
                                                            <option {{$passenger->status=="result_commission"?"selected":""}} value="result_commission">{{__("status.result_commission")}} </option>
                                                            @else
                                                            <option {{$passenger->status=="under_review"?"selected":""}} value="under_review">{{__("status.under_review")}} </option>
                                                            @endif
                                                            @endif
                                                            @if($passenger->status == "approved" )

                                                            @if($passenger->commission_in)
                                                            <option {{$passenger->status=="result_commission"?"selected":""}} value="result_commission">{{__("status.result_commission")}} </option>
                                                            @else
                                                            <option {{$passenger->status=="under_review"?"selected":""}} value="under_review">{{__("status.under_review")}} </option>
                                                            @endif

                                                            @endif
                                                            {{--  @foreach (__("status") as $key=>$val)
                                                            <option {{$passenger->status==$key?"selected":""}} value="{{$key}}">{{$val}}</option>
                                                            @endforeach  --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <span class="btn save_form btn-success">
                                                    ذخیره
                                                </span>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endif

                            @endrole
                            {{-- @if($passenger->status !="un_review")
                            <a class="btn btn-danger" href="{{route("reset.user",$passenger->id)}}">
                            ریست
                            </a>
                            @endif --}}

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- .card-inner -->
            <div class="card-inner">
                {{ $users->appends(Request::all())->links('admin.section.pagination') }}
            </div>
        </div>









    </div>

</div>



@endsection
