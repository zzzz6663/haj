<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Karevan;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        $users = User::query();
        if ($request->search) {
            $search = $request->search;
            $users->where(function($q) use($search){
               $q-> where('name', 'LIKE', "%{$search}%")
                ->orWhere('family', 'LIKE', "%{$search}%")
                ->orWhere('ssn', 'LIKE', "%{$search}%")
                ->orWhere('mobile', 'LIKE', "%{$search}%");
            });
        }
        if ($request->from) {
            $request->from = $user->convert_date($request->from);
            $users->where('created_at', '>', $request->from);
        }
        if ($request->to) {
            $request->to = $user->convert_date($request->to);
            $users->where('created_at', '<', $request->to);
        }

        $users->where('role',  "doctor");
        $users = $users->sortable()
            // ->whereRole("customer")
            ->latest()->paginate(100);
            $karevans=Karevan::where('doctor_id', null)->get();;
        return view('admin.doctor.all', compact(['users',"user","karevans"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctor.create', compact([]));
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
            "province_id" => "required",
            "expert" => "nullable",
            "ssn" => "required",
            "NezamCode" => "required",
            "serialno" => "required",
            "username" => "required",
            "password" => "required",
            "fathername" => "required",
            "Sex" => "required",
            "avatar" => "nullable",
        ]);
        $data['role']="doctor";
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = time().'_avatar_'. '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
        }
        $user=User::create($data);
        $user->assignRole('doctor');
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
    public function edit(User $doctor, Request $request)
    {
        $user=$doctor;
        return view('admin.doctor.edit', compact(["user"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $doctor)
    {
        $user=$doctor;
        $data=$request->validate([
            "name" => "required",
            "family" => "required",
            "mobile" => "required|unique:users,mobile,".$doctor->id,
            "province_id" => "required",
            "expert" => "nullable",
            "ssn" => "required",
            "NezamCode" => "required",
            "serialno" => "required",
            "fathername" => "required",
            "password" => "required",
            "Sex" => "required",
            "active" => "required",
            "avatar" => "nullable",
        ]);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $name_img = time().'_avatar_'. '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/media/users/avatar/'), $name_img);
            $data['avatar'] = $name_img;
        }
        $user->update($data);


        toast()->success("کاربر با موفقیت   ویرایش شد ");
        return redirect()->route("doctor.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
