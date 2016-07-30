<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;

use Cronti\Http\Requests;

use Image;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function profile () {
        return view ('auth.profile', array('user'=>Auth::user()));
    }

    public function update_avatar(Request $request) {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('auth.profile', array('user'=>Auth::user()));
    }
}
