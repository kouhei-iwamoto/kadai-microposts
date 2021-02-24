<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    //フォローするためのメソッド
    public function store($id)
    {
        //認証済みユーザーが、idのユーザをフォローする。
        \Auth::user()->follow($id);
        
        return back();
    }
    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        
        return back();
    }
}
