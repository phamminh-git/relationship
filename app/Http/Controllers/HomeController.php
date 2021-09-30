<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::whereId(Auth::id())->with('articles')->with(['followed'=> function($query){
            $query->with('follower');
        }])->withCount('followed as num_followers')->with(['follower'=>function($query){
            $query->with('followed');
        }])->withCount('follower as num_following')->first();
        $categories=Category::all();
        return view('home', compact('user', 'categories'));
    }

    public function changeLanguage($lang){
        $language = ($lang == 'vi' || $lang == 'en') ? $lang : config('app.locale');
        Session::put('language', $language);
        return redirect()->back();
    }

}
