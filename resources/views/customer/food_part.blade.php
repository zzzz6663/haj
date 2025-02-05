<h6>
    مدت سفر شما
    <span class="duration_sum">{{$reserve->duration}}</span>
    روز میباشد
    آیا مایل به دریافت غذادر این مدت هستید؟
    <br> <br>
    هزینه سه وعده غذا برای هر نفر در شبانه روز
</h6>
<ul class="">
    <li class="mb-3">
        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
            <input type="radio" class="custom-control-input" name="food"
                {{old("food",$reserve->food)==1?"checked":""}}
            value="1" id="food1">
            <label class="custom-control-label " for="food1">
                غذا رو به سفارش اضافه میکنم
                <i class="fas fa-utensils"></i>
            </label>
        </div>
    </li>
    <li class="mb-3">
        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
            <input type="radio" class="custom-control-input" name="food" data-p="0"
                {{old("food",$reserve->food)===0?"checked":""}}
            value="0" id="food2">
            <label class="custom-control-label " for="food2">
                غذا نمیخوام
                <span class="icon-stack">
                    <i class="fas fa-ban overlay"></i>
                </span>

            </label>
        </div>
    </li>
</ul>

{{--
<div id="food_secs" style="display: {{old(" food",$reserve->food)?"":"none"}}">
    <h6>
        تعداد پرس غذا در هر وعده را در
        کادر زیر بنویسید
    </h6>
    <div class=" table-responsive spes">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">روز</th>
                    <th scope="col">صبحانه</th>
                    <th scope="col">ناهار</th>
                    <th scope="col">شام </th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0;$i<=$reserve->duration;$i++)
                    @php
                    $st=Carbon\Carbon::parse($reserve->start);
                    $dayOfWeek= $st->dayOfWeek;
                    $st->addDays( $i);
                    $day_of_week= $user->day_of_week($st);
                    $jt=jdate( $st);
                    $breakfast=${"breakfast_".$day_of_week};
                    $dinner=${"dinner_".$day_of_week};
                    $lunch=${"lunch_".$day_of_week};
                    @endphp
                    <tr class="pars">
                        <td>
                            {{ $jt->format('%A %d %B ')}}
                        </td>
                        <td>
                            @if($i!=0)

                            <label for="breakfast{{$breakfast->id}}">{{$breakfast->food->name}}
                            </label>
                            <input type="number" class="form-control  active sum_p "
                                id="breakfast{{$breakfast->id}}"
                                data-price="{{$breakfast->info*$dinar_price->val}}" value="{{$reserve->meal($st,"breakfast")}}"
                                placeholder=" " pattern="[0-9]" name="breakfast_count[]">
                            <input type="text" name="breakfast_foods[]"
                                value="{{$breakfast->food->id}}" hidden>
                            <input type="text" name="breakfast_date[]" value="{{ $st}}" hidden>
                            <span class="text text-info text-small">
                                {{number_format($dinar_price->val*$breakfast->info)}}
                                تومان
                            </span>
                            @else
                            <br>
                            <span class="text text-success">
                                صبحانه روز اول در صبح اخرین روز سرو میشود
                            </span>
                            @endif
                        </td>
                        <td>
                            @if($i!=$reserve->duration)
                            <label for="lunch{{$lunch->id}}">{{$lunch->food->name}}
                            </label>
                            <input type="number" class="form-control  active sum_p"
                                id="lunch{{$lunch->id}}"
                                data-price="{{$lunch->info*$dinar_price->val}}" value="{{$reserve->meal($st,"lunch")}}"
                                placeholder=" " pattern="[0-9]*" name="lunch_count[]">
                            <input type="text" name="lunch_foods[]" value="{{$lunch->food->id}}"
                                hidden>
                            <input type="text" name="lunch_date[]" value="{{ $st}}" hidden>
                            <span class="text text-info text-small">
                                {{number_format($dinar_price->val*$lunch->info)}}
                                تومان
                            </span>
                            @endif
                        </td>
                        <td>
                            @if($i!=$reserve->duration)
                            <label for="dinner{{$dinner->id}}">{{$dinner->food->name}}

                            </label>
                            <input type="number" class="form-control  active sum_p"
                                id="dinner{{$dinner->id}}"
                                data-price="{{$dinner->info*$dinar_price->val}}" value="{{$reserve->meal($st,"dinner")}}"
                                placeholder=" " pattern="[0-9]*" name="dinner_count[]">

                            <input type="text" name="dinner_foods[]"
                                value="{{$dinner->food->id}}" hidden>
                            <input type="text" name="dinner_date[]" value="{{ $st}}" hidden>
                            <span class="text text-info text-small">
                                {{number_format($dinar_price->val*$dinner->info)}}
                                تومان
                            </span>
                            @endif

                        </td>
                    </tr>
                    @endfor

            </tbody>
        </table>

    </div>
</div>  --}}
