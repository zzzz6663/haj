<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  protected $fillable = [
    "user_id","karevan_id","before","after","info","year","type"
  ];

public function user(){
    return $this->belongsTo(User::class);
}
public function karevan(){
    return $this->belongsTo(Karevan::class);
}

}
