<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
// for SQL queries use DB library
use DB;

class PostsController extends Controller
{

    public funtion __construct()
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
        //$posts = Post:all();
        // return Post::where('title','Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts'); --> using sql
        //$posts = Post::orderBy('created_at', 'desc')->take(1)->get(); shows just 1 result
        //$posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
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
            'body' => 'required'
        ]);

        // Create POST, mozemy uzyc Post bo dalismy use Post u gory
        $post = new Post;
        // do title obiektu zostanie przypisana tresc z formularza o name=title
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // currently logged in users is will be given
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/posts')->with('success', 'Dodano ogloszenie!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find in database by given id
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
            'body' => 'required'
        ]);

        // Create POST, mozemy uzyc Post bo dalismy use Post u gory
        $post = Post::find($id);
        // do title obiektu zostanie przypisana tresc z formularza o name=title
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Aktualizowano ogloszenie!');
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
        $post-> delete;
        return redirect('/posts')->with('success', 'Ogloszenie zostalo usuniete');
    }
}
