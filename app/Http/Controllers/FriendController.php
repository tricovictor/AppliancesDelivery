<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\User;
use App\Cart;
use Auth;
use Session;
use Redirect;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request);
        $users = User::filterAndPaginate($request->get('namesearch'));
        $friends = Friend::where('user_id', Auth::user()->id)->get();
        $carts = Cart::all();
        //dd($carts);
        return view('friend.index', compact('users', 'friends', 'carts'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friend = Friend::where('friend_id',$id)->where('user_id', Auth::user()->id)->first();
        if($friend){
            $friend->delete();
        } else {
            $friend = new Friend();
            $friend->friend_id = $id;
            $friend->user_id = Auth::user()->id;
            $friend->save();
        }
        Session::flash('message','Friend change state');
        return redirect::to('friend');        
    }
}
