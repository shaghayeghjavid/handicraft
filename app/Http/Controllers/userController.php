<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class userController extends Controller
{
    public function signup(){
        
    }

    public function signin(){
        //
    }
    public function favourites($id){
        $user = DB::select('select * from users where id = ?',[$id]);
        $likes = DB::select('select * from likes where userID= ?', [$id]);
        $posts = DB::select('select * from posts');
        return View('favourite')->with('user', $user[0])
                                ->with('likes',$likes)
                                ->with('posts',$posts);
    }
}