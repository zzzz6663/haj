<script src="
        https://cdn.jsdelivr.net/npm/apexcharts@4.0.0/dist/apexcharts.min.js
        "></script>
<link href="
        https://cdn.jsdelivr.net/npm/apexcharts@4.0.0/dist/apexcharts.min.css
        " rel="stylesheet">


<div class="card  card-preview">
    <h3 class="nk-block-title page-title">نمودار</h3>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    @include("main.error")
                    <form action="{{ route('reports') }}" method="get" autocomplete="off">
                        @csrf
                        @method('get')
                        <input type="text" value="t3" hidden name="type">
                        <div class="">
                            <div class="card-tools align-items-center justify-content-between ">
                                <div class="form-inline  gx-3">
                                    <div class="form-wrap w-250px">
                                        <input type="text" name="all" hidden value="1">
                                        <label for="vip">استان </label>
                                        <select class=" form-control select2 " name="province_id" id="province">
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
                                        <select class=" form-control select2 " name="karevan_id" id="karevan">
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
                                        <a href="{{ route("reports",['type'=>"t2"]) }}" class="btn inline-block
                                            btn-danger"><i class="fas fa-times-circle"></i>
                                            <span style="padding-right:10px ">
                                                لغو جستجو
                                            </span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <div class="card-inner border table-responsive">
        <div class="row mb-1 pt-1 pb-1 border-bottom">
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
        <div class="row mb-1 pt-1 pb-1 border-bottom">
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
        <div class="row mb-1 pt-1 pb-1 border-bottom">
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
        <div class="row mb-1 pt-1 pb-1 border-bottom">
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
        <div class="row mb-1 pt-1 pb-1 border-bottom">
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
