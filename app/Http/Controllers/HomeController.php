<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_obj = User::find(Auth::id());
        $user = new User;

        foreach($user_obj->roles as $role) {
            if($role->role == 'admin') {
                $user_arr_date = $user->groupUserDate($user_obj, $role->role);
                return view('admin', ['user'=>$user_arr_date]);
            } else {
                $user_arr_date =  $user->groupUserDate($user_obj, $role->role);
                return view('student', ['user'=>$user_arr_date]);
            }
        }
    }
}
