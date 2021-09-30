<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Relationship extends Model
{
    use HasFactory;

    public function follower(){
        return $this->belongsTo('App\Models\User');
    }

    public function followed(){
        return $this->belongsTo('App\Models\User');
    }

    public function follow($id){
        $this->followed()->associate($id);
        $this->follower()->associate(Auth::user());
        $this->save();
    }

    public function unfollow($id){
        Relationship::where('followed_id', $id)->where('follower_id', Auth::id())->delete();
    }
}
