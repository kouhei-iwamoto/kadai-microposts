<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
         if (\Auth::check()) {
            
            $user = \Auth::user();
            
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }  
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる この場合は投稿フォームのページへ戻る
        return back();
    }
    
    public function destroy($id)
    {
         $micropost = \App\Micropost::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
