<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
