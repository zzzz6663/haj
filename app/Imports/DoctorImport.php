<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Drug;
use App\Models\User;
use App\Models\Province;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;




class DoctorImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function __construct() {}
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)

    {
        // if(sizeof($row)!=11){
        //     toast()->warning("این فایل مربوط به دکتر   نیست");
        //     return ;
        // }

        // $province=null;
        // $pro=Province::whereName($row["3"])->first();
        // if($pro){
        //     $province=$pro->id;

        // }
        // 'brand_en',
        // 'brand_fa',
        // 'name',
        // 'generic',

        $data = [
            "name" => $row["0"],
            "brand_fa" => null,
            "brand_en" => null,
            "generic" =>  $row["3"],

        ];
        Drug::firstOrCreate(['name' => $row["0"]], $data);

        // // $data = [
        // //     "name" => $row["0"],
        // //     "family" => $row["1"],
        // //     "mobile" => $row["2"],
        // //     "username" => $row["3"],
        // //     "password" => $row["4"],
        // //     "province_id" => $row["8"],
        // // ];




        // $data['role'] = "doctor";
        // $data['active'] = "1";
        // $data['username'] =$data["ssn"];
        // $data['password'] =$data["ssn"];



        // // با استفاده از firstOrCreate، اگر کاربری با این ایمیل وجود نداشته باشد، ایجاد می‌شود.
        // $exis=User::where('mobile', $data["ssn"])->first();
        // if(!$exis){
        //     $exis = User::create($data);
        //     $exis->assignRole('doctor');
        // }

        alert()->success('پزشکان  با موفقیت اضافه شدن    ');
        return;
    }
}
