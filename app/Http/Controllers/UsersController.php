<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;   //追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
           'users' => $users, 
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);  //show.blade.phpでは$count_micropostsで参照
        
        return view('users.show', $data);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        
        $data += $this->counts($user);  //show.blade.phpでは$count_followingsで参照
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
        ];
        
        $data += $this->counts($user);  //show.blade.phpでは$count_followersで参照
        
        return view('users.followers', $data);        
    }

    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $favorites,
        ];
        
        $data += $this->counts($user);  //viewでは$count_favoritesで参照
        
        return view('users.favorites', $data);
    }
}
