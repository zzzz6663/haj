<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Karevan extends Model
{
    use Sortable;
   protected $fillable=[
     "doctor_id",
     "IDS",
     "ProvinceID",
     "KarevanNo",
     "CapId",
     "Madineh",
     "City",
     "ManagerName",
     "ManagerFamily",
     "MeccaHouseID",
     "MedinaHouseID",
     "Tel",
     "Address",
     "KarevanTypeID",
     "Religon",
     "MeccaPriceID",
     "MedinaPriceID",
     "MeccaEnterDate",
     "MeccaExitDate",
     "MedinaEnterDate",
     "MedinaExitDate",
     "ExitDate",
     "Cancel",
     "ManagerArabCell",
     "v",
     "CellIran",
     "ManagerEducation",
     "ManagerBranch",
     "ManagerJob",
     "ManagerEmail",
     "hotelgroupmecca",
     "hotelgroupmeccaname",
     "hotelgroupmedina",
     "hotelgroupmedinaname",
     "ZaerNo",
     "AvamelNo",
     "MeccaHouse",
     "MedinehHouse",
   ];
   public $sortable = [
    'name',
];

public function users(){
    return $this->hasMany(User::class,"karevanID","IDS");
}
public function logs(){
    return $this->hasMany(Log::class);
}
public function doctor(){
    return $this->belongsTo(User::class,"doctor_id");
}
public function province(){
return $this->belongsTo(Province::class,"ProvinceID","");
}
}
