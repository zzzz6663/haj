<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Drug;
use App\Models\User;
use App\Models\Province;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;




class PassengerImport implements ToModel, WithStartRow, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function __construct() {}
    public function startRow(): int
    {
        return 1;
    }

    public function chunkSize(): int
    {
        return 1000; // پردازش ۱۰۰۰ ردیف در هر بخش
    }
    public function model(array $row)

    {
        // if(sizeof($row)!=3){
        //     alert()->warning("این فایل مربوط به مشاور   نیست");
        //     return ;
        // }
// dd($row);

// $data = [
//     "brand_en" => $row['0'],
//     "brand_fa" => $row['1'],
//     "name" => $row['2'],
//     "generic" => $row['3']
// ];
// $defaults = [
//     'brand_en' => $row['0'], // ایمیلی         // سن پیش‌فرض برای کاربر جدید
// ];
// // $user = Drug::firstOrCreate($data, $defaults);
// $user = Drug::create($data, $defaults);
// alert()->success('زائران  با موفقیت اضافه شدن    ');
// return;

  if(sizeof($row)!=50){
            toast()->warning("این فایل مربوط به زائر    نیست");
            return ;
        }


        $data = [
            "ids" => $row['0'],
            "ids" => Str::limit( $row['0'], 200), // محدود کردن به 255 کاراکتر

            "KarevanID" => $row['1'],
            "PassengerCode" => $row['2'],
            "PassengerTypeID" => $row['3'],
            "name" => $row['4'],
            "family" => $row['5'],
            "fathername" => $row['6'],
            "OldFamily" => $row['7'],
            "MarriageStatus" => $row['8'],
            "idno" => $row['9'],
            "BirthDate" => $row['10'],
            "birthplace" => $row['11'],
            "JobID" => $row['12'],
            "JobTitle" => $row['13'],
            "EducationID" => $row['14'],
            "Religion" => $row['15'],
            "HajCount" => $row['16'],
            "HajTypeID" => $row['17'],
            "RelationID" => $row['18'],
            "Sex" => $row['19'],
            "telcode" => $row['20'],
            "tel" => $row['21'],
            "cell" => $row['22'],
            "Address" => $row['23'],
            "JobTel" => $row['24'],
            "JobAddress" => $row['25'],
            "PostalCode" => $row['26'],
            "RelatedPassengerCode" => $row['27'],
            "UserID" => $row['28'],
            "PassengerStepID" => $row['29'],
            "ssn" => $row['30'],
            "MarjaaID" => $row['31'],
            "serialno" => $row['32'],
            "email" => $row['33'],
            "Nationality" => $row['34'],
            "EsarID" => $row['35'],
            "Description" =>Str::limit( $row['36'], 250),
            "InsertDateTime" => $row['37'],
            "persiandate" => $row['38'],
            "Disease" => $row['39'],
            "BirthDate_ENG" => $row['40'],
            "BirthPlace_ENG" => $row['41'],
            "Family_ENG" => $row['42'],
            "FatherName_ENG" => $row['43'],
            "ExpDate" => $row['44'],
            "Name_ENG" => $row['45'],
            "IssueDate" => $row['46'],
            "PassNo" => $row['47'],
            "EducationTitle" => $row['48'],
            "VisaNo" => $row['49'],
        ];

        $data["role"] ="passenger";
        $data["status"] ="un_review";
        $exis=User::where('ssn', $row['30'])->count();
        if(!$exis){
            $user = User::create($data);
        }
        alert()->success('زائران  با موفقیت اضافه شدن    ');
        return;
    }
}
