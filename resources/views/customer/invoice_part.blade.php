<div class="col-lg-12 mb-5">
    <div class="">
        <h5 class="title mb-4">فاکتور نهایی </h5>
        <!-- .invoice-actions -->
        <div class="invoice-wrap" id="pdf_wrap">

            <div class="invoice-head">
                <div class="invoice-contact">
                    <span class="overline-title">فاکتور به</span>
                    <div class="invoice-contact-info">
                        <h4 class="title">
                            {{$user->name}}
                            {{$user->family}}
                        </h4>
                        <ul class="list-plain">

                            <li><em class="icon ni ni-call-fill"></em><span>
                                    {{$user->mobile}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="invoice-contact">
                    {{-- <span class="overline-title">فاکتور به</span> --}}
                    <div class="invoice-contact-info">
                        <h4 class="title">
                            مجموعه هتل همّت
                        </h4>

                    </div>
                </div>


                <div class="invoice-desc">
                    <ul class="list-plain">
                        <li class="invoice-date">
                            <span>تاریخ</span>:<span>{{jdate($now )->format('%A, %d %B %Y')}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- .invoice-head -->
            <div class="invoice-bills">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="w-60">توضیحات</th>
                                <th>مبلغ</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td>
                                    زمان سفر
                                </td>
                                <td>
                                    <span class="final_sum">
                                        <span class="duration_sum">
                                            از
                                            {{Jdate($reserve->start)->format("d-m-Y")}}-
                                            تا
                                            {{Jdate($reserve->ends())->format("d-m-Y")}}

                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    هزینه اسکان
                                </td>
                                <td>
                                    <span class="final_sum">
                                        <span
                                            class="duration_sum">{{number_format($reserve->stay_price*10)}}
                                        </span> ریال
                                    </span>
                                    <span class="content small text text-info">
                                        {{ implode( ', ',
                                        $reserve->rooms()->pluck('name')->toArray())}}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    تعداد افراد گروه
                                </td>
                                <td>
                                    <span class="final_sum">
                                        <span class="duration_sum">{{$reserve->pepole}} </span>نفر
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    مدت زمان سفر


                                </td>

                                <td>
                                    <span class="final_sum">
                                        <span class="duration_sum">{{$reserve->duration}} </span>روز
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    هزینه غذا در این مدت


                                </td>

                                <td>
                                    <span class="final_sum">
                                        <span
                                            class="duration_sum">{{number_format($reserve->f_price*10)}}
                                        </span>ریال
                                    </span>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                   افزایش قیمت  طرح
                                   @if($reserve->plan)
                                   <span class="text text-info">
                                       {{$reserve->plan->name}}
                                   </span>
                                   @endif

                                </td>

                                <td>
                                    <span class="final_sum">
                                        <span
                                             class="duration_sum">{{number_format($reserve->add_plan_price*10)}}
                                        </span>ریال
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    تخفیف
                                </td>
                                <td>
                                    @if($reserve->off_id)
                                    <span class="final_sum">
                                        <span
                                            class="duration_sum">{{$off_m=$reserve->off()->first()->name}}
                                        </span>
                                        به میزان
                                        <span class="text text-danger">
                                            {{number_format($reserve->off*10)}} -
                                        ریال

                                        </span>
                                    </span>
                                    @endif

                                </td>
                            </tr>
                        </tbody>
                        <tfoot>

                            <tr>


                                <td class="text text- " id="off_td">
                                    جمع خدمات:
                                    {{number_format((($reserve->price)+$reserve->off)*10)}}
                                    ریال
                                </td>
                            </tr>

                            <tr>
                                <td class="text text-danger" id="off_td">
                                    تخفیف:
                                    -{{number_format($reserve->off*10)}}
                                    ریال

                                </td>
                            </tr>
                            <tr>
                                <td class="final_sum text text-success">
                                    جمع کل:
                                    {{number_format($reserve->price*10)}}
                                    ریال

                                </td>
                            </tr>

                            <tr>
                                <td class="more_in"  style="display: none">


                                </td>

                                <td class="" style="display: ">
                                    <span class="btn btn-info w-100" id="show_more">
                                        پرداخت
                                    </span>

                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <!-- .invoice-bills -->
        </div>
        <!-- .invoice-wrap -->
    </div>
    <div class="more_in" style="display: none">

    <div class="row">
        <div class="col-lg-6">

            <p class="alert alert-danger mt-4">

                لطفا بعد از واریز وجه به یکی از شماره حساب  های زیر تصویر
                فیش واریزی رو در قسمت زیر ارسال کنید تا رزرو شما تایید شود
                <br>

                توجه داشته در صورت عدم پرداخت و ثبت رسید تا قبل از {{$ho}} ساعت
                رزرو شما از سامانه به صورت اتوماتیک حذف خواهد شد
            </p>



            <p>
                شماره حساب مجموعه :
            <h6 class="text text-success copy small mb-0" data-copy="IR-460570029280000463905001">
                IR-460570029280000463905001

                به نام حسینیه سائلان اباعبدالله
            </h6>
            <br>
            شماره کارت مجموعه :
            <h6 class="text text-success copy small mb-0" data-copy="5022-2913-0692-6831">
                5022-2913-0692-6831
                به نام حسینیه سائلان اباعبدالله

            </h6>
            <p class="text text-danger">
                ( روی شماره ها کلیک کنید کپی میشود )
            </p>
            </td>


            {{--  مهلت پرداخت حد اکثر تا ساعت
            <span class="text text-danger">{{$hour}}</span>
            می باشد  --}}
        </div>

    </div>

    </div>

</div>
