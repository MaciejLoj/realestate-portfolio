<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\CustomerMessageMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RealEstateController extends Controller
{

    public function __construct()
    {
        /* kiedy uruchamia sie Controller __construct dziala i uruchamia middleware, mamy middleware
        w routingu wiec tego nie potrzebujemy.
        $this->middleware('auth', ['except' => ['showall', 'home', 'start']]);
        */

        // $this->middleware(['auth', 'verified']) - potwierdzenie maila
    }

    public function contact_us()
    {
        return view('pages.contact');
    }

    public function send_message()
    {
        Mail::to("maciej.loj@gmail.com")->send(new CustomerMessageMail());
        return redirect('/kontakt')->with('success', 'Dziękujemy za przesłanie wiadomości!');
    }

    public function showall()
    {
        $data = array(
            'title' => 'Slaskie Nieruchomosci',
            'cities' => ['Bytom', 'Chorzow', 'Katowice']
        );
        return view('pages.realestates')->with($data);
    }
    public function newstart()
    {
        return view('pages.new_homepage');
        //return view('pages.new');
    }

    public function start()
    {
        return view('pages.welcome');
    }

    public function myposts()
    {
        // spr czy odwiedzajacy jest zalogowany. Jest tak to:
        if(Auth::id()){
            // id zalogowanego uzytkownika
            $user_id = Auth::id();
            // znajdz uzytkownika po danym id (id zalogowanego uzytkownika)
            $user = User::find($user_id);
            // user->posts to metoda z modelu User (hasMany). User ma wiele postow
            // W modelu Posts (belongsTo).
            return view('pages.myposts')->with('posts', $user->posts);
        // jesli nie jest przekieruj na login
        }else {
            return redirect('/login');
        }

    }
}
