<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Day;
use App\Models\Off;
use App\Models\Food;
use App\Models\Plan;
use App\Models\Room;
use App\Models\Unit;
use App\Models\User;
use App\Models\Period;
use App\Models\Reserve;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{


    public function myreserve(Request $request)
    {

        $user = auth()->user();
        $reserves = $user->reserves()->latest()->paginate(10);
        return view('customer.myreserve', compact(["user", "reserves"]));
    }


    public function new_reserve(Request $request, Reserve $reserve)
    {
        $user = auth()->user();

        $max_day = (int) Setting::whereName("max_day")->first()->val;;
        $enter_message =   Setting::whereName("enter_message")->first()->val;;
        $exist_message =   Setting::whereName("exist_message")->first()->val;;
        $calandar_ad_day =   Setting::whereName("calandar_ad_day")->first()->val;;
        $plan = Plan::find($request->plan_id);
        $plan_start = null;
        $plan_end = null;
        $plan_id = $request->plan_id;
        $duration = null;
        if ($reserve->plan_id) {
            $plan_id = $reserve->plan_id;
            $plan = $reserve->plan;
        }
        if ($plan) {
            $plan_id = $plan->id;

            $plan_start = Carbon::parse($plan->start)->getTimestamp();
            $plan_end = Carbon::parse($plan->end)->getTimestamp();;
            $duration = Carbon::parse($plan->start)->diffInDays(Carbon::parse($plan->end));
            $en = Carbon::parse($plan->end);

            if (Carbon::now()->gt($en)) {
                toast()->error("این طرح به پایان رسیده است ");
                return redirect()->route('new.reserve', ['plan_id' => $plan->id]);
            }


            if (!$plan->active) {
                toast()->error("این طرح فعال نمی باشد  ");
                if (in_array($user->role, ["admin", "mate"])) {
                    return redirect()->route("reserves.index");
                }
                return redirect()->route("myreserve");
            }
        }


        if ($reserve->id && ($reserve->user->id != $user->id) &&  !in_array($user->role, ['admin', "mate"])) {
            toast()->warning("این نوبت برای شما نمی باشد ");
            return redirect()->route("myreserve");
        }

        if (in_array($reserve->status, ['confirmed', "receipt_updated"]) && $user->role == "customer") {
            toast()->warning("این نوبت قابلیت ویرایش ندارد ");
            if (in_array($user->role, ["admin", "mate"])) {
                return redirect()->route("reserves.index");
            }
            return redirect()->route("myreserve");
        }



        if ($request->isMethod('post')) {

            $role =  [
                'start' => $request->has('plan_id') ? 'nullable' : 'required',
                'end' => $request->has('plan_id') ? 'nullable' : 'required',


                'male' => "required",
                'female' => "required",
                'kids' => "required",
                'names' => "nullable",
                'bdates' => "nullable",
                'names' => "nullable",
                'code_melli' => "nullable",
                'mobiles' => "nullable",
                'plan_id' => "nullable",
            ];

            if (!$request->plan_id) {
                try {
                    $request->merge([
                        'start' => $user->convert_date($request->start),
                        'end' => $user->convert_date($request->end),
                    ]);
                } catch (Exception $e) {
                    toast()->error("تاریخ فقط از روی تقویم انتخاب شود ");
                    return redirect()->route('new.reserve', ['plan_id' => $plan_id]);
                }
            } else {

                $plan = Plan::find($request->plan_id);
                if ($reserve->plan) {
                    $plan = $reserve->plan;
                }
                $request->merge([
                    'start' => Carbon::parse($plan->start),
                    'end' => Carbon::parse($plan->end),
                ]);
            }
            $data = $request->validate($role);


            // if ($plan) {
            //     $allowedStartDate = $plan->start; // مثلاً تاریخ شروع مجاز
            //     $allowedEndDate = $plan->end;

            //     $role["start"] = [
            //         'required',
            //         'date',
            //         'after_or_equal:' . $allowedStartDate,
            //         'before_or_equal:' . $allowedEndDate,
            //     ];

            //     $role["end"] = [
            //         'required',
            //         'date',
            //         'after_or_equal:start',
            //         'before_or_equal:' . $allowedEndDate,
            //     ];
            // }
            if (in_array($user->role, ["admin", "mate"])) {
                $role['name'] = "required";
                $role['mobile'] = "required";
                $customer = User::whereMobile($request->mobile)->first();
                if (!$customer) {
                    $customer = User::create(
                        [
                            'name' => $request->name,
                            'mobile' => $request->mobile
                        ]
                    );
                    $customer->assignRole("customer");
                }
                $customer->update(['name' => $request->name]);
            }
            $data['who'] = "customer";

            if (in_array($user->role, ["admin", "mate"])) {
                $data['who'] = "admin";
            }



            $data['now'] = Carbon::now();
            $data['limit'] = $data['now']->copy()->addDays($max_day + $calandar_ad_day);
            $data['duration'] =    $data['start']->diffInDays($data['end']);
            $data['end']->subDay();



            // if ($data['now']->diffInDays($data['limit'])) {
            //     toast()->warning("حد اکثر  زمان رزرو از  تاریخ امروز " . $max_day . " روز  میباشد  ");
            //     return redirect()->back();
            // }

            $data['status'] = "pre_register";
            $data['pepole'] =     $data['male'] + $data['female'] + $data['kids'];

            if ($data['start']->greaterThan($data['end'])) {
                toast()->warning("تاریخ خروج از تاریخ ورود باید بزرگتر باشد");
                // return redirect()->route("new.reserve", $reserve->id);
                return redirect()->route('new.reserve', ['plan_id' => $plan_id]);
            }

            // dd( $data['duration']);

            if ($data['duration'] > $max_day) {
                toast()->warning("حد اکثر  زمان رزرو  " . $max_day . " روز  میباشد  ");
                return redirect()->route("new.reserve", ['plan_id' => $plan_id]);
            }


            if ($data['end']->greaterThan($data['limit'])) {
                toast()->warning("   زمان شروع سفر را از تقویم انتخاب کنید   ");
                return redirect()->route("new.reserve", ['plan_id' => $plan_id]);
            }
            //    dd( $data);
            $data['mobiles'] = $request->mobiles ?? [];
            $data['names'] = $request->names ?? [];
            $data['bdates'] = $request->bdates ?? [];
            $data['code_melli'] = $request->code_melli ?? [];
            $arrays = [
                $data['names'],
                $data['bdates'],
            ];
            for ($i = 0; $i < sizeof($data['names']); $i++) {
                $ar["names"][] = $data['names'][$i];
                $ar["bdates"][] = $data['bdates'][$i];
            }
            $data['companions'] = json_encode($ar);


            if ($plan) {
                $data['plan_id'] = $plan->id;
            }

            if ($reserve->id) {
                $reserve->update($data);
            } else {
                if (in_array($user->role, ["admin", "mate"])) {
                    $reserve =  $customer->reserves()->create($data);
                } else {
                    $reserve = $user->reserves()->create($data);
                }
            }

            session()->put('reserve1', $data);
            return redirect()->route("new.reserve2", $reserve->id);
        }



        $periods = Period::where('active', 1)->whereHas('days', function ($query) {
            $query->where('day', '>=', Carbon::today());
        })->get();

        $calandar_ad_day = Setting::whereName("calandar_ad_day")->first()->val;;
        $food_price = Setting::whereName("food_price")->first()->val;;
        $price_together = Setting::whereName("together_price")->first()->val;;
        $turn_off_treserve = Setting::whereName("turn_off_treserve")->first();
        $dinar_price = Setting::whereName("dinar_price")->first()->val;

        $deactive_warning = Setting::whereName("deactive_warning")->first();
        $max_day = Setting::whereName("max_day")->first();
        if ($user->role == "customer" && !$turn_off_treserve->val) {
            toast()->warning($deactive_warning->val);
            return redirect()->route("myreserve");
        }


        $now = Carbon::now();
        $user = auth()->user();
        if (!$user->name) {
            toast()->warning("ابتدا پروفایل خود را کامل کنید");
            return redirect()->route('profile');
        }
        if ($price_together) {
            $data['price_together'] = $price_together;
            $data['room_price'] = $price_together;
            $data['room_price'] *= $dinar_price;
        } else {
            $price_together = 0;
        }


        // if( $data['type']=="single"){
        //     final=(duration*price)+(all_food)
        // }else{
        //     final=(duration*price*all_pepole)
        // }




        return view('customer.new_reserve', compact([
            "user",
            "calandar_ad_day",
            "now",
            "price_together",
            "max_day",
            "duration",
            "enter_message",
            "exist_message",
            "plan",
            "plan_start",
            "plan_end",
            "dinar_price",
            "food_price",
            "periods",
            "reserve",
            "plan_id"
        ]));
    }



    public function new_reserve2(Request $request, Reserve $reserve)
    {


        $user = auth()->user();



        $start = Carbon::parse($reserve->start);
        $end = Carbon::parse($reserve->end);
        $daysDifference = $start->diffInDays($end);
        if ($reserve->user->id != $user->id &&   !in_array($user->role, ['admin', "mate"])) {
            toast()->warning("این نوبت برای شما نمی باشد ");
            return redirect()->route("myreserve");
        }


        $price_together = Setting::whereName("together_price")->first()->val;;
        $together_limit = (int) Setting::whereName("together_limit")->first()->val;;
        $single_limit = (int) Setting::whereName("single_limit")->first()->val;;
        $male = $reserve->male;
        $female = $reserve->female;
        if ($request->isMethod('post')) {
            if (in_array($reserve->status, ['confirmed', "receipt_updated"]) && $user->role == "customer") {
                toast()->warning("این نوبت قابلیت ویرایش ندارد ");
                if (in_array($user->role, ["admin", "mate"])) {
                    return redirect()->route("reserves.index");
                }
                return redirect()->route("myreserve");
            }
            if (!$request->type) {
                toast()->error(" لطفا نوع اتاق خود را مشخص کنید    ");
                return redirect()->back();
            }
            $remain_singles = Room::whereType("single")->whereActive("1")
                ->whereDoesntHave('reserves', function ($query) use ($start, $end) {
                    $query->whereIn("status", ["not_confirm", "confirmed"])->where(function ($query) use ($start, $end) {
                        $query->whereBetween('start', [$start, $end])
                            ->orWhereBetween('end', [$start, $end])
                            ->orWhere(function ($query) use ($start, $end) {
                                $query->where('start', '<=', $start)
                                    ->where('end', '>=', $end);
                            });
                    });
                })
                ->count();


            if ($request->type === 'single') {
                $message = "  تمام اتاق های vip
                در این تاریخ پر می باشد
                                ";
                if ($remain_singles) {

                    $message = "هنوز اتاق vip
                    انتخاب نکرده ای
                                    ";
                }




                $data = $request->validate([
                    'type' => "required",
                    'single' => 'required',
                ], [
                    'single.required' => $message,

                ]);

                if ($request->single) {
                    $sum_capacity = Room::whereIn("id", $request->single)->sum("capacity");
                    if ($reserve->pepole > $sum_capacity) {
                        toast()->warning(" افراد گروه بیشتر از ظرفیت اتاق انتخاب شماست    ");
                        return redirect()->route("new.reserve2", $reserve->id);
                    }
                }



                if ($daysDifference > $single_limit  && !$reserve->plan_id) {
                    toast()->warning(" حدکثر مدت اسکان   وی ای پی $single_limit روز   میباشد   ");
                    return redirect()->route("new.reserve", $reserve->id);
                }
            }
            if ($request->type === 'together') {
                $validator = Validator::make($request->all(), [
                    'together_female' => 'nullable', // همیشه الزامی است وقتی type 'together' باشد
                    'together_male' => 'nullable',
                    // 'single' => 'required_if:type,single',
                    'type' => "required",    // همیشه الزامی است وقتی type 'together' باشد
                ]);

                $validator->sometimes('together_female', 'required', function ($input) {
                    return ($input->female > 0) && ($input->type = "together");
                });

                $validator->sometimes('together_male', 'required', function ($input) {
                    return ($input->male > 0) && ($input->type = "together");
                });




                if ($daysDifference > $together_limit && !$reserve->plan_id) {
                    toast()->warning(" حدکثر مدت اسکان حسینه ای $together_limit روز   میباشد   ");
                    return redirect()->route("new.reserve", $reserve->id);
                }

                // بررسی درستی ولایتیشن و آن را به داده ها اضافه می‌کند
                $data = $validator->validate();
            }
            $reserve->rooms()->sync([]);
            if ($data['type'] == "single") {
                $reserve->rooms()->attach($data['single']);
            }
            if ($data['type'] == "together") {
                if ($male) {
                    $reserve->rooms()->attach($data['together_male'], ['pepole' => $reserve->male]);
                }
                if ($female) {
                    $reserve->rooms()->attach($data['together_female'], ['pepole' => $reserve->female]);
                }
            }
            $reserve->update($data);
            return redirect()->route("new.reserve3", $reserve->id);
        }

        // dump($se);



        $food_price = Setting::whereName("food_price")->first()->val;;
        $dinar_price = Setting::whereName("dinar_price")->first()->val;

        $user = auth()->user();
        $start = $reserve->start;
        $end = $reserve->end;

        // $singles = Room::whereType("single")->whereActive("1")

        //     // ->whereDoesntHave('reserves', function ($query) use ($start, $end) {
        //     //     $query->whereIn("status", ["not_confirm", "confirmed"])->where(function ($query) use ($start, $end) {
        //     //         $query->whereBetween('start', [$start, $end])
        //     //             ->orWhereBetween('end', [$start, $end])
        //     //             ->orWhere(function ($query) use ($start, $end) {
        //     //                 $query->where('start', '<=', $start)
        //     //                     ->where('end', '>=', $end);
        //     //             });
        //     //     });
        //     // })

        //     ->get();




        // $togethers_male =
        //     Room::whereType("together")->whereGender("male")->whereActive("1")

        //     // ->with(['reserves' => function ($query) use ($start, $end) {
        //     //     $query->whereIn("status", ["not_confirm", "confirmed"])->where(function ($query) use ($start, $end) {
        //     //         $query->whereBetween('start', [$start, $end])
        //     //             ->orWhereBetween('end', [$start, $end])
        //     //             ->orWhere(function ($query) use ($start, $end) {
        //     //                 $query->where('start', '<=', $start)
        //     //                     ->where('end', '>=', $end);
        //     //             });
        //     //     });
        //     // }])
        //     // ->select('rooms.*')
        //     ->get();


        // ->filter(function ($room) use ($male) {
        //     $totalPeople = $room->reserves->sum(function ($reserve) {
        //         return $reserve->pivot->pepole; // جمع تعداد افراد
        //     });
        //     return ($totalPeople + $male) <= $room->capacity;
        // });
        // $togethers_female =
        //     Room::whereType("together")->whereGender("female")->whereActive("1")

        //     // ->with(['reserves' => function ($query) use ($start, $end) {
        //     //     $query->whereIn("status", ["not_confirm", "confirmed"])->where(function ($query) use ($start, $end) {
        //     //         $query->whereBetween('start', [$start, $end])
        //     //             ->orWhereBetween('end', [$start, $end])
        //     //             ->orWhere(function ($query) use ($start, $end) {
        //     //                 $query->where('start', '<=', $start)
        //     //                     ->where('end', '>=', $end);
        //     //             });
        //     //     });
        //     // }])
        //     // ->select('rooms.*')
        //     ->get();
        // ->filter(function ($room) use ($female) {
        //     // محاسبه تعداد افراد رزرو شده
        //     $totalPeople = $room->reserves->sum(function ($reserve) {
        //         return $reserve->pivot->pepole; // جمع تعداد افراد
        //     });

        //     // بررسی اینکه آیا ظرفیت اتاق کافی است
        //     return ($totalPeople + $female) <= $room->capacity;
        // });

        // $allow = true;
        // if (!$male) {
        //     $togethers_male = [];
        // }
        // if (!$female) {
        //     $togethers_female = [];
        // }

        // if ($male && !$togethers_male->count()) {
        //     $allow = false;
        // }
        // if ($female && !$togethers_female->count()) {
        //     $allow = false;
        // }
        $ids = [];
        if ($reserve->plan) {
            $ids = $reserve->plan->rooms()->pluck("id")->toArray();
        }

        $single_units = Unit::where('active', 1)->whereHas("rooms", function ($q) {
            $q->whereType("single");
        })->get();
        $together_units = Unit::where('active', 1)->whereHas("rooms", function ($q) {
            $q->whereType("together");
        })->get();

        return view('customer.new_reserve2', compact([
            "user",
            "food_price",
            "dinar_price",
            "price_together",
            "start",
            "end",
            "reserve",
            "single_units",
            "together_units",
            "ids",

        ]));
    }

    public function new_reserve3(Request $request, Reserve $reserve)
    {

        $user = auth()->user();


        if ($reserve->user->id != $user->id  &&  !in_array($user->role, ['admin', "mate"])) {
            toast()->warning("این نوبت برای شما نمی باشد ");
            return redirect()->route("myreserve");
        }

        $food_price = Setting::whereName("food_price")->first()->val;;
        $dinar_price = Setting::whereName("dinar_price")->first()->val;
        $price_together = Setting::whereName("together_price")->first()->val;;
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $reserve->foods()->sync([]);
            $data = $request->validate([
                'off_id' => "nullable",
                'shahid_name' => "nullable",
                'food' => "required",
                'lunch_count' => "nullable",
                'lunch_foods' => "nullable",
                'lunch_date' => "nullable",
                'dinner_count' => "nullable",
                'dinner_foods' => "nullable",
                'dinner_date' => "nullable",
                'breakfast_count' => "nullable",
                'breakfast_foods' => "nullable",
                'breakfast_date' => "nullable",
            ]);

            $data['f_price'] = 0;
            $reserve->foods()->sync([]);
            if (($request->lunch_foods)) {

                if ($request->food) {
                    foreach ($data['lunch_foods'] as $key => $val) {
                        $count = $data['lunch_count'][$key];
                        $day = $data['lunch_date'][$key];
                        $food_id = $data['lunch_foods'][$key];
                        if ($count) {
                            $food = Food::find($food_id);
                            $price = $food->price * $dinar_price;
                            $sum = $count * $price;
                            $data['f_price'] += $sum;

                            $reserve->foods()->attach($food_id, ['type' => "lunch", 'count' => $count, "day" => $day, "sum" => $sum, "price" => $price]);
                        }
                    }
                    foreach ($data['dinner_foods'] as $key => $val) {
                        $count = $data['dinner_count'][$key];
                        $day = $data['dinner_date'][$key];
                        $food_id = $data['dinner_foods'][$key];
                        if ($count) {
                            $food = Food::find($food_id);
                            $price = $food->price * $dinar_price;
                            $sum = $count * $price;
                            $data['f_price'] += $sum;
                            $reserve->foods()->attach($food_id, ['type' => "dinner", 'count' => $count, "day" => $day, "sum" => $sum, "price" => $price]);
                        }
                    }
                    foreach ($data['breakfast_foods'] as $key => $val) {
                        $count = $data['breakfast_count'][$key];
                        $day = $data['breakfast_date'][$key];
                        $food_id = $data['breakfast_foods'][$key];
                        if ($count) {
                            $food = Food::find($food_id);
                            $price = $food->price * $dinar_price;
                            $sum = $count * $price;
                            $data['f_price'] += $sum;
                            $reserve->foods()->attach($food_id, ['type' => "breakfast", 'count' => $count, "day" => $day, "sum" => $sum, "price" => $price]);
                        }
                    }
                }
            } else {
                if ($request->food) {
                    $food_price = Setting::whereName("food_price")->first()->val;;
                    $food_price = (int)$food_price *   (int)$dinar_price;
                    $data['f_price'] = $food_price * $reserve->duration * $reserve->pepole;
                }
            }

            if (!$request->off_id) {
                $data['off_id'] = 4;
            }
            if ($data['off_id'] == 10 && $data['shahid_name']) {
                $data['off_id'] == 10;
            }

            if ($reserve->type == "together") {
                $data['off_id'] = null;
            }
            $reserve->update($data);




            $data['start'] = $reserve->start;
            $data['end'] = $reserve->end;
            $data['mobiles'] = $reserve->mobiles;
            $data['single'] = $reserve->rooms()->pluck("id")->toArray();
            $data['together_female'] = $reserve->together_female;
            $data['together_male'] = $reserve->together_male;
            $data['names'] = $reserve->names;
            $data['bdates'] = $reserve->bdates;
            $data['male'] = $reserve->male;
            $data['female'] = $reserve->female;
            $data['type'] = $reserve->type;
            $data['food'] = $reserve->food;
            $data['duration'] = $reserve->duration;
            // $data['off_id'] = $reserve->off_id;
            $data['start'] = $reserve->start;
            $data['end'] = $reserve->end;
            $data['pepole'] = $reserve->pepole;
            $male = $data['male'];
            $start =    $data['start'];
            $end =    $data['end'];
            $female = $data['female'];
            $data['off'] = 0;

            if (!$reserve->plan) {

                if ($data['off_id']) {
                    $data['off'] =   Off::find($data['off_id']);
                    if ($data['off']) {
                        $data['off'] =  $data['off']->price;
                    }
                }
                if ($data['type'] == "single") {
                    $data['room_price'] = Room::whereIn('id', $data['single'])->sum('price');
                    $data['room_price'] *= $dinar_price;
                    $data['stay_price'] = $data['duration'] * $data['room_price'];
                } else {
                    $data['room_price'] = $user->price_together();
                    $data['stay_price'] = (int)$data['duration'] * $data['room_price'] * $data['pepole'];
                }




                $days = Day::where('day', '>=', Carbon::today())->whereHas('period', function ($query) {
                    $query->whereActive('1');
                })->pluck("day")->toArray();
                $s_period = Carbon::parse($data['start']);
                $e_period = Carbon::parse($data['end']);
                $maindays = [];
                while ($s_period->lte($e_period)) {
                    $maindays[] = $s_period->toDateString() . " 00:00:00"; // تاریخ را به فرمت YYYY-MM-DD اضافه می‌کنیم
                    $s_period->addDay(); // یک روز به تاریخ اضافه می‌کنیم
                }
                array_pop($maindays);
                $commonElements = array_intersect($days, $maindays);
                $commonCount = count($commonElements);
                $percent = 0;
                foreach ($commonElements as $k => $val) {
                    $d = Day::where("day", $val)->first();
                    if ($d) {
                        $percent = $d->period->percent;
                    }
                }


                // dump($data);
                if ($percent && $commonCount) {
                    $unit_day = $data['stay_price'] /      $data['duration'];
                    $remain_day = $data['duration'] - $commonCount;
                    $remain_skan = $remain_day *   $unit_day;
                    $unit_day *=     $commonCount;
                    $unit_day += ($unit_day * $percent) / 100;
                    $data['stay_price'] = $remain_skan + $unit_day;
                }


                $data['price'] = ($data['stay_price']) + ($data['f_price']);
                $data['add_plan_price'] = 0;
                if ($reserve->plan) {
                    $percent = $reserve->plan->percent;
                    $add_plan_price = ($percent * $data['price']) / 100;
                    $data['price'] += $add_plan_price;
                    $data['add_plan_price'] = $add_plan_price;
                }
                $data['off'] = ((int)$data['price'] * (int)$data['off']) / 100;
                $data['price'] -=  $data['off'];
            } else {
                $data['stay_price'] = $reserve->plan->price;
                $data['price'] = $data['stay_price'] + $data['f_price'];
                $data['off'] = 0;
                $reserve->update($data);
            }



            // $arrays = [
            //     $data['mobiles'],
            //     $data['names'],
            //     $data['bdates'],
            // ];
            // for ($i = 0; $i < sizeof($data['mobiles']); $i++) {
            //     $ar["mobile"][] = $data['mobiles'][$i];
            //     $ar["names"][] = $data['names'][$i];
            //     $ar["bdates"][] = $data['bdates'][$i];
            // }
            // $data['companions'] = json_encode($ar);

            $togethers_male =
                Room::whereType("together")->whereGender("male")->whereActive("1")->with(['reserves' => function ($query) use ($start, $end) {
                    $query->whereIn("status", ["not_confirm", "confirmed"])->where(function ($query) use ($start, $end) {
                        $query->whereBetween('start', [$start, $end])
                            ->orWhereBetween('end', [$start, $end])
                            ->orWhere(function ($query) use ($start, $end) {
                                $query->where('start', '<=', $start)
                                    ->where('end', '>=', $end);
                            });
                    });
                }])
                ->select('rooms.*')
                ->get()
                ->filter(function ($room) use ($male) {
                    $totalPeople = $room->reserves->sum(function ($reserve) {
                        return $reserve->pivot->pepole; // جمع تعداد افراد
                    });
                    return ($totalPeople + $male) <= $room->capacity;
                });
            $togethers_female =
                Room::whereType("together")->whereGender("female")->whereActive("1")->with(['reserves' => function ($query) use ($start, $end) {
                    $query->whereIn("status", ["not_confirm", "confirmed"])->where(function ($query) use ($start, $end) {
                        $query->whereBetween('start', [$start, $end])
                            ->orWhereBetween('end', [$start, $end])
                            ->orWhere(function ($query) use ($start, $end) {
                                $query->where('start', '<=', $start)
                                    ->where('end', '>=', $end);
                            });
                    });
                }])
                ->select('rooms.*')
                ->get()
                ->filter(function ($room) use ($female) {
                    $totalPeople = $room->reserves->sum(function ($reserve) {
                        return $reserve->pivot->pepole; // جمع تعداد افراد
                    });
                    return ($totalPeople + $female) <= $room->capacity;
                });
            $allow = true;
            if (!$male) {
                $togethers_male = [];
            }
            if (!$female) {
                $togethers_female = [];
            }

            if ($male && !$togethers_male->count() && $data['type'] == "together") {
                $allow = false;
            }
            if ($female && !$togethers_female->count() && $data['type'] == "together") {
                $allow = false;
            }
            $reserve_id = null;

            if ($allow) {
                $reserve->update($data);
            } else {
                if ($data['type'] != "single") {
                    toast()->error("لطفا همه  اتاق ها را برای همه جنسیت ها انتخاب کنید ");
                    return redirect()->route("new.reserve", $reserve->id);
                }
            }
            return redirect()->route("new.reserve4", $reserve->id);
        }
        return view('customer.new_reserve3', compact([
            "user",
            "reserve",
            "food_price",
            "dinar_price",
            "price_together",

        ]));
    }


    public function new_reserve4(Request $request, Reserve $reserve)
    {
        $user = auth()->user();




        if ($reserve->user->id != $user->id  &&   !in_array($user->role, ['admin', "mate"])) {
            toast()->warning("این نوبت برای شما نمی باشد ");
            return redirect()->route("myreserve");
        }
        $food_price = Setting::whereName("food_price")->first()->val;;
        $dinar_price = Setting::whereName("dinar_price")->first()->val;
        $price_together = Setting::whereName("together_price")->first()->val;;
        $user = auth()->user();
        $now = Carbon::now();
        $max_time_for_delete_reserve = Setting::whereName("max_time_for_delete_reserve")->first();
        $ho = (int) $max_time_for_delete_reserve->val;
        $hour = Carbon::parse($reserve->created_at)->addHours($ho);
        $hour = jdate($hour)->format("H:i:s d-m-Y ");


        if ($request->isMethod('post')) {
            if (in_array($reserve->status, ['confirmed', "receipt_updated"]) && $user->role == "customer") {
                toast()->warning("این نوبت قابلیت ویرایش ندارد ");
                if (in_array($user->role, ["admin", "mate"])) {
                    return redirect()->route("reserves.index");
                }
                return redirect()->route("myreserve");
            }
            $data = $request->validate([
                'receipt' => "required|image|mimes:jpeg,png,jpg|max:3072"
            ]);
            if ($request->hasFile('receipt')) {
                $image = $request->file('receipt');
                $name_img = 'receipt' . $reserve->id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/media/reserve/'), $name_img);
                if ($reserve->type == "single") {
                    foreach ($reserve->rooms as $room) {
                        if (! $room->remain_single($reserve->start, $reserve->end)) {
                            toast()->error("ظرفیت اتاق انتخابی در حین رزرو پر شده است ");
                            return redirect()->route("new.reserve", $reserve->id);
                        }
                    }
                }
                if ($reserve->type == "together") {
                    foreach ($reserve->rooms as $room) {
                        if ($room->gender == "male") {
                            if ($reserve->male > $room->remain_together($reserve->start, $reserve->end)) {
                                toast()->error("ظرفیت اتاق انتخابی در حین رزرو پر شده است ");
                                return redirect()->route("new.reserve", $reserve->id);
                            }
                        } else {
                            if (($reserve->female + $reserve->kids) > $room->remain_together($reserve->start, $reserve->end)) {
                                toast()->error("ظرفیت اتاق انتخابی در حین رزرو پر شده است ");
                                return redirect()->route("new.reserve", $reserve->id);
                            }
                        }
                    }
                }
                $reserve->update([
                    'receipt' => $name_img,
                    'status' => "receipt_updated",
                ]);
                $data['token'] = $reserve->user->name;
                $data['token2'] = $reserve->id;
                $reserve->user->sms($reserve->user->mobile, $data, "reserve-confirmed");
                $reserve->user->sms("09101376432", $data, "admin-new-reserve");
                // $reserve->update([
                //         'price'=>$reserve->price+$reserve->add_plan_price
                //     ]);
                toast()->success("نوبت با موفقیت ثبت شد ");
                if (in_array($user->role, ["admin", "mate"])) {
                    $user->logy([
                        'user_id' => $user->id,
                        'logable_id' => $reserve->id,
                        'type' =>   "reserve_create",
                        'logable_type' =>   "reserve",
                        'old' =>   json_encode([]),
                        'new' =>   json_encode($reserve->toArray()),
                    ]);
                    return redirect()->route("reserves.index");
                }
                return redirect()->route("myreserve");
            }
            $data['status'] = "not_confirm";
            if (in_array($user->role, ["admin", "mate"])) {
                $data['status'] = "confirmed";
            }
            $reserve->update($data);

            $reserve_id = $reserve->id;
            toast()->success("نوبت با موفقیت ثبت شد ");
            if (in_array($user->role, ["admin", "mate"])) {
                return redirect()->route("reserves.index");
            }
            $data['token'] = $reserve->user->name;
            $data['token2'] = $reserve->id;
            $reserve->user->sms($reserve->user->mobile, $data, "go-pay");
            return redirect()->route("myreserve");
        }
        return view('customer.new_reserve4', compact([
            "user",
            "reserve",
            "food_price",
            "dinar_price",
            "price_together",
            "now",
            "ho",
            "hour",

        ]));
    }


    public function reserve_receipt(Request $request, Reserve $reserve)
    {

        $user = auth()->user();
        if ($request->isMethod('post')) {
            if ($request->hasFile('receipt')) {
                $image = $request->file('receipt');
                $name_img = 'receipt' . $reserve->id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/media/reserve/'), $name_img);
                $reserve->update([
                    'receipt' => $name_img,
                    'status' => "receipt_updated",
                ]);
                $data['token'] = $reserve->user->name;
                $data['token2'] = $reserve->id;
                $reserve->user->sms($reserve->user->mobile, $data, "reserve-confirmed");
                $reserve->user->sms("09101376432", $data, "admin-new-reserve");
                toast()->success("رسید با موفقیت ذخیره شد ");
                return redirect()->route("myreserve");
            }
        }
        $user = auth()->user();
        if ($reserve->user->id != $user->id  &&  !in_array($user->role, ['admin', "mate"])) {
            toast()->warning("این نوبت برای شما نمی باشد ");
            return redirect()->route("myreserve");
        }
        $max_time_for_delete_reserve = Setting::whereName("max_time_for_delete_reserve")->first();
        // dd($max_time_for_delete_reserve->val);
        $ho = (int) $max_time_for_delete_reserve->val;
        $hour = Carbon::parse($reserve->created_at)->addHours($ho);
        $hour = jdate($hour)->format("H:i:s d-m-Y ");
        $now = Carbon::now();
        return view('customer.reserve_receipt', compact(["reserve", "hour", "ho", "user", "now"]));
    }

    public function profile(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => "required|min:3",
                'family' => "required|min:3",
                'melli_code' => "nullable",

            ]);
            $user->update($data);
            toast()->success("اطلاعات با موفقیت ذخیره شد  ");
            return  redirect()->route("myreserve");
        }
        $now = Carbon::now()->format("Y-m-d");
        return view('customer.profile', compact(["user", "now"]));
    }
}
