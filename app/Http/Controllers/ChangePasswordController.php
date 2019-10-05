<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function show()
    {
        return view('auth.changepassword');
    }

    public function update(Request $request)
    {
        // return dd($request->all());
        // wyswietla wszystko co zostalo przeslane formularzem
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
            // 'newpassword_confirm' => 'required'
        ]);
        $hashedPassword = Auth::user()->password;
        // spr czy zwykly tekst jest rowny hashowanemu
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            // znajdz user po id (podaj id zalogowanego usera)
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newpassword);
            $user->save();
            Auth::logout();
            return redirect('/login')->with('success', 'Haslo zostalo zmienione!');
        } else {
            return redirect()->back()->with('error', 'Podane haslo jest bledne!');
        }

    }
}
