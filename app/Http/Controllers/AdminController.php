<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index(Post $post)
    {
    	$comment = Comment::all();
    	$posts = Post::latest()->paginate(6);

    	return view('admin.adminindex', compact('comment','post', 'posts'));
    }

    public function poststable()
    {
    	$posts = Post::all();

    	return view('admin.posttable', compact('posts'));
    }

    public function edit(Post $post)
    {
    	$categories = Category::all();

    	return view('post.edit', compact('post', 'categories'));
    }

    public function destroy(Post $post)
    {
    	$post->delete();

    	return redirect()->back()->with('danger', 'Post Berhasil Dihapus');
    }

    public function edits(Post $post)
    {
    	$categories = Category::all();

    	return view('postadmin.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
    	
    	$post->update([
    		'title' => request('title'),
    		'content' => request('content'),	
    		'category_id' => request('category_id'),
    	]);

    	return redirect()->route('postadmin.view')->with('info', 'Post Berhasil Diubah');
    }

    public function commentstable()
    {
    	$comments = Comment::all();
    	$posts = Post::all();

    	return view('admin.commentstable', compact('comments','posts'));
    }

    public function commentsdestroy($id)
    {
    	$comment = Comment::find($id);
    	$comment->delete();

    	return redirect()->back()->with('danger', 'Komentar Berhasil Dihapus');
    }

    public function userstable()
    {
    	$comments = Comment::all();
    	$posts = Post::all();
    	$users = User::all();

    	return view('admin.userstable', compact('comments','posts', 'users'));
    }

    public function usersdestroy($id)
    {
    	$user = User::find($id);
    	$user->delete();

    	return redirect()->back()->with('danger', 'User Berhasil Dihapus');
    }
}
