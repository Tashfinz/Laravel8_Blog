<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
      //  $posts = Post::get(); Returns all posts which is a laravel collection
        $posts = Post::latest()->with(['user', 'likes'])->paginate(6);// paginates all the posts

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();

        // auth()->user()->posts()->create();
    }
    public function destroy(Post $post)
    {
        // if (!$post->ownedBy(auth()->user())){
        //     dd('no');
        // }
        $this->authorize('delete', $post);    

        $post->delete();
        
        return back();
    }
}
        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body'=> $request->body
        // ]);