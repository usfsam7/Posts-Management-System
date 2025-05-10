<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Gate;
use Illuminate\Http\Request;

class AJaxController extends Controller
{

    // get all posts
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate();

        return view("ajax.index", ['posts' => $posts]);
    }

    public function home()
    {
        $posts = Post::orderBy('id', 'desc')->paginate();
        return view("home", ['posts' => $posts]);
    }


    public function create()
    {

        $users = User::select('id','name')->get();
        return view("ajax.add", compact('users'));
    }

    // edit a specific post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('view', $post);
        return view("ajax.edit", ['post' => $post]);
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view("ajax.show", ['post' => $post]);
    }


    public function update(Request $request, $id)
    {
       $post = Post::findOrFail($id);
       $post->title = $request->title;
       $post->description = $request->description;
       $post->user_id = $request->user_id;
       $post->save();

       return redirect()->route('posts')->with('success', 'Post Updated Successfully.');

    }


    // create a new post
    public function store(StorePostRequest $request)
    {
       $post= new Post();
       $post->title = $request->title;
       $post->description = $request->description;
       $post->user_id = $request->user_id;
       $image = $request->file('image')->store('public');
       $post->image = str_replace('public/', '', $image); // Only save filename


       $post->save();
       return back()->with('success', 'Post Added Successfully.');

    }


    // delete a specific post
    public function destroy($id)
    {
         $post = Post::findOrFail($id);
         $post->delete();

         return back()->with('success', 'Post Deleted Successfully.');
    }


    public function search(Request $request)
    {
        $q = $request->q;
        $posts = Post::Where('description','like','%'.$q.'%')->
        get();

        return view('ajax.search', ['posts' => $posts]);
    }

}




