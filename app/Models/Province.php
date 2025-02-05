<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
protected $fillable=[
    'name',
    'id',
];



public function users()
{
        return  $this->belongsToMany(User::class);;

}
public function commissions(){
    return $this->hasMany(Commission::class);
}

public function Karevans(){
    return $this->hasMany(Karevan::class,"ProvinceID");
}

}
