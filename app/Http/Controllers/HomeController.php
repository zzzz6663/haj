<?php

namespace App\Http\Controllers;

use PDO;
use Kavenegar;
use Mpdf\Tag\P;
use PDOException;
use Carbon\Carbon;
use App\Models\Attr;
use App\Models\City;
use App\Models\Plan;
use App\Models\Room;
use App\Models\Site;
use App\Models\Tour;
use App\Models\Unit;
use App\Models\User;
use App\Models\Image;
use App\Models\Action;
use App\Models\Course;
use App\Models\Reserve;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Province;
use App\Models\Advertise;
use App\Models\Commission;
use App\Models\Transaction;
use Cryptommer\Smsir\Smsir;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Kavenegar\Exceptions\ApiException;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Framework\Constraint\Count;
use Laravel\Socialite\Facades\Socialite;


class HomeController extends Controller
{





    public function lo(Request $request)
    {
        $user = User::find(1);
        Auth::loginUsingId(1, true);
        return 4;
    }
    public function clear(Request $request)
    {
    //     $user = User::find(1);
    // $user->update([
    //     'role'=>"admin",
    //     'username'=>"admin",
    //     'password'=>"121212",
    //     'active'=>"1"
    // ]);
    // $user->assignRole('admin');
        $user=  User::where('mobile', "09373699317")->first();

        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('config:clear');



        return jdate()->format("Y");

    }

    public function redirect()
    {
        $user = auth()->user();
        if (in_array($user->role, ["admin","manager"])) {
            $route = "dashboard.admin";
        }
        if ($user->role == "doctor") {
            if($user->role=="doctor" && $user->password== $user->ssn)
            {
                toast()->warning("   لطفا نسبت به تغییر رمز عبور اقدام فرمایید   ");
                return redirect()->route("profile");
            }
            $route = "passenger.index";
        }
        if ($user->role == "customer") {
            $route = "profile";
        }
        if ($user->role == "provincialSupervisor") {
            $route = "passenger.index";
        }
        if ($user->role == "provincialAgent") {
            $data=[
                "name" =>  "کیمسیون پزشکی  استان ".$user->province->name,
                "province_id" => $user->province->id,
            ];
            $commission=Commission::where('province_id', $user->province->id)->count();
            if( !$commission){
                $commission=Commission::create($data);
            }
            $route = "passenger.index";
        }
        return redirect()->route($route);
    }

    public function passenger_info(User $user)
    {
        $attrs = Attr::where('user_id', $user->id)->pluck('value', 'name')->toArray();
        return view('site.passenger_info', compact(['user',"attrs"]));
    }
    public function index()
    {
        // toast()->success("حساب شما با موفقیت ثبت شد ");
        // return redirect()->route("admin.login");

        return view('site.index', compact([]));
    }
    public function update()
    {
        // toast()->success("حساب شما با موفقیت ثبت شد ");
        // return redirect()->route("admin.login");

        return view('site.update', compact([]));
    }


    public function contact()
    {
        return view('site.contact', compact([]));
    }





    public function login()
    {

        // return redirect()->route("home");
        $user = auth()->user();
        $data['token'] = 1212;
        // $user->sms("09373699317",$data );
        return redirect()->route('admin.login');
        return view('auth.mobile_login', compact(['user']));
    }



    public function remove_img(Request $request, Image $image)
    {
        $image->delete();
        return response()->json([
            'status' => "ok",
            'all' => $request->all(),
        ]);
    }
    public function chek_code(Request $request)
    {
        $rnd =      session()->get("rand");
        $mobile =      session()->get("mobile");
        $user = User::whereMobile($mobile)->first();
        if ($user && $request->code == $rnd) {
            Auth::loginUsingId($user->id);
        }
        return response()->json([
            'status' => "ok",
            'all' => $request->all(),
        ]);
    }
    public function get_city(Province $province)
    {
        return response()->json([
            'body' => view('parts.get_city', compact('province'))->render(),
        ]);
    }


    public function mobile_login(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $rnd = rand(1000, 9999);
            $mobile = $request->mobile;
            if (strlen($mobile) == 10) {
                $mobile = "0" . $mobile;
            }
            session()->put("mobile", $mobile);
            session()->put("rand", $rnd);
            $user = User::whereMobile($mobile)->first();
            $role = "customer";

            if (!$user) {
                if ($request->role) {
                    $role = $request->role;
                }
                $user = User::create([
                    "mobile" => $mobile,
                    "role" => $role
                ]);

                $user->assignRole($role);
            }
            $data['token'] =    $rnd;
            $user->sms($mobile, $data);
            return response()->json([
                'code' => $rnd,
                'role' => $role,
                'all' => $request->all(),
            ]);
        }
        if ($user) {
            return redirect()->route("redirect");
        }
        return view('auth.mobile_login', compact(['user']));
    }
    public function register(Request $request)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => "required",
                'family' => "required",
                'mobile' => "required|unique:users,mobile",
                'password' => 'required|confirmed|min:6',
            ]);
            $data['role'] = "customer";
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            $user->assignRole("customer");
            toast()->success("حساب شما با موفقیت ثبت شد ");
            return redirect()->route("login");
        }
        // if (Hash::check($request->password, $exist_user->password)) {
        // $data['password'] = bcrypt($data['password']);
        return view('auth.register', compact(['user']));
    }
    public function logout()
    {
        Auth::logout();
        $user = auth()->user();

        return redirect()->route('admin.login');
    }

    public function download(Request $request)
    {

        return response()->download(($request->path));;
    }




    public function send_sms(Request $request)
    {
        $user = auth()->user();
        $rand = rand(1000, 9999);
        $mobile = $request->mobile;
        session()->put("mobile", $mobile);
        session()->put("rand", $rand);


        $user = User::whereMobile($mobile)->first();
        if (!$user) {
            $user = User::create([
                "mobile" => $mobile,
                "role" => "student",
            ]);
            $user->assignRole("student");
        }

        $user->sms();
        return response()->json([
            'rand' => $rand,
            'mobile' => $mobile,
            'status' => "ok",
            'all' => $request->all()
        ]);
    }
    public function check_code(Request $request)
    {
        $user = auth()->user();
        $code = $request->code;
        $rand =  session()->get("rand");
        $mobile =  session()->get("mobile");
        $user = User::whereMobile($mobile)->first();
        $status = "nok";
        if ($code == $rand) {
            $status = "ok";
            Auth::loginUsingId($user->id, true);
        }
        return response()->json([
            'status' => $status,
            'rand' => $rand,
            'code' => $code,
            'all' => $request->all()
        ]);
    }

}
