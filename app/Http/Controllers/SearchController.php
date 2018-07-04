<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$query = $request->get('search');
    	$hasil = Post::where('title', 'LIKE', '%' . $query . '%')->paginate(6);

    	return view('post.search', compact('hasil', 'query'));
    }
}
