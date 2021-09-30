<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $other_user= User::find(2);
        if($user->following($other_user)){
            echo "true";
        }
        else echo "false";
        echo "abc";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $other_user=User::with(['articles'=>function($query){
            $query->with('category');
        }])->find($request->followed_id);
        $user->follow($other_user);
        return response()->json('success');
        // return redirect()->route('users.show', ['user'=>$other_user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function show(Relationship $relationship)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function edit(Relationship $relationship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relationship $relationship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $other_user=User::with(['articles'=>function($query){
            $query->with('category');
        }])->find($id);
        $user->unfollow($other_user);
        // return redirect()->route('users.show', ['user' => $other_user]);
    }
}
