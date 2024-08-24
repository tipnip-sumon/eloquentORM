<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::with('user')->get();
        // foreach($posts as $post){
        //     echo "<div style='border: 1px solid red; margin:0 0 10px;'>
        //     <h3>$post->title</h3>
        //     <span>{$post->user->name}</span>
        //     <p>$post->description</p>
        //     </div>";
        // }
        //first method

        // $posts = Post::withWhereHas('user',function($query){
        //     $query->where('email','rafsan@gmail.com');
        // })->get();

        //2nd method
        // $user = User::where('email','rafsan@gmail.com')->get();
        // $post = Post::whereBelongsTo($user)->get();
        // $post = Post::with('user','user.contact')->get();
        // return $post;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $post = new Post([  
        //     'title' => 'Post Title testing 2',
        //     'description' => 'Description testing 2'
        //     ]);
        // $user = User::find(1);
        // $user->post()->save($post);
        $user = User::find(1);
        $user->post()->create([
            'title' => 'Post title test create',
            'description' => 'Description create'
        ]);
    }
    public function addpost()
    {
        return view('addpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'=> 'required|min:2,max:10',
            'description'=>'required'
        ]);
        $user = User::find(Auth::id());
        $user->post()->create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view',$post);
        $post = Post::find($post->id);
        return view('update',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $post = Post::find($post->id);
        // return view('update',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update',$post);
        // if($request->user()->cannot('update',$post)){
        //     abort(403,"You are not Authorize");
        // }
        $post = Post::find($post->id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('update',$post);
        $post->delete();
        return redirect()->route('dashboard');
    }
}
