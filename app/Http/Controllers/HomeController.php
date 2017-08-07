<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\News;
use App\Home;

class HomeController extends Controller
{
    public function index()
    {
        $arrNews = [];
        $newsObj = News::with ('user')->get();
        foreach($newsObj as $keyNewsObj => $valNewsObj) {
            $arrNews[] = [
                'title'      => $valNewsObj->title,
                'img'        => $valNewsObj->img,
                'content'    => $valNewsObj->content,
                'author'     => $valNewsObj->user->name,
                'dateCreate' => $valNewsObj->created_at
            ];
        }

        return view('welcome', ['news' => $arrNews, 'admin' => User::checkAdmin()]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $user_obj = User::find(Auth::id());
        $user = new User;

        foreach ($user_obj->roles as $role) {
            if ($role->role == 'admin') {
                $user_arr_date = $user->groupUserDate($user_obj, $role->role);
                return view('admin', ['user' => $user_arr_date]);
            } else {
                $user_arr_date = $user->groupUserDate($user_obj, $role->role);
                return view('student', ['user' => $user_arr_date]);
            }
        }
    }

    public function update(Request $request)
    {
         $this->validate($request, [
            'title'   => 'required|unique:news|max:255',
            'content' => 'required|max:2000',
            'img'     => 'mimes:jpeg,jpg,png | max:1000'
        ]);

        if ($request->hasFile('img')) {
            $home = new Home;
            $home->saveDateFormImg();
        } else {
            $home = new Home;
            $home->saveDateForm();
        }

        return redirect()->back();
    }

}
