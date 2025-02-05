<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
   protected $fillable=[
    'user_id',
    'name',
    'value',
    'year',
    'type',
    'info',
   ];
   public function user(){
    return $this->belongsTo(User::class);
   }
}
