<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class RealEstateController extends Controller
{

    public function showall()
    {
        $data = array(
            'title' => 'Slaskie Nieruchomosci',
            'cities' => ['Bytom', 'Chorzow', 'Katowice']
        );

        return view('pages.realestates')->with($data);
    }

    public function home()
    {
        return view('pages.homepage');
    }

    public function start()
    {
        return view('pages.welcome');
    }

    public function myposts()
    {
        return view('pages.myposts');
    }
}
