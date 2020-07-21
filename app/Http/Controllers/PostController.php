<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::orderBy('title', 'desc')->take(5)->get();
        // returning post index view
        // $posts = Post::orderBy('title', 'desc')->paginate(1);
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'cover_image' => 'image|nullable|max:1999'

        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with Extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get filename with just image
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get filename with just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // file to store in DB
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $file = $request->file('cover_image')->storeAs('public/cover_image', $filenameToStore);

        } else {
            $filenameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = auth()->user()->name;
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();
        return redirect('/posts')->with('success', 'Post created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');

        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        if($request->hasFile('cover_image')){
            // Get filename with Extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get filename with just image
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get filename with just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // file to store in DB
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $file = $request->file('cover_image')->storeAs('public/cover_image', $filenameToStore);

        }

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = auth()->user()->name;
        if($request->hasFile('cover_image')){
            $post->cover_image = $filenameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');

        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
             Storage::delete('public/cover_image/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted Successfully');
    }
}
