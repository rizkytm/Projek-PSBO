<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;

class CategoryController extends Controller
{
    public function agriculture()
	{
		$posts = Post::where("category_id", "=", "1")->get();
		return view('category.agriculture', compact('posts'));
	}

	public function science()
	{
		$posts = Post::where("category_id", "=", "2")->get();
		return view('category.science', compact('posts'));
	}

	public function social()
	{
		$posts = Post::where("category_id", "=", "3")->get();
		return view('category.social', compact('posts'));
	}
}
