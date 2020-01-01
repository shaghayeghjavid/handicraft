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
        return view('artist-profile', ['artist' => $artist[0]],['posts' => $posts]);
    }

    public function showArtists(){
        $artists = DB::select('select * from artists');
        return view('artists',['artists' => $artists]);
    }
}
