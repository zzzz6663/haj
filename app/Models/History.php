<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        "user_id","doctor_id","year","status_before","status_after","type","info"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function doctor(){
        return $this->belongsTo(User::class,"doctor_id");
    }
}
