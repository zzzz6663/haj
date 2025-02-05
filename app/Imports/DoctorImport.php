<?php

namespace App\Imports;

use App\Models\City;
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

        $data = [
            "name" => $row["0"],
            "family" => $row["1"],
            "ssn" => $row["2"],
            "NezamCode" => $row["3"],
            "expert" => $row["4"],
            "Sex" => $row["5"],
            "serialno" => $row["6"],
            "fathername" => $row["7"],
            "province_id" => $row["8"],
            "mobile" => $row["9"],
        ];


        // $data = [
        //     "name" => $row["0"],
        //     "family" => $row["1"],
        //     "mobile" => $row["2"],
        //     "username" => $row["3"],
        //     "password" => $row["4"],
        //     "province_id" => $row["8"],
        // ];




        $data['role'] = "doctor";
        $data['active'] = "1";
        $data['username'] =$row["2"];
        $data['password'] =$row["2"];



        // با استفاده از firstOrCreate، اگر کاربری با این ایمیل وجود نداشته باشد، ایجاد می‌شود.
        $exis=User::where('mobile', $row['9'])->count();
        if(!$exis){
            $exis = User::create($data);
            $exis->assignRole('doctor');
        }

        alert()->success('پزشکان  با موفقیت اضافه شدن    ');
        return;
    }
}
