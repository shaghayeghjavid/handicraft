<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class artistController extends Controller
{ 
    
    public function show(){
       
        return view('artist-profile');
          
    }
    public function showArtist($id)
    {
        $artist = DB::select('select * from artists where id = ?', [$id]);
        $posts = DB::select('select * from posts where artistID = ?', [$id]);
        $likes = DB::select('select * from likes where artistID = ?', [$id]);
        return View('artist-profile')->with('artist', $artist[0])
                                 ->with('posts', $posts)
                                 ->with('likes', $likes);
    }

    public function showArtists(){
        $artists = DB::select('select * from artists');
        return view('artists',['artists' => $artists]);
    }
    public function checkLikeStatus(){
        $artistID = $_POST['aID'];
        $postID = $_POST['pID'];
        DB::insert("INSERT INTO `likes` (`liked`,`userID`,`artistID`,`postID`) VALUES ('1','1',".$artistID.",".$postID."); ");
    }
    public function checkunLikeStatus(){
        $artistID = $_POST['aID'];
        $postID = $_POST['pID'];
        DB::update('DELETE FROM likes WHERE artistID="'.$artistID.'" and postID="'.$postID.'";');
    }
}