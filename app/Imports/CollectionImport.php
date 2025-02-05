<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Collection;
use App\Models\User;
use App\Models\Province;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;




class CollectionImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function __construct()
    {
    }
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)

    {
        // if(sizeof($row)!=3){
        //     alert()->warning("این فایل مربوط به مشاور   نیست");
        //     return ;
        // }
        if(sizeof($row)!=3){
            toast()->warning("این فایل مربوط به مشاور   نیست");
            return ;
        }

        $data = [
            "BuildName"=>$row["0"],
            "Address"=>$row["1"],
            "GroupNo"=>$row["2"],

        ];


     $exis=Collection::where('BuildName', $row['0'])->count();
     if(!$exis){
         $exis = Collection::create($data);
     }


        alert()->success('مجموعه  با موفقیت اضافه شدن    ');
        return  ;
    }
}

