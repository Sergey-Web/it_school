<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'group_user', 'user_id', 'group_id');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function groupUserDate($user_obj, $role)
    {
        foreach($user_obj->groups as $group_val) {
            $group = $group_val->group;
        }

        if($role == 'admin') {
            $user_arr_date = [
                'name'     => $user_obj->name,
                'img'      => $user_obj->img,
                'birthday' => $user_obj->birthday,
                'phone'    => unserialize($user_obj->phone),
                'E-mail'   => $user_obj->email,
            ];
        } else {
            $user_arr_date = [
                'name'     => $user_obj->name,
                'img'      => $user_obj->img,
                'birthday' => $user_obj->birthday,
                'phone'    => unserialize($user_obj->phone),
                'E-mail'   => $user_obj->email,
                'group'    => $group
            ];
        }

        return $user_arr_date;
    }

    public static function checkAdmin()
    {
        $userObj = User::find(Auth::id());

        if($userObj != null) {

            foreach ($userObj->roles as $role) {
                if ($role->role == 'admin') {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    public static function listUsers()
    {
        $usersObj = User::with('Groups')->get();

        foreach($usersObj as $key_user => $user) {
            $nameExplode = explode(' ', $user->name);

            if(count($nameExplode) == 3) {
                foreach($user->groups->all() as $group) {
                    $userGroup = $group->group;
                }
                $users[] = [
                    'id'         => $user['id'],
                    'firstName'  => $nameExplode[0],
                    'lastName'   => $nameExplode[1],
                    'patronymic' => $nameExplode[2],
                    'userGroup'  => $userGroup
                ];
            } else {
                foreach($user->groups->all() as $group) {
                    $userGroup = $group->group;
                }
                $users[] = [
                    'id'         => $user['id'],
                    'firstName'  => $nameExplode[0],
                    'lastName'   => $nameExplode[1],
                    'userGroup'  => $userGroup
                ];
            }


        }

        return $users;
    }

}
