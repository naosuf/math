<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
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
    
    public function questions(){
        return $this->hasMany('App\Question');
    }
    
    public function answers(){
        return $this->hasMany('App\Answer');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    public function bookmarks(){
        return $this->belongsToMany('App\Question');
    }
    
    public function notes(){
        return $this->hasMany('App\Note');
    }
    
    public function getByPaginate(int $limit_count = 5){
         return $this->questions()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
