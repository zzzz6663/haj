<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'image',
        'banner',
        'info',
        'lat',
        'lon',
        'count',//تعداد بازدید  از این شهر
    ];
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function regions(){
        return $this->hasMany(Region::class);
    }
    public function travel(){
        return $this->hasOne(Travel::class);
    }
    public function adventure(){
        return $this->hasOne(Adventure::class);
    }
    public function image($type=null){
        if($this->image){
            return asset('/media/city/'.$type.$this->image);
        }
        return false;
    }
    public function banner($type=null){
        if($this->banner){
            return asset('/media/city/'.$type.$this->banner);
        }
        return false;
    }

    public function advertises(){
        return $this->hasMany(Advertise::class);
    }

    public function  all_users(){
        return $this->belongsToMany(User::class);
    }
}
