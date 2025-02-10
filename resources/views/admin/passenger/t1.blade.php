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
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-menu-alt-r"></em></a>
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
                <form action="{{ route('reports',['type'=>"t1"]) }}" id="s_en" method="get" autocomplete="off">
                    @csrf
                    @method('get')
                    <input type="text" hidden  value="t1" name="type">
                    <div class="">
                        <div class="card-tools align-items-center justify-content-between ">
                            <div class="row">
                                <div class="form-wrap w-250px">
                                    <label for="search">جستجو</label>
                                    {{--  <input type="text" name="search" value="{{ request(" search") }}"
                                        class="form-control ">

                                        <div class="mb-1">  --}}
                                            <label class="form-label" for="select_passenger">زائر  </label>
                                            <select class=" form-control select2" name="passenger_id" id="select_passenger" >
                                                <option value="">انتخاب کنید </option>

                                            </select>
                                </div>

                                <div class="form-wrap w-150px">
                                    <label for="vip">وضعیت </label>
                                    <select class=" form-control select2 form_action" name="status" id="status">
                                        <option value="">انتخاب کنید </option>
                                        @foreach (__("status") as $key=>$val)
                                        @if(!$key)
                                        @continue
                                        @endif
                                        <option {{request("status")==$key?"selected":""}} value="{{$key}}">{{$val}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="vip">جنسیت  </label>
                                    <select class=" form-control select2 form_action" name="Sex" id="Sex">
                                        <option value="">انتخاب کنید </option>
                                        <option {{request("Sex")==2?"selected":""}} value="2">زن  </option>
                                        <option {{request("Sex")==1?"selected":""}} value="1">مرد  </option>

                                    </select>
                                </div>
                                <div class="form-wrap w-150px">
                                    <label for="vip">تاهل  </label>
                                    <select class=" form-control select2 form_action" name="MarriageStatus" id="MarriageStatus">
                                        <option value="">انتخاب کنید </option>
                                        <option {{request("MarriageStatus")==2?"selected":""}} value="2">متاهل  </option>
                                        <option {{request("MarriageStatus")==1?"selected":""}} value="1">مجرد  </option>

                                    </select>
                                </div>

                                <div class="form-wrap w-200px">
                                    <label class="form-label" for="province_id">استان</label>
                                    <select class=" form-control select2 form_action" name="province_id"
                                        id="province_id">
                                        <option value="">انتخاب کنید </option>
                                        @foreach (App\Models\Province::get() as $province)
                                        <option {{request("province_id")==$province->id?'selected':''}} value="{{
                                            $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-wrap w-400px">
<br>
                                        <input type="submit" name='pdf' value="Pdf" class="inline-block ">
                                        <input type="submit" name='Excel' value="Excel" class="inline-block ">
                                        <button class="btn btn-secondary">
                                            جستجو
                                        </button>
                                </div>
                                <div class="form-wrap w-200px">
                                    <br>

                                    @if(request("_token"))
                                    <a href="{{ route('reports',['type'=>"t1"]) }}"
                                        class="inline-block btn btn-danger"><i
                                            class="fas fa-times-circle"></i>
                                            <span style="padding-right:10px ">
                                                لغو جستجو
                                            </span></a>
                                    @endif
                                </div>

                            </div>

                         @include("admin.passenger.filters")
                        </div>
                        <div class="row">
                            <div class="col-lg-3">

                                <input type="submit" name='pdf' value="Pdf" class="inline-block ">
                                <input type="submit" name='Excel' value="Excel" class="inline-block ">
                                <button class="btn btn-secondary">
                                    جستجو
                                </button>
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
                            -
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{route("exam.user",[$passenger->id,"back"=>2])}}">
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
                            {{ $passenger->BirthDate}}
                        </td>
                        <td>
                            <span class="text text-{{$passenger->status_color()}}">
                                {{__("status.". $passenger->status) }}
                            </span>
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
