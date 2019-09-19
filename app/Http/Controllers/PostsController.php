<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
// for SQL queries use DB library
use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    // pokazuje wszystkie ogloszenia
    {
        // $posts = Post::all();
        // return Post::where('title','Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts'); --> using sql
        //$posts = Post::orderBy('created_at', 'desc')->take(1)->get(); shows just 1 result
        //$posts = Post::orderBy('created_at', 'desc')->get();
        $user = Auth::user();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // wszystkie posty uszeregowane data dodania od najnowszego
        return view('posts.index')->with('posts', $posts)->with('user', $user);
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
    public function store(PostsRequest $request)
    {

        // jesli dodano plik do formularza (name pola to - 'cover_image')
        // czy w calej aplikacji dodano gdzies do formularza plik o nazwie 'cover_image'
        if($request->hasFile('cover_image')){
            // zmiennej przypisuje dokladna nazwe pliku dodanego przez formularz o name = 'cover_image'
            $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
            // sluzy do pobierania czesci pathu (cala, baza, samo rozszerzenie itp)
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                // $filename = pathinfo($file, PATHINFO_FILENAME) -> bez rozszerzenia pobiera, nazwe glowna pliku;
                // $extension = pathinfo($file, PATHINFO_EXTENSION) -> samo rozszerzenie pobiera
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // pobiera samo rozszerzenie pliku .jpg
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //tworzymy nazwe pliku, ktora ma byc zapisana ostatecznie w folderze
            //zapisujemy plik w folderze pod stworzona nazwa $fileNameToStore
            $path=$request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // w zwiazku z mass assignment musimy dodac pole fillable do modelu Post
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => Auth::id(),
            'cover_image' => $fileNameToStore,
        ]);

        // One important thing to note here: if you plan to use create(),
        //  all the attributes that you pass to it have to be listed in the
        //$fillable attribute on the model.

        // // Create POST, mozemy uzyc Post - dalismy use Post u gory
        // $post = new Post;
        // // do title obiektu zostanie przypisana tresc z formularza o name=title
        // $post->title = $request->input('title'); // Input::get('title');
        // $post->body = $request->input('body');
        // // currently logged in users is will be given
        // $post->user_id = Auth::id();
        // $post->cover_image = $fileNameToStore;
        // $post->save();

        return redirect('/ogloszenia')->with('success', 'Dodano ogloszenie!');
        // Session::flash('message' , 'Successfully created ogloszenie');
        // return Redirect::to('/posts');
        //Post::create($request->all());, return redirect()->route('');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // ::find domyslnie szuka po pk = id
        $user = Auth::user();
        // $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // admin
        $user = Auth::user();
        //$user = User::where('mail', 'mloj@o.pl');
        // $post = Post::findOrFail($id);

        if((Auth::id()==$post->user_id) || ($user))   // LUB user jest Adminem
        {
            return view('posts.edit')->with('post', $post)->with('user', $user);
        } else {
            return redirect('/ogloszenia')->with('error', 'Dostep nie jest mozliwy');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, Post $post)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        // $post = Post::findOrFail($id);
        // do title obiektu zostanie przypisana tresc z formularza o name=title
        $post->update(request(['title', 'body']));
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        return redirect('/ogloszenia')->with('success', 'Aktualizowano ogloszenie!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //$id to parametr ktory zostal przeslany z formularza
    public function destroy(Post $post)
    {
        // Post::find szuka domyslnie po primary key = id. Mozna zmienic pk na inne pole niz id.
        // $post = Post::findOrFail($id);
        $post-> delete();
        return redirect('/mojeogloszenia')->with('success', 'Ogloszenie zostalo usuniete');
    }
}
