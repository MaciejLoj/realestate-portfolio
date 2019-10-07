<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // middleware nalozony w routingu web.php, ponizszy nie jest potrzebny
        // $this->middleware('auth');

        // $this->middleware(['auth', 'verified']) - potwierdzenie maila, w Admin
        // czy RealEstateController
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function all_users()
     {
         $users = User::all();
         return view('pages.allusers')->with('users', $users);
     }

     public function postAdminRoles(Request $request)
     {
         // $role_user = Roles::where('name','User')->first();
         // $role_admin = Roles::where('name','Admin')->first();
         // $role_moderator = Roles::where('name','Moderator')->first();

         // $request['email'] ???
         $user = User::where('email', $request['email'])->first();
         $user->roles()->detach();
         // jesli checkbox 'role_user' jest ustawiony, tzn na true = $request ->has()
         if($request['role_user']){
             $user->roles()->attach(Roles::where('name','User')->first());
         }
         if($request['role_admin']){
             $user->roles()->attach(Roles::where('name','Admin')->first());
         }
         if($request['role_moderator']){
             $user->roles()->attach(Roles::where('name','Moderator')->first());
         }
         return redirect()->back();
    }
}
