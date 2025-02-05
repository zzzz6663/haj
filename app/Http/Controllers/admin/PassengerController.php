<?php

namespace App\Http\Controllers\admin;

use PDF;
use Exception;
use Carbon\Carbon;
use App\Models\Attr;
use App\Models\Drug;
use App\Models\User;
use App\Models\Karevan;
use App\Models\Province;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Exports\PassengerExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // dd(Karevan::where('KarevanNo', 1212)->first());

        $user = auth()->user();



        $users = User::query();
        $users->where('role',  "passenger");

        if ($request->search) {
            $search = $request->search;
            $users->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('family', 'LIKE', "%{$search}%")
                    ->orWhere('cell', 'LIKE', "%{$search}%")
                    ->orWhere('JobTitle', 'LIKE', "%{$search}%");
            });
        }

        // دریافت ورودی‌های معتبر
        $inputs = $request->except(['_token', "karevan_id", '_method', "page", "province_id", "passenger_id", 'search', "BirthDate44min", "BirthDate44max", "Excel", "pdf", "status"]);

        if ($request->BirthDate44min) {
            $bmin = $user->convert_date3($request->BirthDate44min);
            $users->where("BirthDate", ">",   $bmin);
        }
        if ($request->BirthDate44max) {
            $bmax = $user->convert_date3($request->BirthDate44max);
            $users->where("BirthDate", "<",   $bmax);
        }
        // dd($request->all());
        if ($request->status) {
            $users->where("status", $request->status);
        }
        if ($request->province_id) {
            $users->whereHas("karevan", function ($qu) use ($request) {
                $qu->where("ProvinceID", $request->province_id);
            });
        }
        if ($request->passenger_id) {
            $users->where("id", $request->passenger_id);
        }
        if ($request->karevan_id) {
            $users->where("KarevanID", $request->karevan_id);
        }
        //    dd($request->all());
        //    dd($inputs);
        // foreach ($inputs as $key => $val) {
        //     if (!$val) continue;
        //     $keyParts = explode("___", $key);
        //     $operator = count($keyParts) === 2 && $keyParts[1] === 'min' ? '>' : '<';
        //     // dd(    $operator );

        //     $users->whereHas('attrs', function ($query) use ($keyParts, $val, $operator) {
        //         if (sizeof($keyParts) == 1) {

        //             $query->where('name', $keyParts[0])
        //                 ->where('value', $val);
        //         } else {
        //             $query->where('name', $keyParts[0])
        //                 ->where('value', $operator ?? '=', $val);
        //         }
        //     });
        // }

        if ($user->role == "provincialAgent") {
            $users->whereHas("karevan", function ($q) use ($user) {
                $q->where("ProvinceID", $user->province_id);
            });
        }
        if ($user->role == "provincialSupervisor") {
            $users->whereHas("karevan", function ($q) use ($user) {
                $q->whereIn("ProvinceID", $user->provinces()->pluck("id")->toArray());
            });
        }


        if ($user->role == "doctor") {
            $users->whereHas("karevan", function ($q) use ($user) {
                $q->whereIn("karevanID", $user->karevans()->pluck("IDS")->toArray());
            });
        }




        if ($request->pdf) {
            $users = $users->orderBy('id', 'DESC')->latest()->paginate(100);
            $pdf = PDF::loadView('admin.passenger.pdf_passenger', compact(['users']));
            return $pdf->download('pdf_passenger.pdf');
        }
        if ($request->Excel) {
            $users =    $users->get();


            return Excel::download(new PassengerExport($users), 'pdf_passenger.xlsx');
        }
        // dd($users->toSql());
        $users = $users->sortable()
            // ->whereRole("customer")
            ->latest()->paginate(100);
        $statusArray = $keys = array_keys(__("status"));
        $all_status = $keys = (__("status"));
        $all_count = User::where('role', 'passenger')->count();

        $provinces_log = Province::with(['Karevans' => function ($query) use ($statusArray) {
            $query->whereHas('users', function ($query) use ($statusArray) {
                $query->where('role', 'passenger'); // فقط کاربران با نقش 'passenger'
            });
        }])->get()->map(function ($province) use ($all_count, $statusArray) {
            // dd($province);
            // یک آرایه برای ذخیره درصد کاربران فعال به تفکیک وضعیت‌ها
            $statusPercentages = [];

            foreach ($statusArray as $status) {
                $activeUsersCount = $province->Karevans->reduce(function ($carry, $karevan) use ($status) {
                    // dd($karevan->users);
                    return $carry + $karevan->users()
                        ->where('role', 'passenger') // فقط کاربران با نقش 'passenger'
                        ->where('status', $status) // فقط کاربران با وضعیت خاص
                        ->count();
                }, 0);

                $percentage = $all_count > 0 ? ($activeUsersCount / $all_count) * 100 : 0;

                // ذخیره درصد وضعیت خاص
                $statusPercentages[$status] = round($percentage, 2);
            }

            return [
                'province_name' => $province->name,
                'status_percentages' => $statusPercentages
            ];
        });
        // استخراج نتایج به صورت آرایه
        $provinces_list = $provinces_log->pluck('province_name')->toArray();
        $un_review = [];
        $medical_commission = [];
        $under_review = [];
        $rejected = [];
        $approved = [];
        $result_commission = [];
        foreach ($provinces_log as $value) {
            $st["un_review"][] = $value['status_percentages']['un_review'] ?? 0;
            $st["medical_commission"][] = $value['status_percentages']['medical_commission'] ?? 0;
            $st["under_review"][] = $value['status_percentages']['under_review'] ?? 0;
            $st["rejected"][] = $value['status_percentages']['rejected'] ?? 0;
            $st["approved"][] = $value['status_percentages']['approved'] ?? 0;
            $st["result_commission"][] = $value['status_percentages']['result_commission'] ?? 0;
        }



        return view('admin.passenger.all', compact(['users', "user", "provinces_list", "st", "all_status"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => "required",
            'title' => "required",
            'family' => "required",
            'province_id' => "required",
            'city_id' => "required",
            'admin_name' => "required",
            'mobile' => "required|unique:users,mobile",
            'job' => "required",
            'tell' => "required",
            'price' => "required",
            'visiting_hours' => "required",
            'confirm' => "required",
            'latitude' => "required",
            'longitude' => "required",
            'welfare' => "required",
            'address' => "required",
            'history' => "nullable",
            'avatar' => "nullable",
        ]);
        $data['role'] = "seller";
        $user = User::create($data);
        $user->assignRole('seller');
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = 'avatar_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
            $user->update([
                'avatar' => $name_img
            ]);
        }
        toast()->success("کاربر با موفقیت به  مجموعه اضافه شد ");
        return redirect()->route("user.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Request $request)
    {
        return view('admin.user.show', compact(["user"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Request $request)
    {
        return view('admin.user.edit', compact(["user"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => "required",
            'title' => "required",
            'family' => "required",
            'province_id' => "required",
            'city_id' => "required",
            'admin_name' => "required",
            'mobile' => "required|unique:users,mobile," . $user->id,
            'job' => "required",
            'tell' => "required",
            'price' => "required",
            'visiting_hours' => "required",
            'confirm' => "required",
            'latitude' => "required",
            'longitude' => "required",
            'welfare' => "required",
            'address' => "required",
            'history' => "nullable",
            'avatar' => "nullable",
        ]);
        $user->update($data);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = 'avatar_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
            $user->update([
                'avatar' => $name_img
            ]);
        }
        toast()->success("کاربر با موفقیت   ویرایش شد ");
        return redirect()->route("user.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function psssenger_commission_reslut(Request $request, User $user)
    {

        // if($request->status){
        //     $data=$request->validate([
        //         "status"=> "required",
        //         "commission_reason"=> "required_if:status,==,medical_commission",
        //     ]);
        //     $user->update($data);
        //     toast()->success(" وضعیت  با موفقیت به روز شد ");
        //     return redirect()->route("passenger.index",$user->id);
        // }
        // toast()->warning("لطفا وضعیت جدید را انتخابکنید ");
        // return redirect()->route("exam.user",$user->id);


        if ($request->hasFile('file_result')) {
            $testimage = $request->file('file_result');
            $name_img = time() . 'testimage_' . $user->id . '.' . $testimage->getClientOriginalExtension();
            $testimage->move(public_path('/media/commission_reslut/'), $name_img);
            $data['commission_reslut'] = $name_img;
            // $data['status'] = "result_commission";
            $user->update($data);
        }
        if ($request->commission_status) {
            $data['commission_status'] = $request->commission_status;
            $data['status'] = "result_commission";
            $user->update($data);
        }
        return response()->json([
            'status' => "ok"
        ]);
    }
    public function update_psssenger_status(Request $request, User $user)
    {
        // return response()->json([
        //     'status' => "nok",
        //     "req"=>$request->all()
        // ]);
        $data = [
            "status" => $request->status,
            "doctor_info" => $request->doctor_info,
            "commission_reason" => $request->commission_reason,
        ];
        if ($request->status == "medical_commission") {

            $data['commission_in'] =  1;
        }
        $status_before =  $user->status;
        $user->save_or_update("doctor_info", $request->doctor_info, "text");
        $current = auth()->user();
        $user->histories()->create([
            'doctor_id' => $current->id,
            "year" => jdate()->format("Y"),
            "status_before" => $status_before,
            "status_after" => $user->status,
            "type" => "change_doctor",
        ]);
        $user->update($data);
        return response()->json([
            'status' => $request->all(),

        ]);
    }
    public function exam_user(Request $request, User $user)
    {
        $current = auth()->user();
        if ($current->role == "doctor" && $current->password == $current->ssn) {
            toast()->warning(" لطفا نسبت به تغییر رمز عبور اقدام فرمایید  ");
            return redirect()->route("profile");
        }
        $attrs = Attr::where('user_id', $user->id)->pluck('value', 'name')->toArray();
        $commission = null;
        if ($user->karevan) {
            $commission =   Commission::where('province_id', $user->karevan->ProvinceID)->first();
        }
        if ($current->role == "provincialAgent") {
            $commission =   Commission::where('province_id', $current->province_id)->first();
        }
        if (! $commission) {
            toast()->warning(" لطفا نسبت به تعیین کمیسیون  اقدام فرمایید  ");
            return back();
        }
        // $commission = Commission::find(1);
        $drugs = Cache::get('posts', function () {
            return Drug::all();
        });
        return view('admin.passenger.exam_user', compact(["user", "drugs", "attrs", "commission"]));
    }

    public function history_user(Request $request, User $user)
    {

        $attrs = Attr::where('user_id', $user->id)->pluck('value', 'name')->toArray();
        $commission = null;

        if ($user->karevan) {
            $commission =   Commission::where('province_id', $user->karevan->province_id)->first();
        }
        $commission = Commission::find(1);
        $drugs = Cache::get('posts', function () {
            return Drug::all();
        });
        return view('admin.passenger.history_user', compact(["user", "drugs", "attrs", "commission"]));
    }
    public function save_testimage(Request $request, User $user)
    {
        if ($request->hasFile('file')) {
            $testimage = $request->file('file');
            $name_img = time() . 'testimage_' . $user->id . '.' . $testimage->getClientOriginalExtension();
            $testimage->move(public_path('/media/testimage/'), $name_img);
            $data['testimage'] = $name_img;
            $user->testimages()->create([
                'image' => $name_img,
                'year' => jdate()->format('Y'),
            ]);
            return response()->json([
                'status' => "ok",
                'all' => $request->all(),
                'ps' => $testimage->getClientOriginalExtension(),
                'body' => view('admin.passenger.testimage_list', compact([
                    "user"
                ]))->render(),
            ]);
        }
        return response()->json([
            'status' => "nok",
            'all' => $request->all(),
        ]);
    }
    public function reset_user(Request $request, User $user)
    {

        $current = auth()->user();
        if ($request->isMethod('post')) {
            $status_before = $user->status;
            $user->update([
                'status' =>  $request->status,
                'reset_reason' =>  $request->reset_reason,
            ]);

            $user->histories()->create([
                'doctor_id' => $current->id,
                "year" => jdate()->format("Y"),
                "status_before" => $status_before,
                "status_after" => $user->status,
                "type" => "change_status",
                "info" =>  $request->reset_reason,
            ]);
        } else {
            $user->update([
                'status' => "un_review"
            ]);
            $user->histories()->delete();
            $user->drugs()->delete();
            $user->attrs()->delete();
            $user->testimages()->delete();
        }

        toast()->success(" وضعیت  با موفقیت به روز شد ");
        return back();
    }
    public function save_attr(Request $request, User $user)
    {
        // $user->save_or_update($data);
        $all = $request->except(['_method']);
        $status_before = $user->status;

        foreach ($all as $key => $val) {
            if ($request->hasFile($key)) {
                $avatar = $request->file($key);
                $name_img = time() . $key . $user->id . '.' . $avatar->getClientOriginalExtension();
                $avatar->move(public_path('/media/passenger/attach/'), $name_img);
                $val = $name_img;
                $user->save_or_update($key, $val, "file");
            } else {
                $user->save_or_update($key, $val, "text");
            }
        }
        $current = auth()->user();
        $history = $user->histories()->where("doctor_id", $current->id)->where("year", jdate()->format("Y"))->whereDate('created_at', Carbon::today())->first();
        if (!$history) {
            $user->histories()->create([
                'doctor_id' => $current->id,
                "year" => jdate()->format("Y"),
                "status_before" => $status_before,
                "status_after" => $user->status,
                "type" => "change_doctor",
            ]);
        }
        if($user->status=="un_review"){
            $user->update([
                'status'=>""
            ]);

        }
        return response()->json([
            'all' => $request->all(),
            'user' => $user,
        ]);
    }






    public function reports(Request $request)
    {

        // dd(Karevan::where('KarevanNo', 1212)->first());

        $user = auth()->user();
        $province_selected = Province::find($request->province_id);
        $karevan_selected = Karevan::find($request->karevan_id);
        $type = $request->input('type');;
        if (!$type) {
            $type = "t1";
        }

        switch ($type) {


            case 't1':

                $users = User::query();
                if ($user->role == "provincialAgent") {
                    $users->whereHas("karevan", function ($q) use ($user) {
                        $q->where("ProvinceID", $user->province_id);
                    });
                }
                if ($user->role == "provincialSupervisor") {
                    $users->whereHas("karevan", function ($q) use ($user) {
                        $q->whereIn("ProvinceID", $user->provinces()->pluck("id")->toArray());
                    });
                }


                if ($user->role == "doctor") {
                    $users->whereHas("karevan", function ($q) use ($user) {
                        $q->whereIn("karevanID", $user->karevans()->pluck("IDS")->toArray());
                    });
                }


                $users->where('role',  "passenger");
                if ($request->search) {
                    $search = $request->search;
                    $users->where(function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('family', 'LIKE', "%{$search}%")
                            ->orWhere('cell', 'LIKE', "%{$search}%")
                            ->orWhere('JobTitle', 'LIKE', "%{$search}%");
                    });
                }
                $inputs = $request->except([
                    '_token',
                    '_method',
                    "type",
                    "province_id",
                    "passenger_id",
                    'search',
                    "BirthDate44min",
                    "BirthDate44max",
                    "Excel",
                    "pdf",
                    "status",
                    "MarriageStatus",
                    "Sex",
                ]);
                $current_yeay = Jdate()->format("Y");
                if ($request->BirthDate44min) {
                    $bmin = $current_yeay - $request->BirthDate44min;
                    $bmin = $bmin . "0000";
                    $users->where("BirthDate", "<",  (int) $bmin);
                }
                if ($request->BirthDate44max) {
                    $bmin = $current_yeay - $request->BirthDate44max;
                    $bmin = $bmin . "0000";
                    $users->where("BirthDate", ">",  (int) $bmin);
                }

                if ($request->status) {
                    $users->where("status", $request->status);
                }
                if ($request->Sex) {
                    $users->where("Sex", $request->Sex);
                }
                if ($request->MarriageStatus) {
                    $users->where("MarriageStatus", $request->MarriageStatus);
                }
                if ($request->province_id) {
                    $users->whereHas("karevan", function ($qu) use ($request) {
                        $qu->where("ProvinceID", $request->province_id);
                    });
                }
                if ($request->passenger_id) {
                    $users->where("id", $request->passenger_id);
                }
                // dd($request->all());
                // dump($key);
                // dump($inputs);
                if (sizeof($inputs)) {
                    // $users->whereHas('attrs', function ($query) use ($inputs) {
                    //     foreach ($inputs as $key => $val) {
                    //         if (!$val) continue;
                    //         $keyParts = explode("___", $key);
                    //         $operator = count($keyParts) == 2 && $keyParts[1] == 'min' ? '>=' : '<=';
                    //         if (sizeof($keyParts) == 1) {
                    //             // dd(2);
                    //             $query->where('name', $keyParts[0])
                    //                 ->where('value', $val);
                    //         } else {
                    //             // dd($keyParts[0]);
                    //             // dump($operator);
                    //             $query->where('name', $keyParts[0])
                    //             ->whereNotNull( "value")
                    //                 ->where('value', $operator, (int)$val);
                    //         }
                    //     }
                    // });

                    $filtered = array_filter($inputs, function ($value) {
                        return $value !== null && $value !== "0";
                    });









                    $users->where(function ($query) use ($inputs, $filtered) {

                        $query->whereHas('attrs', function ($subQuery) use ($inputs, $filtered) {
                            foreach ($inputs as $key => $val) {
                                if (!$val) continue;
                                $keyParts = explode("___", $key);
                                $operator = count($keyParts) == 2 && $keyParts[1] == 'min' ? '>=' : '<=';
                                if (sizeof($keyParts) == 1) {
                                    $subQuery->where('name', $keyParts[0])
                                        ->where('value', $val);
                                } else {
                                    $subQuery->where('name', $keyParts[0])
                                        ->whereNotNull("value")
                                        ->where('value', $operator, (int)$val);
                                }
                            }
                        });

                        if (count($filtered) > 0) {
                        } else {
                            $query->orWhereDoesntHave('attrs');
                        }
                    });
                }

                if ($request->pdf) {
                    $users = $users->orderBy('id', 'DESC')->latest()->paginate(100);
                    $pdf = PDF::loadView('admin.passenger.pdf_passenger', compact(['users']));
                    return $pdf->download('pdf_passenger.pdf');
                }
                if ($request->Excel) {
                    $users =    $users->get();
                    return Excel::download(new PassengerExport($users), 'pdf_passenger.xlsx');
                }
                // dump($users->clone()->tosql());
                $users = $users->sortable()
                    ->latest()->paginate(100);

                return view('admin.passenger.reports', compact(['users', "user"]));

                break;


            case 't2':
                $user = auth()->user();
                $allusers = User::whereRole("passenger");
                if ($user->role == "provincialAgent") {
                    $allusers->whereHas("karevan", function ($q) use ($user) {
                        $q->where("ProvinceID", $user->province_id);
                    });
                }
                if ($user->role == "provincialSupervisor") {
                    $allusers->whereHas("karevan", function ($q) use ($user) {
                        $q->whereIn("ProvinceID", $user->provinces()->pluck("id")->toArray());
                    });
                }

                if ($user->role == "doctor") {
                    $allusers->whereHas("karevan", function ($q) use ($user) {
                        $q->whereIn("karevanID", $user->karevans()->pluck("IDS")->toArray());
                    });
                }

                $allusers->whereHas("karevan", function ($q) use ($province_selected, $karevan_selected) {
                    if ($karevan_selected) {
                        $q->where("id", $karevan_selected->id);
                    }
                    if ($karevan_selected) {
                        $q->where("ProvinceID", $province_selected->id);
                    }
                });
                $statusArray = $keys = array_keys(__("status"));
                $all_status = $keys = (__("status"));
                $all_count = User::where('role', 'passenger')->count();

                $provinces_log = Province::with(['Karevans' => function ($query) use ($statusArray) {
                    $query->whereHas('users', function ($query) use ($statusArray) {
                        $query->where('role', 'passenger'); // فقط کاربران با نقش 'passenger'
                    });
                }])->get()->map(function ($province) use ($all_count, $statusArray) {
                    $statusPercentages = [];
                    $statusPercentages_count = [];
                    $totalPassengers = $province->Karevans->sum(fn($Karevans) => $Karevans->users->count());
                    if ($totalPassengers) {
                    }
                    foreach ($statusArray as $status) {
                        $passengers = $province->Karevans->sum(fn($Karevans) => $Karevans->users()->where('status', $status)->count());
                        $percentage = $totalPassengers > 0 ? ($passengers / $totalPassengers) * 100 : 0;
                        $statusPercentages[$status] = round($percentage, 0);
                        $statusPercentages_count[$status] = $passengers;
                    }
                    $user = auth()->user();
                    if ($user->role == "provincialAgent" &&  $user->province_id != $province->id) {

                        $statusPercentages = 0;
                        $statusPercentages_count = 0;
                    }
                    if ($user->role == "provincialSupervisor" && !in_array($province->id, $user->provinces()->pluck("id")->toArray())) {
                        $statusPercentages = 0;
                        $statusPercentages_count = 0;
                    }

                    if ($user->role == "doctor" && !in_array($province->id, $user->karevans()->pluck("ProvinceID")->toArray())) {

                        $statusPercentages = 0;
                        $statusPercentages_count = 0;
                    }
                    return [
                        'province_name' => $province->name,
                        'status_percentages' => $statusPercentages,
                        'statusPercentages_count' => $statusPercentages_count
                    ];
                });
                // استخراج نتایج به صورت آرایه
                $provinces_list = $provinces_log->pluck('province_name')->toArray();
                $un_review = [];
                $medical_commission = [];
                $under_review = [];
                $rejected = [];
                $approved = [];
                $result_commission = [];
                foreach ($provinces_log as $value) {
                    $st["un_review"][] = $value['status_percentages']['un_review'] ?? 0;
                    $st["medical_commission"][] = $value['status_percentages']['medical_commission'] ?? 0;
                    $st["under_review"][] = $value['status_percentages']['under_review'] ?? 0;
                    $st["rejected"][] = $value['status_percentages']['rejected'] ?? 0;
                    $st["approved"][] = $value['status_percentages']['approved'] ?? 0;
                    $st["result_commission"][] = $value['status_percentages']['result_commission'] ?? 0;

                    $st_count["un_review"][] = $value['statusPercentages_count']['un_review'] ?? 0;
                    $st_count["medical_commission"][] = $value['statusPercentages_count']['medical_commission'] ?? 0;
                    $st_count["under_review"][] = $value['statusPercentages_count']['under_review'] ?? 0;
                    $st_count["rejected"][] = $value['statusPercentages_count']['rejected'] ?? 0;
                    $st_count["approved"][] = $value['statusPercentages_count']['approved'] ?? 0;
                    $st_count["result_commission"][] = $value['statusPercentages_count']['result_commission'] ?? 0;
                }
                return view('admin.passenger.reports', compact(['provinces_list', "user", "st", "all_status", "province_selected", "karevan_selected", "allusers", "st_count"]));
                break;


                case 't3':
                    $user = auth()->user();
                    $allusers = User::whereRole("passenger");
                    if ($user->role == "provincialAgent") {
                        $allusers->whereHas("karevan", function ($q) use ($user) {
                            $q->where("ProvinceID", $user->province_id);
                        });
                    }
                    if ($user->role == "provincialSupervisor") {
                        $allusers->whereHas("karevan", function ($q) use ($user) {
                            $q->whereIn("ProvinceID", $user->provinces()->pluck("id")->toArray());
                        });
                    }

                    if ($user->role == "doctor") {
                        $allusers->whereHas("karevan", function ($q) use ($user) {
                            $q->whereIn("karevanID", $user->karevans()->pluck("IDS")->toArray());
                        });
                    }

                    $allusers->whereHas("karevan", function ($q) use ($province_selected, $karevan_selected) {
                        if ($karevan_selected) {
                            $q->where("id", $karevan_selected->id);
                        }
                        if ($karevan_selected) {
                            $q->where("ProvinceID", $province_selected->id);
                        }
                    });
                    $statusArray = $keys = array_keys(__("status"));
                    $all_status = $keys = (__("status"));
                    $all_count = User::where('role', 'passenger')->count();

                    $provinces_log = Province::with(['Karevans' => function ($query) use ($statusArray) {
                        $query->whereHas('users', function ($query) use ($statusArray) {
                            $query->where('role', 'passenger'); // فقط کاربران با نقش 'passenger'
                        });
                    }])->get()->map(function ($province) use ($all_count, $statusArray) {
                        $statusPercentages = [];
                        $statusPercentages_count = [];
                        $totalPassengers = $province->Karevans->sum(fn($Karevans) => $Karevans->users->count());
                        if ($totalPassengers) {
                        }
                        foreach ($statusArray as $status) {
                            $passengers = $province->Karevans->sum(fn($Karevans) => $Karevans->users()->where('status', $status)->count());
                            $percentage = $totalPassengers > 0 ? ($passengers / $totalPassengers) * 100 : 0;
                            $statusPercentages[$status] = round($percentage, 0);
                            $statusPercentages_count[$status] = $passengers;
                        }
                        $user = auth()->user();
                        if ($user->role == "provincialAgent" &&  $user->province_id != $province->id) {

                            $statusPercentages = 0;
                            $statusPercentages_count = 0;
                        }
                        if ($user->role == "provincialSupervisor" && !in_array($province->id, $user->provinces()->pluck("id")->toArray())) {
                            $statusPercentages = 0;
                            $statusPercentages_count = 0;
                        }

                        if ($user->role == "doctor" && !in_array($province->id, $user->karevans()->pluck("ProvinceID")->toArray())) {

                            $statusPercentages = 0;
                            $statusPercentages_count = 0;
                        }
                        return [
                            'province_name' => $province->name,
                            'status_percentages' => $statusPercentages,
                            'statusPercentages_count' => $statusPercentages_count
                        ];
                    });
                    // استخراج نتایج به صورت آرایه
                    $provinces_list = $provinces_log->pluck('province_name')->toArray();
                    $un_review = [];
                    $medical_commission = [];
                    $under_review = [];
                    $rejected = [];
                    $approved = [];
                    $result_commission = [];
                    foreach ($provinces_log as $value) {
                        $st["un_review"][] = $value['status_percentages']['un_review'] ?? 0;
                        $st["medical_commission"][] = $value['status_percentages']['medical_commission'] ?? 0;
                        $st["under_review"][] = $value['status_percentages']['under_review'] ?? 0;
                        $st["rejected"][] = $value['status_percentages']['rejected'] ?? 0;
                        $st["approved"][] = $value['status_percentages']['approved'] ?? 0;
                        $st["result_commission"][] = $value['status_percentages']['result_commission'] ?? 0;

                        $st_count["un_review"][] = $value['statusPercentages_count']['un_review'] ?? 0;
                        $st_count["medical_commission"][] = $value['statusPercentages_count']['medical_commission'] ?? 0;
                        $st_count["under_review"][] = $value['statusPercentages_count']['under_review'] ?? 0;
                        $st_count["rejected"][] = $value['statusPercentages_count']['rejected'] ?? 0;
                        $st_count["approved"][] = $value['statusPercentages_count']['approved'] ?? 0;
                        $st_count["result_commission"][] = $value['statusPercentages_count']['result_commission'] ?? 0;
                    }
                    return view('admin.passenger.reports', compact(['provinces_list', "user", "st", "all_status", "province_selected", "karevan_selected", "allusers", "st_count"]));
                    break;



            case 't1':
                break;


            case 't1':
                break;


            case 't1':
                break;
        }
    }
}
