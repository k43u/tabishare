<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('trips');
    }
    
    public function favorites()
    {
       return $this->belongsToMany(Trip::class,'favorites','user_id','trip_id')->withTimestamps();
    }
    
    public function favorite($trip_id)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favoriting($trip_id);

        if  ($exist) { 
            // すでにお気に入りしていれば何もしない
            return false;
        } else {
            // お気に入りしていない状況であればお気に入りする
            $this->favorites()->attach($trip_id);
            return true;
        }
    }
    
    public function unfavorite($trip_id)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favoriting($trip_id);
        
        if ($exist) {
            // すでにお気に入りしていればお気に入りを外す
            $this->favorites()->detach($trip_id);
            return true;
        } else {
            // お気に入りであれば何もしない
            return false;
        }
    }
    
    public function is_favoriting($trip_id)
    {
       return $this->favorites()->where('trip_id', $trip_id ) ->exists();
    }
    
}

