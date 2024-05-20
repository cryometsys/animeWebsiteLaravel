<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function createFollow(User $user) {
        //cannot follow myself
        if($user->user_id === auth()->user()->user_id) {
            return back()->with('failure', 'Cannot follow yourself.');
        }
        //cannot follow someone already being followed
        $existCheck = Follow::where([
            ['user_id', '=', auth()->user()->user_id], 
            ['following_id', '=', $user->user_id]
            ])->first();

        // return 'user_id:' . auth()->user()->user_id . ' following_id: '. $user->user_id;

        if($existCheck) {
            return back()->with('failure', 'User already followed.');
        }

        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->user_id;
        $newFollow->following_id = $user->user_id;
        $newFollow->save();
        return back()->with('success', 'You are now following ' . $user->username);
    }
    public function removeFollow(User $user) {
        Follow::where([
            ['user_id', '=', auth()->user()->user_id],
            ['following_id', '=', $user->user_id]
        ])->delete();
        return back()->with('success', 'Successfully unfollowed ' . $user->username);
    }
    public function social(User $user, Request $request) {
        $users = [];
        $following = $user->followingUsers()->get();
        return view('social', compact('following', 'users'));
    }
    public function searchUsers(User $user, Request $request) {
        $searchTerm = $request->input('userSearch');
        $users = User::where('username', 'like', "%{$searchTerm}%")
            ->where('user_id', '!=', auth()->user()->user_id)
            ->limit(5)
            ->get();
        $following = $user->followingUsers()->get();
        return view('social', compact('following', 'users')); 
    }
}
