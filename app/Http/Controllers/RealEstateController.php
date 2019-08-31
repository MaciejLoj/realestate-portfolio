<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RealEstateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showall', 'home', 'start']]);
    }

    public function showall()
    {
        $data = array(
            'title' => 'Slaskie Nieruchomosci',
            'cities' => ['Bytom', 'Chorzow', 'Katowice']
        );

        return view('pages.realestates')->with($data);
    }

    public function start()
    {
        return view('pages.welcome');
    }

    public function myposts()
    {
        // if (Auth::guest())
        // {
        //     return redirect('/login');
        //
        // } else{
            $user_id = Auth::id();
            $user = User::find($user_id);
            return view('pages.myposts')->with('posts', $user->posts);
        // }

    }
}
