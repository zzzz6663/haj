<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\User;
use Illuminate\Http\Request;

class CommissionController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        $commissions = Commission::query();

        if ($request->search) {
            $search = $request->search;
            $commissions->where(function($q) use($search){
               $q-> where('BuildName', 'LIKE', "%{$search}%")
                ->orWhere('Address', 'LIKE', "%{$search}%")
                ->orWhere('GroupNo', 'LIKE', "%{$search}%");
            });
        }
        // if ($request->from) {
        //     $request->from = $scommission->convert_date($request->from);
        //     $commissions->where('created_at', '>', $request->from);
        // }
        // if ($request->to) {
        //     $request->to = $commission->convert_date($request->to);
        //     $commissions->where('created_at', '<', $request->to);
        // }
        if ($user->role=="provincialAgent") {
            $commissions->where("province_id",$user->province_id);
        }

        $commissions = $commissions
            // ->whereRole("customer")
            ->latest()->paginate(100);
        return view('admin.commission.all', compact(['commissions',"user"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=auth()->user();
        return view('admin.commission.create', compact(["user"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data=$request->validate([
            "name" => "required",
            "province_id" => "required",
        ]);
        $commission=Commission::where('province_id', $request->province_id)->count();
        if( $commission){
            toast()->warning("کیمسیون برای این استان قبلا تشکیل شده است ");
            return redirect()->route("commission.index");
        }
        $user=Commission::create($data);

        toast()->success("کاربر با موفقیت به  مجموعه اضافه شد ");
        return redirect()->route("doctor.index");
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
    public function edit(Commission $commission, Request $request)
    {   $user=auth()->user();

        return view('admin.commission.edit', compact(["commission","user"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commission $commission)
    {
        $data=$request->validate([
            "name" => "required",
            "province_id" => "required",
        ]);
        $commission->update($data);
        toast()->success("کیمسیون با موفقیت به  مجموعه به روز  شد ");
        return redirect()->route("commission.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function new_user_commission(Request $request, Commission $commission)
    {
        if( $request->isMethod("post") ){
            $data=$request->validate([
                'name'=>"required",
                'family'=>"required",
                'expert'=>"required",
            ]);
            $data['role']="commission_doctor";
            $commission->users()->create($data);
            toast()->success("اطلاعات با موفقیت  شد ");
            return redirect()->route("commission.index");
        }
        return view('admin.commission.new_user_commission', compact(["commission"]));
    }
    public function update_user_commission(Request $request, User $user)
    {
        if( $request->isMethod("post") ){
            $data=$request->validate([
                'name'=>"required",
                'family'=>"required",
                'expert'=>"required",
            ]);
            $user->update($data);
            toast()->success("اطلاعات با موفقیت  شد ");
            return redirect()->route("commission.index");
        }
        return view('admin.commission.update_user_commission', compact(["user"]));
    }
    public function remove_user_commission(Request $request, User $user)
    {
        $user->delete();
        toast()->success("کاربر با موفقیت حذف شد  ");
        return redirect()->route("commission.index");

    }
}
