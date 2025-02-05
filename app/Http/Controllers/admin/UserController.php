<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return redirect()->route("reserves.index");
        $user=auth()->user();
        $users = User::query();
        if ($request->search) {
            $search = $request->search;
            $users->where('name', 'LIKE', "%{$search}%")
                ->orWhere('family', 'LIKE', "%{$search}%")
                ->orWhere('mobile', 'LIKE', "%{$search}%");
        }
        $users  ->whereIn("role",['customer']);

        if ($request->from) {
            $request->from = $user->convert_date($request->from);
            $users->where('created_at', '>', $request->from);
        }
        if ($request->to) {
            $request->to = $user->convert_date($request->to);
            $users->where('created_at', '<', $request->to);
        }


        // if ($request->role) {
        //     $users->where('role',  $request->role);
        // }

        $users = $users
            // ->whereRole("customer")
            ->latest()->paginate(10);
        return view('admin.user.all', compact(['users',"user"]));
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
        $data=$request->validate([
            'name'=>"required",
            'title'=>"required",
            'family'=>"required",
            'province_id'=>"required",
            'city_id'=>"required",
            'admin_name'=>"required",
            'mobile'=>"required|unique:users,mobile",
            'job'=>"required",
            'tell'=>"required",
            'price'=>"required",
            'visiting_hours'=>"required",
            'confirm'=>"required",
            'latitude'=>"required",
            'longitude'=>"required",
            'welfare'=>"required",
            'address'=>"required",
            'history'=>"nullable",
            'avatar'=>"nullable",
        ]);
        $data['role']="seller";
        $user=User::create($data);
        $user->assignRole('seller');
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = 'avatar_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
            $user->update([
                'avatar'=>$name_img
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
        $data=$request->validate([
            'name'=>"required",
            'title'=>"required",
            'family'=>"required",
            'province_id'=>"required",
            'city_id'=>"required",
            'admin_name'=>"required",
            'mobile'=>"required|unique:users,mobile,".$user->id,
            'job'=>"required",
            'tell'=>"required",
            'price'=>"required",
            'visiting_hours'=>"required",
            'confirm'=>"required",
            'latitude'=>"required",
            'longitude'=>"required",
            'welfare'=>"required",
            'address'=>"required",
            'history'=>"nullable",
            'avatar'=>"nullable",
        ]);
        $user->update($data);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = 'avatar_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
            $user->update([
                'avatar'=>$name_img
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
}
