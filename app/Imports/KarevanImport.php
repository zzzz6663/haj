<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Karevan;
use App\Models\User;
use App\Models\Province;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;




class KarevanImport implements ToModel, WithStartRow
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

        if(sizeof($row)!=37){
            toast()->warning("این فایل مربوط به کاروان    نیست");
            return ;
        }
        $data = [
             "IDS"=>$row["0"],
             "ProvinceID"=>$row["1"],
             "KarevanNo"=>$row["2"],
             "CapId"=>$row["3"],
             "Madineh"=>$row["4"],
             "City"=>$row["5"],
             "ManagerName"=>$row["6"],
             "ManagerFamily"=>$row["7"],
             "MeccaHouseID"=>$row["8"],
             "MedinaHouseID"=>$row["9"],
             "Tel"=>$row["10"],
             "Address"=>$row["11"],
             "KarevanTypeID"=>$row["12"],
             "Religon"=>$row["13"],
             "MeccaPriceID"=>$row["14"],
             "MedinaPriceID"=>$row["15"],
             "MeccaEnterDate"=>$row["16"],
             "MeccaExitDate"=>$row["17"],
             "MedinaEnterDate"=>$row["18"],
             "MedinaExitDate"=>$row["19"],
             "ExitDate"=>$row["20"],
             "Cancel"=>$row["21"],
             "ManagerArabCell"=>$row["22"],
             "v"=>$row["23"],
             "CellIran"=>$row["24"],
             "ManagerEducation"=>$row["25"],
             "ManagerBranch"=>$row["26"],
             "ManagerJob"=>$row["27"],
             "ManagerEmail"=>$row["28"],
             "hotelgroupmecca"=>$row["29"],
             "hotelgroupmeccaname"=>$row["30"],
             "hotelgroupmedina"=>$row["31"],
             "hotelgroupmedinaname"=>$row["32"],
             "ZaerNo"=>$row["33"],
             "AvamelNo"=>$row["34"],
             "MeccaHouse"=>$row["35"],
             "MedinehHouse"=>$row["36"],
        ];

    $exis=Karevan::where('ids', $row['0'])->count();
    if(!$exis){
        $user = Karevan::create($data);

    }
        alert()->success('کاروان   با موفقیت اضافه شدن    ');
        return  ;
    }
}

