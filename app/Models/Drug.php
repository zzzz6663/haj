<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
   protected$fillable=[
    'brand_en',
    'brand_fa',
    'name',
    'generic',
   ];
   public function users(){
    return $this->belongsToMany(User::class)->withPivot(['year',"dose","count","info"]);

   }

}
