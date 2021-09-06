<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
     protected $fillable = ['content'];
     
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     
     public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','user_id','trip_id')->withTimestamps();
    }
     
}
