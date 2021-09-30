<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['content', 'commentable_type', 'commentable_id'];

    public function commentable(){
        $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
