<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	$posts = Post::where("user_id", "=", Auth::user()->id)->get();
    	return view('profile', compact('posts','users'));
    }

    public function user(User $user)
    {
    	$users = User::all();
    	$posts = Post::where("user_id", "=", $user);
    	return view('user', compact('posts','users','user'));
    }
}
