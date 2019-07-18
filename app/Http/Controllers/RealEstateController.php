<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class RealEstateController extends Controller
{

    public function showall()
    {
        return view('realestate');
    }

    
}
