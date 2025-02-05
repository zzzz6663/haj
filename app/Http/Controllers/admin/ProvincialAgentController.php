<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProvincialAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        $users = User::query();
        if ($request->province_id) {
            $id=$request->province_id;

            $users->whereHas("provinces",function($q)use( $id){
                $q->where("id", $id);
            });
        }
        if ($request->search) {
            $search = $request->search;
            $users->where(function($q) use($search){
               $q-> where('name', 'LIKE', "%{$search}%")
                ->orWhere('family', 'LIKE', "%{$search}%")
                ->orWhere('mobile', 'LIKE', "%{$search}%");
            });
        }
        // if ($request->from) {
        //     $request->from = $user->convert_date($request->from);
        //     $users->where('created_at', '>', $request->from);
        // }
        // if ($request->to) {
        //     $request->to = $user->convert_date($request->to);
        //     $users->where('created_at', '<', $request->to);
        // }

        $users->where('role',  "provincialAgent");
        $users = $users->sortable()
            // ->whereRole("customer")
            ->latest()->paginate(100);
        return view('admin.provincialAgent.all', compact(['users',"user"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.provincialAgent.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data=$request->validate([
            "name" => "required",
            "family" => "required",
            "mobile" => "required|unique:users,mobile",
            "username" => "required|unique:users,username",
            "password" => "required|min:6",
            "province_id" => "required",
            "avatar" => "nullable",
        ]);
        $data['role']="provincialAgent";
        $data['active']=1;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = time().'_avatar_'. '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
        }
        $user=User::create($data);
        $user->assignRole('provincialAgent');
        toast()->success("کاربر با موفقیت به  مجموعه اضافه شد ");
        return redirect()->route("provincialAgent.index");
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
    public function edit(User $provincialAgent, Request $request)
    {
        $user=$provincialAgent;
        return view('admin.provincialAgent.edit', compact(["user"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $provincialAgent)
    {
          // dd($request->all());
          $data=$request->validate([
            "name" => "required",
            "family" => "required",
            "mobile" => "required|unique:users,mobile,".$provincialAgent->id,
            "username" => "required|unique:users,username,".$provincialAgent->id,
            "password" => "required|min:6",
            "province_id" => "required",
            "avatar" => "nullable",
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = time().'_avatar_'. '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
        }
        $provincialAgent->update($data);
        // $provincialAgent->provinces()->sync($data['provinces']);
        toast()->success("کاربر با موفقیت   ویرایش شد ");
        return redirect()->route("provincialAgent.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
