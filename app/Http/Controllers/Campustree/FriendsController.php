<?php

namespace App\Http\Controllers\Campustree;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id = Auth::user()->id;
        $new_friend = new Friend;
        $new_friend->user_id = $user_id;
        $new_friend->friend_id = $request->friend_id;
        $new_friend->accepted = 0;
        $new_friend->save();

        $notification = new Notification;
        $notification->type = 'add-to-friend';
        $notification->friend_id = $request->friend_id;
        $notification->user_id = $user_id;
        $notification->save();

        return redirect()->back();
    }

    public function acceptFriend(Request $request) {
        $friend = Friend::where('user_id', $request->user_id)->where('friend_id' , Auth::user()->id)->first();
        $friend->accepted = 1;
        $friend->save();
        return redirect()->back();
    }

    public function declineFriend(Request $request) {
        $friend = Friend::where('user_id', $request->user_id)->where('friend_id' , Auth::user()->id)->first();
        $friend->deleteOrFail();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $friend_request = $request->friend_id;
//        $friend_del = [];
//        $friend_del1 = [];
            $friend_del = Friend::where('user_id', $friend_request)->where('friend_id', $user->id)->first();

            $friend_del1 = Friend::where('friend_id', $friend_request)->where('user_id', $user->id)->first();

        if($friend_del) {
            $friend_del->deleteOrFail();
        } else if($friend_del1) {
            $friend_del1->deleteOrFail();
        }
        return redirect()->back();
    }
}
