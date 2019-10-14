<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
// for SQL queries use DB library
use DB;
// use Illuminate\Support\Facades\DB;
use App\Mail\AddedPostMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        // $new_post = Post::create
        Post::create([
            'location' => request('location'),
            'price' => request('price'),
            'title' => request('title'),
            'body' => request('body'),
            'is_real_estate' => request('is_real_estate'),
            'user_id' => Auth::id(),
            'cover_image' => $fileNameToStore,
        ]);
        // $user = Auth::user();
        // if ($new_post){Mail::to, return redirect}
        Mail::to(auth()->user()->email)->send(new AddedPostMail());
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
        // $post = Post::where('id', $post->id)
        //         ->update([
                //      'title'=>request->input('title'),
                //      'body'=>request->input('body')]);                                       ])
        // do title obiektu zostanie przypisana tresc z formularza o name=title
        $post->update(request(['title', 'body']));
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();
        // if ($post){return redirect}
        return redirect('/ogloszenia')->with('success', 'Aktualizowano ogloszenie!');
        // return redirect->route('companies.show',['company'=>$company->id])
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
        // if($post){ return redirect}
        return redirect('/mojeogloszenia')->with('success', 'Ogloszenie zostalo usuniete');
    }

    public function find_post()
    {
        return view('posts.find');
    }

    public function find_post_db(Request $request)
    {
        $find_title = $request->input('keyword');
        $posts = DB::select("SELECT * FROM posts WHERE title LIKE '%$find_title%' ");
        // znajduje post  ktory jest rowny keywordowi z formularza z find.blade.php
        // $posts = Post::where('title', $find_title)->get();
        return view('posts.found_post_bytitle')->with('posts', $posts);

        // $posts = DB::select('SELECT * FROM posts WHERE title LIKE @find_title ');
        // $contains = str_contains('This is my name', 'my'); zwroci true
        // $contains = str_contains('This is my name', ['my', 'foo']);
    }

    public function find_realestate()
    {
        return view('posts.find_re');
    }

    public function find_realestate_db(Request $request)
    {
        // wszystkie nieruchomosci, w bazie danych w columnie is_real_estate
        // maja zaznaczone 0
        $location = $request->input('location');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $found_re_post = DB::select("SELECT * FROM posts WHERE (is_real_estate = 0)
            AND (location = '$location') AND (price BETWEEN $min_price AND $max_price)");
        return view('posts.found_re')->with('posts', $found_re_post);
    }

    public function find_other()
    {
        // wszystkie pozostale rzeczy w bazie maja oznaczenie null w columnie
        return view('posts.find_ot');
    }

    public function find_other_db()
    {
        // wszystkie pozostale rzeczy w bazie maja oznaczenie null w columnie
        return view('posts.find_ot');
    }

}
