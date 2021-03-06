<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
	public function index(Post $post, User $user)
	{
		$posts = Post::latest()->paginate(5);
		$user = User::all();

		return view('post.index', compact('posts','post','user'));
	}

    public function create()
    {
    	$categories = Category::all();
    	return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'title' => 'required',
    		'content' => 'required|min:10',
    		'video' => 'mimes:mp4,mkv,avi',
    		'pdf' => 'mimes:pdf'
    	]);

        $videoname = $request->file('video')->getClientOriginalName();
    	$video = $request->file('video')->storeAs('videos', $videoname);
        $pdfname = $request->file('pdf')->getClientOriginalName();
    	$pdf = $request->file('pdf')->storeAs('pdfs', $pdfname);
    	Post::create([
    		'title' => request('title'),
    		'slug' => str_slug(request('title')),
    		'content' => request('content'),	
    		'category_id' => request('category_id'),
    		'user_id' => auth()->id(),
    		'video' => $video,
    		'pdf' => $pdf
    	]);
    	
    	return redirect()->route('post.index')->with('success', 'Post Ditambahkan');
    }

    public function edit(Post $post)
    {
    	$categories = Category::all();

    	return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
    	
    	$post->update([
    		'title' => request('title'),
    		'content' => request('content'),	
    		'category_id' => request('category_id'),
    	]);

    	return redirect()->route('profile.index')->with('info', 'Post Berhasil Diubah');
    }

    public function destroy(Post $post)
    {
    	$post->delete();

    	return redirect()->back()->with('danger', 'Post Berhasil Dihapus');
    }

    public function show(Post $post)
    {
    	return view('post.show', compact('post'));
    }
}
