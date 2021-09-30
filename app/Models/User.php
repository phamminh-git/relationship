<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function follower(){
        return $this->hasMany('App\Models\Relationship', 'follower_id');
    }

    public function followed(){
        return $this->hasMany('App\Models\Relationship', 'followed_id');
    }

    public function articles(){
        return $this->hasMany('App\Models\Article');
    }

    public function follow($other_user){
        $relationship=new Relationship();
        $relationship->followed()->associate($other_user->id);
        $relationship->follower()->associate(Auth::user());
        $relationship->save();
    }

    public function unfollow($other_user){
        Relationship::where('followed_id', $other_user->id)->where('follower_id', $this->id)->delete();
    }

    public function following($other_user){
        $relationship=Relationship::where('follower_id', '=', Auth::id())
        ->where('followed_id', '=', $other_user->id)->first();
        if(empty($relationship)){
            return false;
        }
        else return true;
    }
}
