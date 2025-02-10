<script src="
        https://cdn.jsdelivr.net/npm/apexcharts@4.0.0/dist/apexcharts.min.js
        "></script>
<link href="
        https://cdn.jsdelivr.net/npm/apexcharts@4.0.0/dist/apexcharts.min.css
        " rel="stylesheet">


<div class="card card-preview">
    <h3 class="nk-block-title page-title">آمار استان</h3>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    @include("main.error")
                    <form action="{{ route('reports') }}" method="get" autocomplete="off">
                        @csrf
                        @method('get')
                        <input type="text" value="t2" hidden name="type">
                        {{--  <div class="">
                            <div class="card-tools align-items-center justify-content-between ">
                                <div class="form-inline gx-3">
                                    <div class="form-wrap w-250px">
                                        <input type="text" name="all" hidden value="1">
                                        <label for="vip">استان </label>
                                        <select class=" form-control select2" name="province_id" id="province">
                                            <option value="">همه موراد </option>
                                            @foreach (App\Models\Province::all() as $province )
                                            @if($user->role == "doctor" && !in_array($province->id,$user->karevans()->pluck("ProvinceID")->toArray()))
                                            @continue;
                                            @endif

                                            @if($user->role == "provincialSupervisor" && !in_array($province->id,$user->provinces()->pluck("id")->toArray()))
                                            @continue;
                                            @endif
                                            @if($user->role == "provincialAgent" && $user->province_id !=$province->id)
                                            @continue;
                                            @endif
                                            <option {{request("province_id")==$province->id?"selected":""}}
                                                value="{{$province->id}}">
                                                {{$province->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-wrap w-250px">
                                        <label for="vip">کاروان </label>
                                        <select class=" form-control select2" name="karevan_id" id="karevan">
                                            <option value="">همه موراد  </option>
                                            @if(request("province_id"))
                                            @php
                                            $province=App\Models\Province::find(request("province_id"))
                                            @endphp
                                            @foreach ($province->karevans as $karevan )
                                            <option {{request("karevan_id")==$karevan->id?"selected":""}}
                                                value="{{$karevan->id}}">
                                                {{$karevan->IDS}}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-wrap w-250px">
                                        <br>
                                        <button class="btn btn-secondary">
                                            جستجو
                                        </button>
                                    </div>
                                    <div class="form-wrap w-200px">
                                        <br>
                                        @if(request("_token"))
                                        <a href="{{ route("reports",['type'=>"t2"]) }}" class="inline-block btn btn-danger"><i class="fas fa-times-circle"></i>
                                            <span style="padding-right:10px ">
                                                لغو جستجو
                                            </span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                    </form>
                </div>

            </div>

        </div>
    </div>
{{--
    @if(request("all"))
    <div class="border card-inner table-responsive">
        <div class="pt-1 pb-1 mb-1 row border-bottom">
            <div class="col-lg-3">
                <span class="titly">تاریخ:</span>
                <span class="contenty">
                    {{Jdate()->format("Y-m-d")}}
                </span>
            </div>

            <div class="col-lg-3">
                <span class="titly">استان:</span>
                <span class="contenty">
                    @if($province_selected)
                    {{$province_selected->name}}

                    @endif
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">کاروان:</span>
                <span class="contenty">
                    @if(request("karevan_id"))
                    {{$karevan_selected->IDS}}
                    @else
                    همه کاروان ها
                    @endif
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">:متوسط سنی افراد
                    :</span>
                <span class="contenty">
                    {{floor($allusers->clone()->get()
                    ->map(function ($user) {
                    $birthDate = Morilog\Jalali\Jalalian::fromFormat('Ymd', $user->BirthDate)->toCarbon();
                    return $birthDate->diffInYears(Carbon\Carbon::now());
                    })
                    ->avg())}}
                </span>
            </div>

        </div>
        <div class="pt-1 pb-1 mb-1 row border-bottom">
            <div class="col-lg-3">
                <span class="titly">تعداد کل زائرین:</span>
                <span class="contenty">
                    {{$allusers->clone()->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">:تعداد افراد زیر 18 سال
                    :</span>

                <span class="contenty">
                    {{$allusers->clone()->where('BirthDate', '>',
                    jdate(Carbon\Carbon::now()->subYears(18))->format('Ymd'))->count()}}
                </span>
            </div>

            <div class="col-lg-3">
                <span class="titly">
                    :تعداد افراد بین 50 تا 60 سال
                    :</span>
                <span class="contenty">
                    {{$allusers->clone()->whereBetween('BirthDate', [
                    jdate(Carbon\Carbon::now()->subYears(60))->format('Ymd'),jdate(Carbon\Carbon::now()->subYears(50))->format('Ymd')])->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد افراد بین 50 تا 60 سال
                    :</span>
                <span class="contenty">
                    {{$allusers->clone()->whereBetween('BirthDate', [
                    jdate(Carbon\Carbon::now()->subYears(70))->format('Ymd'),jdate(Carbon\Carbon::now()->subYears(60))->format('Ymd')])->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد افراد بین 80 تا 70 سال
                    :</span>
                <span class="contenty">
                    {{$allusers->clone()->whereBetween('BirthDate', [
                    jdate(Carbon\Carbon::now()->subYears(80))->format('Ymd'),jdate(Carbon\Carbon::now()->subYears(70))->format('Ymd')])->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">:تعداد افراد بالای 80 سال
                    :</span>
                <span class="contenty">
                    {{$allusers->clone()->where('BirthDate', '<=', jdate(Carbon\Carbon::now()->
                        subYears(80))->format('Ymd'))->count()}}
                </span>
            </div>
        </div>
        <div class="pt-1 pb-1 mb-1 row border-bottom">
            <div class="col-lg-6">
                <span class="titly">
                    :تعداد کاروانهای دارای پزشک
                </span>

                <span class="contenty">
                    @if($province_selected)
                    {{$province_selected->karevans()->whereNotNull("doctor_id")->count()}}
                    @else
                   {{ App\Models\karevan::whereNotNull("doctor_id")->count()}}
                    @endif
                </span>
            </div>
            <div class="col-lg-6">
                <span class="titly">
                    :تعداد کاروانهای بدون پزشک
                </span>

                <span class="contenty">
                    @if($province_selected)
                    {{$province_selected->karevans()->whereNull("doctor_id")->count()}}
                    @else
                   {{ App\Models\karevan::whereNull("doctor_id")->count()}}
                    @endif
                </span>
            </div>
        </div>
        <div class="pt-1 pb-1 mb-1 row border-bottom">
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد زائرین تایید شده توسط پزشک
                </span>
                <span class="contenty">
                    {{$allusers->clone()->where("status","approved")->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد زائرین رد شده توسط پزشک
                </span>
                <span class="contenty">
                    {{$allusers->clone()->where("status","rejected")->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد زائرین در حال بررسی
                </span>
                <span class="contenty">
                    {{$allusers->clone()->where("status","under_review")->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد زائرین معاینه نشده
                </span>
                <span class="contenty">
                    {{$allusers->clone()->where("status","un_review")->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد زائرین در کمیسیون
                </span>
                <span class="contenty">
                    {{$allusers->clone()->where("status","medical_commission")->count()}}
                </span>
            </div>
            <div class="col-lg-3">
                <span class="titly">
                    :تعداد زائرین پاسخ داده شده از کمیسیون
                </span>
                <span class="contenty">
                    {{$allusers->clone()->where("status","result_commission")->count()}}
                </span>
            </div>

        </div>
        <br>
        <br>
        @php
        $approved= $allusers->clone()->whereIn("status",["approved"])->count();
        $approved_commission= $allusers->clone()->where("commission_in",1)->whereIn("status",["approved"])->count();
        $rejected_commission= $allusers->clone()->where("commission_in",1)->whereIn("status",["rejected"])->count();
        $medical_commission=
        $allusers->clone()->where("commission_in",1)->whereIn("status",["medical_commission"])->count();
        $unapproved=
        $allusers->clone()->whereIn("status",["un_review","under_review","medical_commission","result_commission"])->count();
        @endphp
        <div class="pt-1 pb-1 mb-1 row border-bottom">
            <div class="col-lg-6">
                <div id="chart4">

                </div>
                <script>
                    var options = {
                        series: [{{$approved}}, {{$unapproved}}, ],
                        chart: {
                        width: 380,
                        type: 'pie',
                      },
                      colors: ['#4CAF50', '#FF9800'], // رنگ‌های سفارشی

                      labels: ['تایید شده', 'مراحل قبل از تایید '],
                      legend: {
                        show: true, // نمایش یا مخفی کردن legend
                        fontSize: '16px', // اندازه فونت
                        fontFamily: 'Vazir', // تنظیم فونت دلخواه
                        fontWeight: 'bold', // وزن فونت (مثلاً normal, bold)
                        labels: {
                            colors: '#333', // رنگ فونت
                            useSeriesColors: false, // استفاده از رنگ‌های سری برای متن
                        },
                        position: 'bottom', // موقعیت legend (مثلاً top, bottom, left, right)
                        horizontalAlign: 'center', // تراز افقی legend
                    },
                      dataLabels: {
                        style: {
                            fontSize: '22px', // تغییر اندازه فونت لیبل‌ها
                            fontFamily: 'Vazir', // تنظیم فونت دلخواه
                        }
                    },
                      responsive: [{
                        breakpoint: 480,
                        options: {
                          chart: {
                            width: 200
                          },
                          legend: {
                            position: 'bottom'
                          }
                        }
                      }]
                      };

                      var chart = new ApexCharts(document.querySelector("#chart4"), options);
                      chart.render();
                </script>
            </div>
            <div class="col-lg-6">
                <div id="chart5"></div>

                <script>
                    var options = {
                    series: [{
                    name: 'Inflation',
                    data: [{{$approved_commission}}, {{$rejected_commission}}, {{$medical_commission}}, ]
                  }],
                    chart: {
                    height: 350,
                    type: 'bar',
                  },
                  plotOptions: {
                    bar: {
                      borderRadius: 10,
                      dataLabels: {
                        position: 'top', // top, center, bottom
                      },
                    }
                  },
                  dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                      return val + "%";
                    },
                    offsetY: -20,
                    style: {
                      fontSize: '12px',
                      colors: ["#304758"]
                    }
                  },

                  xaxis: {
                    categories: ["تایید شده", "رد شده", "بی پاسخ",
                        ],
                    position: 'top',
                    axisBorder: {
                      show: false
                    },
                    axisTicks: {
                      show: false
                    },
                    crosshairs: {
                      fill: {
                        type: 'gradient',
                        gradient: {
                          colorFrom: '#D8E3F0',
                          colorTo: '#BED1E6',
                          stops: [0, 100],
                          opacityFrom: 0.4,
                          opacityTo: 0.5,
                        }
                      }
                    },
                    tooltip: {
                      enabled: true,
                    }
                  },
                  yaxis: {
                    axisBorder: {
                      show: false
                    },
                    axisTicks: {
                      show: false,
                    },
                    labels: {
                      show: false,
                      formatter: function (val) {
                        return val + "%";
                      }
                    }

                  },
                  title: {
                    text: 'نمودار میله ای وضعیت کمیسیون ',
                    floating: true,
                    offsetY: 330,
                    align: 'center',
                    style: {
                      color: '#444'
                    }
                  }
                  };

                  var chart = new ApexCharts(document.querySelector("#chart5"), options);
                  chart.render();
                </script>

            </div>
        </div>
    </div>
    @else
    <div class="card-inner table-responsive">
        <table class="table ts_c">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">استان</th>
                    @role('admin|manager|provincialSupervisor|provincialAgent')
                    <th scope="col">تعداد پزشک</th>
                    @endrole
                    <th scope="col">تعداد زائر</th>
                    <th scope="col">بررسی</th>
                    <th scope="col">کمیسیون</th>
                    <th scope="col">پاسخ کمیسیون</th>
                    <th scope="col">تایید</th>
                    <th scope="col">عدم تایید</th>
                    <th scope="col">انصرافی</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalDoctors = 0;
                    $totalPassengers = 0;
                    $totalUnderReview = 0;
                    $totalMedicalCommission = 0;
                    $totalResultCommission = 0;
                    $totalApproved = 0;
                    $totalRejected = 0;
                    $totalWithdrawn = 0;
                @endphp

                @foreach (App\Models\Province::all() as $province)
                    @php
                    $user=auth()->user();
                    if ($user->role == "provincialAgent" &&  $user->province_id!=$province->id) {

                        continue;
                    }
                    if ($user->role == "provincialSupervisor" && !in_array($province->id,$user->provinces()->pluck("id")->toArray())) {
                        continue;
                    }

                    if ($user->role == "doctor" && !in_array($province->id,$user->karevans()->pluck("ProvinceID")->toArray())) {

                        continue;

                    }


                        $doctorsCount = $province->Karevans()->whereNotNull("doctor_id")->count();
                        $passengersCount = App\Models\User::whereRole("passenger")->whereHas("karevan", function ($q) use ($province) {
                            $q->where("ProvinceID", $province->id);
                        })->count();

                        $underReviewCount = App\Models\User::whereRole("passenger")->whereIn("status", ["under_review"])->whereHas("karevan", function ($q) use ($province) {
                            $q->where("ProvinceID", $province->id);
                        })->count();

                        $medicalCommissionCount = App\Models\User::whereRole("passenger")->whereIn("status", ["medical_commission"])->whereHas("karevan", function ($q) use ($province) {
                            $q->where("ProvinceID", $province->id);
                        })->count();

                        $resultCommissionCount = App\Models\User::whereRole("passenger")->whereIn("status", ["result_commission"])->whereHas("karevan", function ($q) use ($province) {
                            $q->where("ProvinceID", $province->id);
                        })->count();

                        $approvedCount = App\Models\User::whereRole("passenger")->whereIn("status", ["approved"])->whereHas("karevan", function ($q) use ($province) {
                            $q->where("ProvinceID", $province->id);
                        })->count();

                        $rejectedCount = App\Models\User::whereRole("passenger")->whereIn("status", ["rejected"])->whereHas("karevan", function ($q) use ($province) {
                            $q->where("ProvinceID", $province->id);
                        })->count();

                        $withdrawnCount = App\Models\User::whereRole("passenger")->whereHas("karevan", function ($q) use ($province) {
                            $q->where("ProvinceID", $province->id)->whereRaw('LENGTH(IDS) = 3');
                        })->count();

                        $totalDoctors += $doctorsCount;
                        $totalPassengers += $passengersCount;
                        $totalUnderReview += $underReviewCount;
                        $totalMedicalCommission += $medicalCommissionCount;
                        $totalResultCommission += $resultCommissionCount;
                        $totalApproved += $approvedCount;
                        $totalRejected += $rejectedCount;
                        $totalWithdrawn += $withdrawnCount;
                    @endphp

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $province->name }}</td>
                        @role('admin|manager|provincialSupervisor|provincialAgent')
                        <td>
                            <span class="btn btn-dim btn-outline-{{ $doctorsCount?"primary":""}}">
                            {{ $doctorsCount }}
                            </span>
                        </td>
                                 @endrole

                        <td>
                            <span class="btn btn-dim btn-outline-{{ $passengersCount?"primary":""}}">
                                {{ $passengersCount }}
                                </span>

                        </td>
                        <td>
                            <span class="btn btn-dim btn-outline-{{ $underReviewCount?"primary":""}}">
                                {{ $underReviewCount }}
                                </span>

                        </td>
                        <td>
                            <span class="btn btn-dim btn-outline-{{ $medicalCommissionCount?"primary":""}}">
                                {{ $medicalCommissionCount }}
                                </span>

                        </td>
                        <td>
                            <span class="btn btn-dim btn-outline-{{ $resultCommissionCount?"primary":""}}">
                                {{ $resultCommissionCount }}
                                </span>

                        </td>
                        <td>
                            <span class="btn btn-dim btn-outline-{{ $approvedCount?"primary":""}}">
                                {{ $approvedCount }}
                                </span>

                        </td>
                        <td>
                            <span class="btn btn-dim btn-outline-{{ $rejectedCount?"primary":""}}">
                                {{ $rejectedCount }}
                                </span>

                        </td>
                        <td>
                            <span class="btn btn-dim btn-outline-{{ $withdrawnCount?"primary":""}}">
                                {{ $withdrawnCount }}
                                </span>

                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2"><strong>جمع کل</strong></td>

                    @role('admin|manager|provincialSupervisor|provincialAgent')
                    <td><strong>
                        <span class="btn btn-dim btn-outline-{{ $totalDoctors?"primary":""}}">
                            {{ $totalDoctors }}
                            </span>
                    </strong></td>
                   @endrole
                    <td><strong>
                        <span class="btn btn-dim btn-outline-{{ $totalPassengers?"primary":""}}">
                            {{ $totalPassengers }}
                            </span>
                    </strong></td>
                    <td><strong>
                            <span class="btn btn-dim btn-outline-{{ $totalUnderReview?"primary":""}}">
                            {{ $totalUnderReview }}
                            </span>
                    </strong></td>
                    <td><strong>
                            <span class="btn btn-dim btn-outline-{{ $totalMedicalCommission?"primary":""}}">
                            {{ $totalMedicalCommission }}
                            </span>
                    </strong></td>
                    <td><strong>
                            <span class="btn btn-dim btn-outline-{{ $totalResultCommission?"primary":""}}">
                            {{ $totalResultCommission }}
                            </span>
                    </strong></td>
                    <td><strong>
                            <span class="btn btn-dim btn-outline-{{ $totalApproved?"primary":""}}">
                            {{ $totalApproved }}
                            </span>

                    </strong></td>
                    <td><strong>
                            <span class="btn btn-dim btn-outline-{{ $totalRejected?"primary":""}}">
                            {{ $totalRejected }}
                            </span>
                    </strong></td>
                    <td><strong>
                            <span class="btn btn-dim btn-outline-{{ $totalWithdrawn?"primary":""}}">
                            {{ $totalWithdrawn }}
                            </span>
                    </strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    @endif --}}






</div>







<div class="card-inner table-responsive">

    @foreach ($st as $ke=>$va )


    <div class="col-lg-12">

        <div id="charts{{$loop->iteration}}"></div>

        <script>
            var provinces_list = @json($provinces_list);
                        var val = @json($va);
                        var count = @json($st_count[$ke]);

                        console.log(status)
                        var options = {
                            chart: {
                              type: 'bar',
                              height: 350
                            },
                            series: [
                                {
                                    name: "{{$all_status[$ke]}} "+" درصد " ,
                                    data: val
                                  },
                                  {
                                    name: "{{$all_status[$ke]}}"+" تعداد ",
                                    data: count
                                  }
                            ],
                            xaxis: {
                              categories: provinces_list,
                            },
                            title: {
                              text: 'نمودار وضعیت  '+ "{{$all_status[$ke]}}",
                              align: 'center'
                            }
                          };

                          var chart = new ApexCharts(document.querySelector("#charts{{$loop->iteration}}"), options);
                          chart.render();
        </script>


    </div>
    @endforeach



</div>
