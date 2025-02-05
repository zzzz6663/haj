<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestImage extends Model
{

    protected $fillable=[
        'user_id',
        'year',
        'type',
        'info',
        'image',
       ];
       public function user(){
        return $this->belongsTo(User::class);
       }
       public function image()
       {
           if ($this->image) {
               return asset("/media/testimage/" . $this->image);
           }
           return false;
       }

}
