<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Drug;
use App\Models\User;
use App\Models\Karevan;
use App\Models\Province;
use App\Models\TestImage;
use Illuminate\Http\Request;
use App\Imports\DoctorImport;
use App\Imports\KarevanImport;
use App\Imports\PassengerImport;
use App\Imports\CollectionImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

use function PHPUnit\Framework\isArray;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{

    public function get_karevan(Province $province)
    { 
        if($province){
            return response()->json([
                'body' => view('section.get_karevan', compact('province'))->render(),
            ]);
        }

    }

    public function forget_password(Request $request)
    {
        if ($request->ajax()) {
            $mobile = $request->mobile;
            $user =  User::where('mobile', $mobile)->first();
            $randomNumber = random_int(10000, 99999);
            $user->update([
                'password'=>$randomNumber
            ]);
            if ($user) {
                $pass = $user->password;
                $message = "  رمز عبور شما  " . "\n" . $pass . "\n";
                $user->sms($mobile, $message . " لغو11");
                return response()->json([
                    "status" => "ok"
                ]);
            }
            return response()->json([
                "status" => "nok"
            ]);
        }
        return view('auth.forget_password');
    }

    public function login()
    {

        $user = auth()->user();

        if ($user && $user->role == 'admin') {

            return redirect()->route("dashboard.admin");
        } else {
            Auth::logout();
        }
        return view('auth.login');
    }


    public function imports(Request $request)
    {
        if ($request->isMethod("post")) {
            toast()->success('اطلاعات   با موفقیت اضافه شد    ');


            // dd($request->all());
            // dd($request->passenger);
            if ($request->passenger) {
                // dd($request->hasFile('passenger'));
            if ($request->hasFile('passenger')) {
                $passenger = $request->file('passenger');
                // dd( $passenger);
                $name_img = 'passengers'. '.' . $passenger->getClientOriginalExtension();
                $passenger->move(public_path('/media/passenger/'), $name_img);
            }
                Excel::import(new PassengerImport(), public_path('/media/passenger/'.  $name_img) );
                return redirect()->route("passenger.index");
            }
            if ($request->karevan) {
                Excel::import(new KarevanImport(), request()->file('karevan'));
                return redirect()->route("karevan.index");
            }
            if ($request->doctor) {
                Excel::import(new DoctorImport(), request()->file('doctor'));
                return redirect()->route("doctor.index");
            }
            if ($request->collection) {
                Excel::import(new CollectionImport(), request()->file('collection'));
                return redirect()->route("collection.index");
            }
        }
        return view('admin.dashboard.imports');
    }

    public function dashboard()
    {
        $user = auth()->user();
        return view('admin.dashboard.dashboard');
    }
    public function check_login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // $data['name']="admin";
        // $data['role']="admin";
        // $data['active']="1";
        // $user= User::create($data);
        // $user->assignRole('admin');
        // dd($data);

        $user = User::where("username", $request->username)->whereActive(1)->whereIn(
            'role',
            ['admin', "doctor", "provincialSupervisor", "provincialAgent", "manager"]
        )->first();
        //    $user->assignRole('admin');
        // dd(Hash::check($request->password, $user->password));
        if (!$user) {
            toast()->error('   اطلاعات ارسال شده صحیح نمی باشد');
            return back();
        }
        // dd($user);
        // dd(Hash::check($request->password, $user->password));
        // if ($user && Hash::check($request->password, $user->password)) {
        if ($user && (($user->password) == $request->password)) {
            Auth::login($user, true);
            toast()->success('   ورود با موفقیت انجام شد');
            return redirect()->route('redirect');
        } else {
            toast()->error('   اطلاعات ارسال شده صحیح نمی باشد');
            return back();
        }
    }

    public function change_doctor(Karevan $karevan, Request $request)
    {
        $user = auth()->user();
        $user->logs()->create([
            "before" =>  $karevan->doctor_id,
            "after" =>  $request->ids,
            "karevan_id" =>  $karevan->id,
            "type" =>  "karevan",
        ]);
        $karevan->update([
            'doctor_id' => $request->ids
        ]);
        return response()->json([
            'status' => "ok",
            'karevan' => $karevan->id,
            'all' => $request->all(),
        ]);
    }


    public function change_karevan(User $user, Request $request)
    {
        $cuerrent = auth()->user();

        $ids = $request->ids;
        if ($ids && isArray($ids)) {
            foreach ($user->karevans as $kar) {
                $cuerrent->logs()->create([
                    "before" =>  $kar->doctor_id,
                    "after" =>  null,
                    "karevan_id" =>  $kar->id,
                    "type" =>  "karevan",
                ]);
                $kar->update([
                    'doctor_id' => null
                ]);
            };
            foreach ($ids as $k => $val) {
                $karevan = Karevan::find($val);

                $cuerrent->logs()->create([
                    "before" =>  $karevan->doctor_id,
                    "after" =>   $user->id,
                    "karevan_id" =>  $karevan->id,
                    "type" =>  "karevan",
                ]);


                $karevan->update([
                    'doctor_id' => $user->id
                ]);
            }
        } else {
            foreach (Karevan::all() as $kar) {
                $cuerrent->logs()->create([
                    "before" =>  $kar->doctor_id,
                    "after" =>  null,
                    "karevan_id" =>  $kar->id,
                    "type" =>  "karevan",
                ]);
                $kar->update([
                    'doctor_id' => null
                ]);
            };
        }

        return response()->json([
            'status' => "ok",
            'all' => $request->all(),
        ]);
    }

    public function change_password(Request $request)
    {
        $user = auth()->user();
        // dd("required|same:" . $user->password);
        $data = $request->validate([
            'old' => "required",
            'password' => "required",
            'new_password' => "required|same:password",
        ], [
            'new_password.same' => 'رمز عبور جدید باید با تاییدیه آن مطابقت داشته باشد.',
        ]);

        // بررسی رمز عبور قدیمی
        // بررسی رمز عبور قدیمی
        if (($user->password) !== $request->old) {
            return back()->withErrors(['old' => 'رمز عبور قدیمی شما نادرست است.']);
        }
        $user->update([
            'password' =>  $data['password']
        ]);
        toast()->success("اطلاعات با موفقیت ثبت شد ");
        return redirect()->route("passenger.index");
    }

    public function profile(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod("post")) {
            $data = $request->validate([
                'name' => "nullable",
                'family' => "nullable",
                'avatar' => "nullable",
                // 'password' => "nullable|min:6",
                // 'password' => "nullable|confirmed|min:6",
            ]);
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $name_img = time() . 'avatar_' . $user->id . '.' . $avatar->getClientOriginalExtension();
                $avatar->move(public_path('/media/users/avatar/'), $name_img);
                $data['avatar'] = $name_img;
            }
            $user->update($data);
            toast()->success("اطلاعات با موفقیت ثبت شد ");
            return redirect()->route("passenger.index");
        }
        return view('admin.dashboard.profile', compact(["user"]));
    }
    public function get_passenger(Request $request)
    {
        $search = $request->get('search', ''); // متن جستجو
        $page = $request->get('page', 1); // شماره صفحه
        $perPage = 20; // تعداد آیتم‌ها در هر صفحه


        $users = User::query();
        $users->whereRole("passenger");

        $user = auth()->user();

        if ($user->role == "doctor") {
            $users->whereHas("karevan", function ($q) use ($user) {
                $q->whereIn("karevanID", $user->karevans()->pluck("IDS")->toArray());
            });
        }


        if ($search) {
            $users
                ->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('family', 'LIKE', "%{$search}%")
                        ->orWhere('ssn', 'LIKE', "%{$search}%")
                        ->orWhere('karevanID', 'LIKE', "%{$search}%");
                });
        }

        $users = $users->select('id', 'name', 'family', "ssn", "karevanID")
            ->paginate($perPage, ['*'], 'page', $page);
        return response()->json([
            'data' => $users->items(),
            'more' => $users->hasMorePages(),
            "all" => $request->all()
        ]);
    }
    public function get_drug(Request $request)
    {
        $search = $request->get('search', ''); // متن جستجو
        $page = $request->get('page', 1); // شماره صفحه
        $perPage = 20; // تعداد آیتم‌ها در هر صفحه


        $drugs = Drug::query();

        if ($search) {
            $drugs

                ->where('brand_en', 'LIKE', "%{$search}%")
                ->orWhere('brand_fa', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('generic', 'LIKE', "%{$search}%");
        }

        $drugs = $drugs->select('id', 'brand_en', 'brand_fa', 'name', 'generic')
            ->paginate($perPage, ['*'], 'page', $page);
        return response()->json([
            'data' => $drugs->items(),
            'more' => $drugs->hasMorePages(),
            "all" => $request->all()
        ]);
        // قالب‌بندی داده‌ها برای Select2
        return response()->json([
            'items' => array_map(function ($drug) {
                return [
                    'id' => $drug['id'], // شناسه دارو
                    'text' => $drug['name'], // نام دارو
                ];
            }, $drugs->items()),
            'pagination' => [
                'more' => $drugs->hasMorePages(),
            ],
        ]);
    }


    public function add_drug(Request $request, User $user)
    {
        $drug = $request->drug;
        $dose = $request->dose;
        $user->drugs()->attach($drug, ['dose' => $dose]);
        $drugs = $user->drugs;
        return response()->json([
            'items' => $request->all(),
            'body' => view('admin.passenger.drug_list', compact([
                "user",
                "drugs"
            ]))->render(),
        ]);
    }
    public function remove_drug(Request $request, User $user)
    {
        $drug = $request->drug;
        $user->drugs()->detach($drug);
        $drugs = $user->drugs;
        return response()->json([
            'items' => $request->all(),
            'body' => view('admin.passenger.drug_list', compact([
                "user",
                "drugs"
            ]))->render(),
        ]);
    }
    public function remove_testimage(Request $request, TestImage $testimage)
    {
        $filePath = public_path('media/testimage/' . $testimage->image);

        // بررسی اینکه آیا فایل وجود دارد
        if (File::exists($filePath)) {
            // حذف فایل
            File::delete($filePath);
        }
        $testimage->delete();
        $user = User::find($request->user_id);
        return response()->json([
            'body' => view('admin.passenger.testimage_list', compact([
                "user"
            ]))->render(),
        ]);
    }
}
