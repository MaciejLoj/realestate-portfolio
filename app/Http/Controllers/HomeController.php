<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
         // $request['email'] ???
         $user = User::where('email', $request['email'])->first();
         $user->roles()->detach();
         if($request['role_user']){
             $user->roles()->attach(Role::where('name','User'));
         }
         if($request['role_admin']){
             $user->roles()->attach(Role::where('name', 'Admin'));
         }
         if($request['role_moderator']){
             $user->roles()->attach(Role::where('name', 'Moderator'));
         }


     }
}
