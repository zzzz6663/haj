<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    public function save_setting(Request $request)
    {
        $name=$request->name;
        $price=$request->price;
        $unit=$request->unit;
        $id=$request->id;
       $setting= Setting::whereName($name)->first();
       $data=[
        'name'=>$name,
        'info'=>$price,
        'val'=>$id,
        'unit'=>$unit,
    ];
       if(!$setting){
        Setting::create($data);
       }else{
       $setting->update($data);
       }
        return response()->json([
            'sss'=>"ok",
            'setting'=>$setting,
            'all'=>$request->all(),
        ]);
    }

    public function site_setting(Request $request)
    {

        if ($request->isMethod("post")) {
            $data = $request->validate([
                'call1' => "required",
                'call2' => "required",
                'site_info' => "required",
                'address1' => "required",
                'turn_off_treserve' => "required",
                'together_price' => "required",
                'dinar_price' => "required",
                'site_name' => "required",
                'deactive_warning' => "required",
                'enter_message' => "required",
                'deactive_warning' => "required",
                'max_day' => "required",
                'exist_message' => "required",
                'single_limit' => "required",
                // 'max_open_day' => "required",
                'food_price' => "required",
                'together_limit' => "required",
                'max_time_for_delete_reserve' => "required|integer|max:100",

            ]);

                // dd($request->all());
            if ($request->hasFile('bg_site')) {
                $image = $request->file('bg_site');
                $name_img = 'bg_site' ."."  . $image->getClientOriginalExtension();
                $image->move(public_path('/media/bg/'), $name_img);
                $data['bg_site'] = $name_img;
                // dd( $data);

            }
            $settings=Setting::all();
            foreach ($settings as $se) {
                $old[$se->name] = $se->val;
            }

            // dd( $data);

            foreach ($data as $key => $val) {
                $setting = Setting::whereName($key)->first();
                $setting->update(['val' => $val]);
                cache()->put($key, $val);
            }


            $user = auth()->user();
            $user->logy([
                'user_id' => $user->id,
                'logable_id' =>1,
                'type' =>   "setting_update",
                'logable_type' =>   "setting",
                'old' =>   json_encode($old),
                'new' =>   json_encode($data),
            ]);




            toast()->success("اطلاعات با موفقیت ذخیره شد ");
            return redirect()->route("site.setting");
        }

        $site_info=Setting::whereName("site_info")->first();
        $turn_off_treserve=Setting::whereName("turn_off_treserve")->first();
        $call1=Setting::whereName("call1")->first();
        $call2=Setting::whereName("call2")->first();
        $address1=Setting::whereName("address1")->first();
        $together_price=Setting::whereName("together_price")->first();
        $max_day = Setting::whereName("max_day")->first();
        $dinar_price = Setting::whereName("dinar_price")->first();
        $deactive_warning = Setting::whereName("deactive_warning")->first();
        $max_open_day = Setting::whereName("max_open_day")->first();
        $single_limit = Setting::whereName("single_limit")->first();
        $food_price = Setting::whereName("food_price")->first();
        $exist_message = Setting::whereName("exist_message")->first();
        $enter_message = Setting::whereName("enter_message")->first();
        $together_limit = Setting::whereName("together_limit")->first();
        $max_time_for_delete_reserve = Setting::whereName("max_time_for_delete_reserve")->first();
        $calandar_ad_day = Setting::whereName("calandar_ad_day")->first();
        $site_name = Setting::whereName("site_name")->first();
        return view('admin.setting.site_setting', compact([
            "exist_message",
            "calandar_ad_day",
            "single_limit",
            "enter_message",
            "turn_off_treserve",
            "together_price",
            "max_day",
            "dinar_price",
            "deactive_warning",
            "max_open_day",
            "together_limit",
            "site_name",
            "site_info",
            "call1",
            "call2",
            "address1",
            "food_price",
            "max_time_for_delete_reserve",
        ]));
    }
}
