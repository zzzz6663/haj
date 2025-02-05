<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
  protected $fillable = [
    "province_id","name","family","expert"
  ];
  public function province(){
    return $this->belongsTo(Province::class);
  }
  public function users(){
    return $this->hasMany(User::class);
  }
}
